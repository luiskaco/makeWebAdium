<?php
/**
 * Template Name: Buscador de Especialistas (Preguntar)
 */

get_header();

// Fetch specialists query
$args = array(
    'post_type' => 'especialista',
    'posts_per_page' => -1,
);
$query = new WP_Query($args);

// Pre-fill mock specialists if DB query has no posts (backup)
$show_mocks = !$query->have_posts();
$mock_specialists = array(
    array(
        'title' => 'Dr. Manuel Antonio Guerrero',
        'especialidad' => 'Endocrinología',
        'clinica_nombre' => 'CLINICA SAN FELIPE',
        'clinica_direccion' => 'Av. Gregorio Escobedo 650 , Jesús María',
        'clinica_telefono_1' => '(01) 219 - 0000',
        'clinica_telefono_2' => '964 299 054',
        'clinica_horario' => '9 am a 6 pm',
        'clinica_sitio_web' => 'www.clinicasanfelipe.com',
        'clinica_enlace_agenda' => '#',
        'social_facebook' => '#',
        'social_instagram' => '#',
        'social_linkedin' => '#',
        'dept' => 'lima',
        'prov' => 'lima',
        'dist' => 'jesus-maria',
        'city' => 'lima'
    ),
    array(
        'title' => 'Dra. María Elena Ramos',
        'especialidad' => 'Endocrinología Pediátrica',
        'clinica_nombre' => 'CLINICA SAN FELIPE - MIRAFLORES',
        'clinica_direccion' => 'Av. Alfredo Salazar 350, Miraflores',
        'clinica_telefono_1' => '(01) 444 - 1234',
        'clinica_telefono_2' => '987 654 321',
        'clinica_horario' => '8 am a 4 pm',
        'clinica_sitio_web' => 'www.clinicasanfelipe.com',
        'clinica_enlace_agenda' => '#',
        'social_facebook' => '#',
        'social_instagram' => '#',
        'social_linkedin' => '#',
        'dept' => 'lima',
        'prov' => 'lima',
        'dist' => 'miraflores',
        'city' => 'lima'
    ),
    array(
        'title' => 'Dr. Juan Carlos Mendoza',
        'especialidad' => 'Cardiología',
        'clinica_nombre' => 'CLINICA AREQUIPA',
        'clinica_direccion' => 'Av. Bolognesi 123, Yanahuara',
        'clinica_telefono_1' => '(054) 252525',
        'clinica_telefono_2' => '999 888 777',
        'clinica_horario' => '9 am a 5 pm',
        'clinica_sitio_web' => 'www.clinicaarequipa.com.pe',
        'clinica_enlace_agenda' => '#',
        'social_facebook' => '#',
        'social_instagram' => '#',
        'social_linkedin' => '#',
        'dept' => 'arequipa',
        'prov' => 'arequipa',
        'dist' => 'arequipa',
        'city' => 'arequipa'
    ),
    array(
        'title' => 'Dra. Sofia Benites',
        'especialidad' => 'Neurología',
        'clinica_nombre' => 'CLINICA SANTA ISABEL',
        'clinica_direccion' => 'Jr. Manuel Ubalde 456, Trujillo',
        'clinica_telefono_1' => '(044) 223344',
        'clinica_telefono_2' => '955 666 777',
        'clinica_horario' => '10 am a 7 pm',
        'clinica_sitio_web' => 'www.clinicasantaisabel.pe',
        'clinica_enlace_agenda' => '#',
        'social_facebook' => '#',
        'social_instagram' => '#',
        'social_linkedin' => '#',
        'dept' => 'la-libertad',
        'prov' => 'trujillo',
        'dist' => 'trujillo',
        'city' => 'trujillo'
    )
);
?>

