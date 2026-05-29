<?php
/**
 * Register ACF Fields via PHP
 */
if( function_exists('acf_add_local_field_group') ):

// 1. Especialistas details
acf_add_local_field_group(array(
    'key' => 'group_especialista_details',
    'title' => 'Detalles del Especialista',
    'fields' => array(
        array(
            'key' => 'field_esp_especialidad',
            'label' => 'Especialidad',
            'name' => 'especialidad',
            'type' => 'text',
            'required' => 1,
        ),
        array(
            'key' => 'field_esp_clinica_nombre',
            'label' => 'Nombre de la Clínica',
            'name' => 'clinica_nombre',
            'type' => 'text',
            'required' => 1,
        ),
        array(
            'key' => 'field_esp_clinica_direccion',
            'label' => 'Dirección de la Clínica',
            'name' => 'clinica_direccion',
            'type' => 'text',
            'required' => 1,
        ),
        array(
            'key' => 'field_esp_clinica_telefono_1',
            'label' => 'Teléfono Principal',
            'name' => 'clinica_telefono_1',
            'type' => 'text',
            'required' => 1,
        ),
        array(
            'key' => 'field_esp_clinica_telefono_2',
            'label' => 'Teléfono Secundario',
            'name' => 'clinica_telefono_2',
            'type' => 'text',
        ),
        array(
            'key' => 'field_esp_clinica_horario',
            'label' => 'Horario de Atención',
            'name' => 'clinica_horario',
            'type' => 'text',
            'default_value' => '9 am a 6 pm',
        ),
        array(
            'key' => 'field_esp_clinica_sitio_web',
            'label' => 'Sitio Web de la Clínica',
            'name' => 'clinica_sitio_web',
            'type' => 'text',
        ),
        array(
            'key' => 'field_esp_clinica_enlace_agenda',
            'label' => 'Enlace para Agenda tu Cita',
            'name' => 'clinica_enlace_agenda',
            'type' => 'url',
            'required' => 1,
        ),
        array(
            'key' => 'field_esp_social_facebook',
            'label' => 'Facebook URL',
            'name' => 'social_facebook',
            'type' => 'url',
        ),
        array(
            'key' => 'field_esp_social_instagram',
            'label' => 'Instagram URL',
            'name' => 'social_instagram',
            'type' => 'url',
        ),
        array(
            'key' => 'field_esp_social_linkedin',
            'label' => 'LinkedIn URL',
            'name' => 'social_linkedin',
            'type' => 'url',
        ),
        // Ubicación para los filtros
        array(
            'key' => 'field_esp_geo_departamento',
            'label' => 'Departamento',
            'name' => 'geo_departamento',
            'type' => 'select',
            'choices' => array(
                'lima' => 'Lima',
                'arequipa' => 'Arequipa',
                'la-libertad' => 'La Libertad',
            ),
            'required' => 1,
        ),
        array(
            'key' => 'field_esp_geo_provincia',
            'label' => 'Provincia',
            'name' => 'geo_provincia',
            'type' => 'select',
            'choices' => array(
                'lima' => 'Lima',
                'arequipa' => 'Arequipa',
                'trujillo' => 'Trujillo',
            ),
            'required' => 1,
        ),
        array(
            'key' => 'field_esp_geo_distrito',
            'label' => 'Distrito',
            'name' => 'geo_distrito',
            'type' => 'select',
            'choices' => array(
                'jesus-maria' => 'Jesús María',
                'miraflores' => 'Miraflores',
                'arequipa' => 'Arequipa (Distrito)',
                'trujillo' => 'Trujillo (Distrito)',
            ),
            'required' => 1,
        ),
        array(
            'key' => 'field_esp_geo_ciudad',
            'label' => 'Ciudad',
            'name' => 'geo_ciudad',
            'type' => 'select',
            'choices' => array(
                'lima' => 'Lima',
                'arequipa' => 'Arequipa',
                'trujillo' => 'Trujillo',
            ),
            'required' => 1,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'especialista',
            ),
        ),
    ),
));

