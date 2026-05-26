<?php
/**
 * Register Custom Post Type: Especialista
 */
function adium_register_cpt_especialistas() {
    $labels = array(
        'name'                  => _x( 'Especialistas', 'Post Type General Name', 'adium-theme' ),
        'singular_name'         => _x( 'Especialista', 'Post Type Singular Name', 'adium-theme' ),
        'menu_name'             => __( 'Especialistas', 'adium-theme' ),
        'name_admin_bar'        => __( 'Especialista', 'adium-theme' ),
        'archives'              => __( 'Archivo de Especialistas', 'adium-theme' ),
        'attributes'            => __( 'Atributos de Especialista', 'adium-theme' ),
        'parent_item_colon'     => __( 'Especialista Padre:', 'adium-theme' ),
        'all_items'             => __( 'Todos los Especialistas', 'adium-theme' ),
        'add_new_item'          => __( 'Añadir Nuevo Especialista', 'adium-theme' ),
        'add_new'               => __( 'Añadir Nuevo', 'adium-theme' ),
        'new_item'              => __( 'Nuevo Especialista', 'adium-theme' ),
        'edit_item'             => __( 'Editar Especialista', 'adium-theme' ),
        'update_item'           => __( 'Actualizar Especialista', 'adium-theme' ),
        'view_item'             => __( 'Ver Especialista', 'adium-theme' ),
        'view_items'            => __( 'Ver Especialistas', 'adium-theme' ),
        'search_items'          => __( 'Buscar Especialista', 'adium-theme' ),
        'not_found'             => __( 'No se encontraron especialistas', 'adium-theme' ),
        'not_found_in_trash'    => __( 'No se encontraron especialistas en la papelera', 'adium-theme' ),
        'featured_image'        => __( 'Foto del Especialista', 'adium-theme' ),
        'set_featured_image'    => __( 'Establecer foto', 'adium-theme' ),
        'remove_featured_image' => __( 'Eliminar foto', 'adium-theme' ),
        'use_featured_image'    => __( 'Usar como foto', 'adium-theme' ),
        'insert_into_item'      => __( 'Insertar en especialista', 'adium-theme' ),
        'uploaded_to_this_item' => __( 'Subido a este especialista', 'adium-theme' ),
        'items_list'            => __( 'Lista de especialistas', 'adium-theme' ),
        'items_list_navigation' => __( 'Navegación de lista de especialistas', 'adium-theme' ),
        'filter_items_list'     => __( 'Filtrar lista de especialistas', 'adium-theme' ),
    );
    $args = array(
        'label'                 => __( 'Especialista', 'adium-theme' ),
        'description'           => __( 'Especialistas Médicos para la Demo Técnica de Adium', 'adium-theme' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'revisions' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-businessman',
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'especialistas',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'especialista', $args );
}
add_action( 'init', 'adium_register_cpt_especialistas', 0 );