<div class="search-specialist-container">

    <?php
    $banner_titulo = get_field('search_banner_titulo') ?: 'ENCUENTRA AL ESPECIALISTA CERCA DE TI';
    $banner_imagen = get_field('search_banner_imagen') ?: '';
    ?>
    <!-- 1. Banner Doctores -->
    <section class="banner-doctores-intro" style="margin: 30px 0; text-align: center;">
        <div class="banner-doctores-image-wrap">
            <?php if (!empty($banner_imagen)): ?>
                <img src="<?php echo esc_url($banner_imagen); ?>" alt="<?php echo esc_attr($banner_titulo); ?>">
            <?php else: ?>
                <div style="background: linear-gradient(135deg, #CBD5E1, #94A3B8); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-weight: bold; color: white; font-size: 1.5rem;">
                    👨‍⚕️👩‍⚕️ [Banner de 5 Especialistas Médicos]
                </div>
            <?php endif; ?>
        </div>
        <h2 style="color: var(--color-magenta); font-size: 2rem; font-weight: 800; text-transform: uppercase; margin-bottom: 10px;">
            <?php echo esc_html($banner_titulo); ?>
        </h2>
        <hr style="border: 0; height: 3px; background-color: var(--color-magenta); width: 60%; margin: 0 auto 30px auto; border-radius: 2px;">
    </section>

    <!-- 2. Formulario de Búsqueda (Con ID para interceptar en JS) -->
    <section class="search-form-section">
        <form id="search-doctors-form" method="GET" action="">
            <div class="search-form-grid">
                <div class="form-group">
                    <label for="dept">Departamento</label>
                    <select name="dept" id="dept" required>
                        <option value="">Seleccionar</option>
                        <option value="lima">Lima</option>
                        <option value="arequipa">Arequipa</option>
                        <option value="la-libertad">La Libertad</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="prov">Provincia</label>
                    <select name="prov" id="prov" required>
                        <option value="">Seleccionar</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dist">Distrito</label>
                    <select name="dist" id="dist" required>
                        <option value="">Seleccionar</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="city">Ciudad</label>
                    <select name="city" id="city" required>
                        <option value="">Seleccionar</option>
                    </select>
                </div>
            </div>
            <div class="search-submit-container">
                <button type="submit" class="btn-search-submit">BUSCAR</button>
            </div>
        </form>
    </section>

    <!-- 3. Contenedor de Resultados (Oculto por defecto mediante CSS en línea para asegurar el comportamiento de la demo) -->
    <section class="results-box-container" style="display: none; animation: fadeIn 0.4s ease-out;">
        <div style="margin-bottom: 30px; display: flex; justify-content: space-between; align-items: center;">
            <button id="back-to-search-btn" class="btn-cta" style="background-color: var(--color-orange); padding: 8px 20px; font-size: 0.95rem;">
                ← Realizar Nueva Búsqueda
            </button>
            <h3 style="color: var(--color-magenta); font-weight: 800;">Especialistas Encontrados</h3>
        </div>

        <div id="no-results-card" class="doctor-card" style="display: none; background-color: var(--color-orange); text-align: center; font-weight: 800; font-size: 1.2rem; justify-content: center; padding: 30px;">
            ⚠️ No se encontraron médicos especialistas en la ubicación seleccionada.
        </div>

        <div class="doctors-list">
            <?php if (!$show_mocks): ?>
                <?php while ($query->have_posts()): $query->the_post(); 
                    $esp = get_post();
                    $especialidad = get_field('especialidad', $esp->ID);
                    $clinica_nombre = get_field('clinica_nombre', $esp->ID);
                    $direccion = get_field('clinica_direccion', $esp->ID);
                    $tel1 = get_field('clinica_telefono_1', $esp->ID);
                    $tel2 = get_field('clinica_telefono_2', $esp->ID);
                    $horario = get_field('clinica_horario', $esp->ID) ?: '9 am a 6 pm';
                    $sitio_web = get_field('clinica_sitio_web', $esp->ID);
                    $agenda = get_field('clinica_enlace_agenda', $esp->ID);
                    $fb = get_field('social_facebook', $esp->ID);
                    $ig = get_field('social_instagram', $esp->ID);
                    $li = get_field('social_linkedin', $esp->ID);
                    
                    $card_dept = get_field('geo_departamento', $esp->ID);
                    $card_prov = get_field('geo_provincia', $esp->ID);
                    $card_dist = get_field('geo_distrito', $esp->ID);
                    $card_city = get_field('geo_ciudad', $esp->ID);
                ?>
                    <div class="doctor-card" 
                         data-dept="<?php echo esc_attr($card_dept); ?>" 
                         data-prov="<?php echo esc_attr($card_prov); ?>" 
                         data-dist="<?php echo esc_attr($card_dist); ?>" 
                         data-city="<?php echo esc_attr($card_city); ?>">
                        <div class="doctor-name-col">
                            <h3><?php the_title(); ?></h3>
                            <div class="specialty"><?php echo esc_html($especialidad); ?></div>
                        </div>
                        <div class="vertical-divider"></div>
                        <div class="doctor-details-col">
                            <div class="clinic-title"><?php echo esc_html($clinica_nombre); ?></div>
                            <div><?php echo esc_html($direccion); ?></div>
                            <div><?php echo esc_html($tel1 . ($tel2 ? ' / ' . $tel2 : '')); ?></div>
                            <div>Horario: <?php echo esc_html($horario); ?></div>
                            <?php if ($sitio_web): ?>
                                <div><a href="<?php echo esc_url('http://' . str_replace(array('http://', 'https://'), '', $sitio_web)); ?>" target="_blank" class="clinic-link"><?php echo esc_html($sitio_web); ?></a></div>
                            <?php endif; ?>
                            <div style="margin-top: 10px;">
                                <a href="<?php echo esc_url($agenda); ?>" target="_blank" class="clinic-link" style="font-weight: 800; font-size: 1.1rem;">
                                    AGENDA TU CITA AQUÍ ↗
                                </a>
                            </div>
                        </div>
                        <div class="social-links">
                            <?php if ($fb): ?><a href="<?php echo esc_url($fb); ?>" class="social-icon" target="_blank" aria-label="Facebook">f</a><?php endif; ?>
                            <?php if ($ig): ?><a href="<?php echo esc_url($ig); ?>" class="social-icon" target="_blank" aria-label="Instagram">ig</a><?php endif; ?>
                            <?php if ($li): ?><a href="<?php echo esc_url($li); ?>" class="social-icon" target="_blank" aria-label="LinkedIn">in</a><?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php endif; ?>

            <!-- Always output mocks with correct data-attributes as backup or additional data -->
            <?php foreach ($mock_specialists as $mock): ?>
                <div class="doctor-card" 
                     data-dept="<?php echo esc_attr($mock['dept']); ?>" 
                     data-prov="<?php echo esc_attr($mock['prov']); ?>" 
                     data-dist="<?php echo esc_attr($mock['dist']); ?>" 
                     data-city="<?php echo esc_attr($mock['city']); ?>">
                    <div class="doctor-name-col">
                        <h3><?php echo esc_html($mock['title']); ?></h3>
                        <div class="specialty"><?php echo esc_html($mock['especialidad']); ?></div>
                    </div>
                    <div class="vertical-divider"></div>
                    <div class="doctor-details-col">
                        <div class="clinic-title"><?php echo esc_html($mock['clinica_nombre']); ?></div>
                        <div><?php echo esc_html($mock['clinica_direccion']); ?></div>
                        <div><?php echo esc_html($mock['clinica_telefono_1'] . ' / ' . $mock['clinica_telefono_2']); ?></div>
                        <div>Horario: <?php echo esc_html($mock['clinica_horario']); ?></div>
                        <div><a href="#" class="clinic-link"><?php echo esc_html($mock['clinica_sitio_web']); ?></a></div>
                        <div style="margin-top: 10px;">
                            <a href="<?php echo esc_url($mock['clinica_enlace_agenda']); ?>" class="clinic-link" style="font-weight: 800; font-size: 1.1rem;">
                                AGENDA TU CITA AQUÍ ↗
                            </a>
                        </div>
                    </div>
                    <div class="social-links">
                        <a href="<?php echo esc_url($mock['social_facebook']); ?>" class="social-icon" aria-label="Facebook">f</a>
                        <a href="<?php echo esc_url($mock['social_instagram']); ?>" class="social-icon" aria-label="Instagram">ig</a>
                        <a href="<?php echo esc_url($mock['social_linkedin']); ?>" class="social-icon" aria-label="LinkedIn">in</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</div>

<?php
get_footer();
