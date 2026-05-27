<?php
/**
 * Importar Especialistas y Procesar Ubigeo
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Agregar menú en Herramientas
function adium_register_import_page() {
    add_management_page(
        'Importar Especialistas',
        'Importar Especialistas',
        'manage_options',
        'adium-import',
        'adium_render_import_page'
    );
}
add_action('admin_menu', 'adium_register_import_page');

function adium_render_import_page() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    $message = '';

    if ( isset($_POST['adium_import_action']) && check_admin_referer('adium_import_nonce') ) {
        $doctores_path = sanitize_text_field($_POST['doctores_json']);
        $ubigeo_path = sanitize_text_field($_POST['ubigeo_json']);

        if ( file_exists($doctores_path) && file_exists($ubigeo_path) ) {
            $message = adium_process_import($doctores_path, $ubigeo_path);
        } else {
            $message = '<div class="notice notice-error"><p>Archivos no encontrados. Verifique las rutas.</p></div>';
        }
    }

    ?>
    <div class="wrap">
        <h1>Importar Directorio Médico y Ubigeos</h1>
        <?php echo $message; ?>
        
        <form method="post" action="">
            <?php wp_nonce_field('adium_import_nonce'); ?>
            <input type="hidden" name="adium_import_action" value="1">
            
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="doctores_json">Ruta al JSON de Directorio Médico</label></th>
                    <td>
                        <input name="doctores_json" type="text" id="doctores_json" value="C:\Users\PcLocal\Downloads\directorio_medico_mounjaro.json" class="regular-text ltr">
                        <p class="description">Ruta absoluta al archivo directorio_medico_mounjaro.json</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="ubigeo_json">Ruta al JSON de Ubigeos Completo</label></th>
                    <td>
                        <input name="ubigeo_json" type="text" id="ubigeo_json" value="C:\Users\PcLocal\Downloads\peru_ubigeos_completo.json" class="regular-text ltr">
                        <p class="description">Ruta absoluta al archivo peru_ubigeos_completo.json</p>
                    </td>
                </tr>
            </table>
            
            <?php submit_button('Iniciar Importación y Procesamiento'); ?>
        </form>
    </div>
    <?php
}

function adium_slugify($text) {
    $text = remove_accents($text);
    $text = strtolower($text);
    $text = preg_replace('/[^a-z0-9\-]+/', '-', $text);
    return trim($text, '-');
}

function adium_process_import($doctores_path, $ubigeo_path) {
    // 1. Leer Doctores
    $doctores_content = file_get_contents($doctores_path);
    $doctores_data = json_decode($doctores_content, true);

    if ( !isset($doctores_data['directorio_medico']) ) {
        return '<div class="notice notice-error"><p>Formato de doctores inválido.</p></div>';
    }

    $medicos = $doctores_data['directorio_medico'];
    $ciudades_con_medicos = array();
    
    $imported_count = 0;

    foreach ($medicos as $medico) {
        $nombre = trim($medico['nombre']);
        $apellido = trim($medico['apellido']);
        $titulo_post = $nombre . ' ' . $apellido;

        // Limpiar strings
        $ciudad = isset($medico['ciudad']) ? trim($medico['ciudad']) : '';
        $region = isset($medico['region']) ? trim($medico['region']) : '';
        $distrito = isset($medico['distrito']) ? trim($medico['distrito']) : '';

        // Si tiene ciudad, la guardamos para procesar luego el ubigeo
        $ciudad_slug = $ciudad ? adium_slugify($ciudad) : '';
        $region_slug = $region ? adium_slugify($region) : '';
        $distrito_slug = $distrito ? adium_slugify($distrito) : '';

        if ( $ciudad_slug && $region_slug ) {
            $ciudades_con_medicos[$region_slug][] = $ciudad_slug;
        }

        // Buscar si ya existe para no duplicar (por nombre)
        $existing = get_page_by_title( $titulo_post, OBJECT, 'especialista' );
        
        $post_id = 0;
        if ( $existing ) {
            $post_id = $existing->ID;
            // Opcional: Actualizar post existente
        } else {
            // Crear nuevo post
            $post_data = array(
                'post_title'    => $titulo_post,
                'post_type'     => 'especialista',
                'post_status'   => 'publish'
            );
            $post_id = wp_insert_post($post_data);
            $imported_count++;
        }

        if ( $post_id ) {
            // Guardar meta datos (mapeo con ACF fields)
            update_post_meta($post_id, 'especialidad', $medico['especialidad']);
            update_post_meta($post_id, 'clinica_nombre', $medico['nombre_centro']);
            update_post_meta($post_id, 'clinica_direccion', $medico['direccion']);
            update_post_meta($post_id, 'clinica_telefono_1', $medico['telefono']);
            update_post_meta($post_id, 'clinica_telefono_2', $medico['celular']);
            
            $url_agenda = $medico['pagina_web'] ? $medico['pagina_web'] : '#';
            update_post_meta($post_id, 'clinica_enlace_agenda', $url_agenda);
            
            // Redes
            $redes = $medico['redes_sociales'];
            if ($redes) {
                if (stripos($redes, 'facebook') !== false) {
                    update_post_meta($post_id, 'social_facebook', $redes); // Basic parsing
                }
                if (stripos($redes, 'instagram') !== false) {
                    update_post_meta($post_id, 'social_instagram', $redes);
                }
                if (stripos($redes, 'linkedin') !== false) {
                    update_post_meta($post_id, 'social_linkedin', $redes);
                }
            }

            // Ubicación (slugs)
            update_post_meta($post_id, 'geo_departamento', $region_slug);
            // La base de datos asume "ciudad" y "distrito". Vamos a guardar slugs para el buscador
            update_post_meta($post_id, 'geo_provincia', $ciudad_slug); // Usaremos la ciudad como provincia por simplicidad del ubigeo
            update_post_meta($post_id, 'geo_distrito', $distrito_slug);
            update_post_meta($post_id, 'geo_ciudad', $ciudad_slug);
        }
    }

    // 2. Leer Ubigeo y Filtrar
    $ubigeo_content = file_get_contents($ubigeo_path);
    $ubigeo_data = json_decode($ubigeo_content, true);

    // Pre-index ubigeo names by slug for lookup
    $departments_labels = array();
    $provinces_labels = array();
    $districts_labels = array();
    $cities_labels = array();

    if (isset($ubigeo_data['departamentos'])) {
        foreach ($ubigeo_data['departamentos'] as $dep) {
            $dep_slug = adium_slugify($dep['nombre']);
            $departments_labels[$dep_slug] = ucwords(strtolower($dep['nombre']));
            if (isset($dep['provincias'])) {
                foreach ($dep['provincias'] as $prov) {
                    $prov_slug = adium_slugify($prov['nombre']);
                    $provinces_labels[$prov_slug] = ucwords(strtolower($prov['nombre']));
                    if (isset($prov['distritos'])) {
                        foreach ($prov['distritos'] as $dist) {
                            $dist_slug = adium_slugify($dist['nombre']);
                            $districts_labels[$dist_slug] = ucwords(strtolower($dist['nombre']));
                            if (isset($dist['ciudades'])) {
                                foreach ($dist['ciudades'] as $city) {
                                    $city_slug = adium_slugify($city['nombre']);
                                    $cities_labels[$city_slug] = ucwords(strtolower($city['nombre']));
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    // Build the geo tree directly from the doctors
    $geo_data_optimizado = array();

    foreach ($medicos as $medico) {
        $region = isset($medico['region']) ? trim($medico['region']) : '';
        $ciudad = isset($medico['ciudad']) ? trim($medico['ciudad']) : '';
        $distrito = isset($medico['distrito']) ? trim($medico['distrito']) : '';

        $region_slug = adium_slugify($region);
        $ciudad_slug = adium_slugify($ciudad);
        $distrito_slug = adium_slugify($distrito);

        if (!$region_slug) {
            continue;
        }

        // Default slugs if empty
        if (!$ciudad_slug) $ciudad_slug = 'no-data';
        if (!$distrito_slug) $distrito_slug = 'no-data';

        // 1. Department
        if (!isset($geo_data_optimizado[$region_slug])) {
            $label = isset($departments_labels[$region_slug]) ? $departments_labels[$region_slug] : ucwords(strtolower($region));
            $geo_data_optimizado[$region_slug] = array(
                'label' => $label,
                'provinces' => array()
            );
        }

        // 2. Provincia (mapped to Doctor's "ciudad" as per page-preguntar.php structure)
        if (!isset($geo_data_optimizado[$region_slug]['provinces'][$ciudad_slug])) {
            $label = isset($provinces_labels[$ciudad_slug]) ? $provinces_labels[$ciudad_slug] : ucwords(strtolower($ciudad ?: 'Otros'));
            $geo_data_optimizado[$region_slug]['provinces'][$ciudad_slug] = array(
                'label' => $label,
                'districts' => array()
            );
        }

        // 3. Distrito
        if (!isset($geo_data_optimizado[$region_slug]['provinces'][$ciudad_slug]['districts'][$distrito_slug])) {
            $label = isset($districts_labels[$distrito_slug]) ? $districts_labels[$distrito_slug] : ucwords(strtolower($distrito ?: 'Otros'));
            $geo_data_optimizado[$region_slug]['provinces'][$ciudad_slug]['districts'][$distrito_slug] = array(
                'label' => $label,
                'cities' => array()
            );
        }

        // 4. Ciudad
        if (!isset($geo_data_optimizado[$region_slug]['provinces'][$ciudad_slug]['districts'][$distrito_slug]['cities'][$ciudad_slug])) {
            $label = isset($cities_labels[$ciudad_slug]) ? $cities_labels[$ciudad_slug] : ucwords(strtolower($ciudad ?: 'Otros'));
            $geo_data_optimizado[$region_slug]['provinces'][$ciudad_slug]['districts'][$distrito_slug]['cities'][$ciudad_slug] = $label;
        }
    }

    // Guardar el ubigeo optimizado en la base de datos de WP
    update_option('adium_geo_data', $geo_data_optimizado);

    return '<div class="notice notice-success"><p>Importación completada. Doctores nuevos creados: '.$imported_count.'. Ubigeo optimizado y guardado.</p></div>';
}