// 2. Página de Inicio
acf_add_local_field_group(array(
    'key' => 'group_home_settings',
    'title' => 'Configuración de la Página de Inicio',
    'fields' => array(
        // Banner Consulta Especialistas
        array(
            'key' => 'field_home_banner_consulta_tab',
            'label' => 'Banner Consulta Especialistas',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_home_consulta_titulo',
            'label' => 'Título de Consulta',
            'name' => 'consulta_titulo',
            'type' => 'text',
            'default_value' => 'CONSULTA CON UN ESPECIALISTA Y RECIBE ORIENTACIÓN OPORTUNA',
        ),
        array(
            'key' => 'field_home_consulta_btn_txt',
            'label' => 'Texto del Botón Consulta',
            'name' => 'consulta_btn_txt',
            'type' => 'text',
            'default_value' => 'BUSCAR UN ESPECIALISTA',
        ),
        array(
            'key' => 'field_home_consulta_btn_url',
            'label' => 'URL del Botón Consulta',
            'name' => 'consulta_btn_url',
            'type' => 'url',
            'default_value' => '#',
        ),
        array(
            'key' => 'field_home_consulta_img',
            'label' => 'Imagen de los Médicos',
            'name' => 'consulta_img',
            'type' => 'image',
            'return_format' => 'url',
        ),
        // Pestañas de Autocuidado
        array(
            'key' => 'field_home_tabs_tab',
            'label' => 'Pestañas de Autocuidado',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_home_tabs_rep',
            'label' => 'Pestañas',
            'name' => 'tabs_autocuidado',
            'type' => 'repeater',
            'layout' => 'block',
            'button_label' => 'Añadir Pestaña',
            'sub_fields' => array(
                array(
                    'key' => 'field_tab_titulo',
                    'label' => 'Título de la Pestaña',
                    'name' => 'tab_titulo',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_tab_color',
                    'label' => 'Color de la Pestaña',
                    'name' => 'tab_color',
                    'type' => 'select',
                    'choices' => array(
                        'magenta' => 'Magenta',
                        'orange' => 'Naranja',
                    ),
                    'default_value' => 'orange',
                ),
                array(
                    'key' => 'field_tab_imagen',
                    'label' => 'Imagen del Consejo',
                    'name' => 'tab_imagen',
                    'type' => 'image',
                    'return_format' => 'url',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_tab_consejo_titulo',
                    'label' => 'Título del Consejo',
                    'name' => 'tab_consejo_titulo',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_tab_consejo_texto',
                    'label' => 'Texto del Consejo',
                    'name' => 'tab_consejo_texto',
                    'type' => 'textarea',
                    'required' => 1,
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));

// 2b. Configuración de la Página de Cuestionario
acf_add_local_field_group(array(
    'key' => 'group_cuestionario_settings',
    'title' => 'Configuración de la Página de Cuestionario',
    'fields' => array(
        // Banner Cuestionario
        array(
            'key' => 'field_cuest_banner_cuestionario_tab',
            'label' => 'Banner Cuestionario',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_cuest_cuestionario_titulo',
            'label' => 'Título del Banner',
            'name' => 'cuestionario_titulo',
            'type' => 'text',
            'default_value' => 'DA EL PRIMER PASO HACIA TU BIENESTAR',
        ),
        array(
            'key' => 'field_cuest_cuestionario_sub',
            'label' => 'Subtítulo del Banner',
            'name' => 'cuestionario_subtítulo',
            'type' => 'text',
            'default_value' => 'Haz un test rápido y descubre si necesitas apoyo profesional',
        ),
        array(
            'key' => 'field_cuest_cuestionario_btn_txt',
            'label' => 'Texto del Botón',
            'name' => 'cuestionario_btn_txt',
            'type' => 'text',
            'default_value' => 'Empezar cuestionario',
        ),
        array(
            'key' => 'field_cuest_cuestionario_btn_url',
            'label' => 'URL del Botón',
            'name' => 'cuestionario_btn_url',
            'type' => 'url',
            'default_value' => '#',
        ),
        array(
            'key' => 'field_cuest_cuestionario_img',
            'label' => 'Imagen del Banner',
            'name' => 'cuestionario_img',
            'type' => 'image',
            'return_format' => 'url',
        ),
        // Pestañas de Autocuidado
        array(
            'key' => 'field_cuest_tabs_tab',
            'label' => 'Pestañas de Autocuidado',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_cuest_tabs_rep',
            'label' => 'Pestañas',
            'name' => 'tabs_autocuidado',
            'type' => 'repeater',
            'layout' => 'block',
            'button_label' => 'Añadir Pestaña',
            'sub_fields' => array(
                array(
                    'key' => 'field_cuest_tab_titulo',
                    'label' => 'Título de la Pestaña',
                    'name' => 'tab_titulo',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_cuest_tab_color',
                    'label' => 'Color de la Pestaña',
                    'name' => 'tab_color',
                    'type' => 'select',
                    'choices' => array(
                        'magenta' => 'Magenta',
                        'orange' => 'Naranja',
                    ),
                    'default_value' => 'orange',
                ),
                array(
                    'key' => 'field_cuest_tab_imagen',
                    'label' => 'Imagen del Consejo',
                    'name' => 'tab_imagen',
                    'type' => 'image',
                    'return_format' => 'url',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_cuest_tab_consejo_titulo',
                    'label' => 'Título del Consejo',
                    'name' => 'tab_consejo_titulo',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_cuest_tab_consejo_texto',
                    'label' => 'Texto del Consejo',
                    'name' => 'tab_consejo_texto',
                    'type' => 'textarea',
                    'required' => 1,
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'page-cuestionario.php',
            ),
        ),
    ),
));

// 3. Configuración del Buscador (Página Preguntar)
acf_add_local_field_group(array(
    'key' => 'group_search_settings',
    'title' => 'Configuración del Buscador (Preguntar)',
    'fields' => array(
        array(
            'key' => 'field_search_banner_titulo',
            'label' => 'Título del Banner',
            'name' => 'search_banner_titulo',
            'type' => 'text',
            'default_value' => 'ENCUENTRA AL ESPECIALISTA CERCA DE TI',
        ),
        array(
            'key' => 'field_search_banner_imagen',
            'label' => 'Imagen del Banner (5 Especialistas)',
            'name' => 'search_banner_imagen',
            'type' => 'image',
            'return_format' => 'url',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'page-preguntar.php',
            ),
        ),
    ),
));

endif;

