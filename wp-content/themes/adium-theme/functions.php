<?php
/**
 * Adium Theme functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Enable support for custom logo and menus
function adium_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'adium-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'adium_setup' );

// Enqueue styles and scripts
function adium_enqueue_scripts() {
    // Enqueue Google Font Montserrat
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,700;0,800;1,300&display=swap', array(), null );
    
    // Main stylesheet
    wp_enqueue_style( 'adium-style', get_stylesheet_uri(), array(), '2.4.0' );

    // Enqueue jQuery
    wp_enqueue_script( 'jquery' );

    // Dynamic select and search animation scripts
    wp_add_inline_script( 'jquery', '
        jQuery(document).ready(function($) {
            // 0. Mobile Menu Toggle
            $(".menu-toggle").click(function() {
                var expanded = $(this).attr("aria-expanded") === "true";
                $(this).attr("aria-expanded", !expanded);
                $(this).toggleClass("is-open");
                $(".main-navigation .nav-menu").slideToggle(280);
            });

            // 1. Interactive Tabs Logic
            $(".tab-btn").click(function() {
                var tabId = $(this).data("tab");
                $(".tab-btn").removeClass("active");
                $(this).addClass("active");
                
                $(".tab-content-container").removeClass("active");
                $("#tab-content-" + tabId).addClass("active");
            });

            // 2. Nested Selects Geographic Data Map (Obtenido dinámicamente de la Base de Datos)
            var geoData = ' . json_encode(get_option('adium_geo_data', new stdClass())) . ';

            // Populate Departamentos on load
            var $deptSelect = $("#dept");
            if (Object.keys(geoData).length > 0) {
                $.each(geoData, function(key, data) {
                    $deptSelect.append($("<option>", { value: key, text: data.label }));
                });
            }

            // Update Provinces when Departamento changes
            $("#dept").change(function() {
                var deptVal = $(this).val();
                var $prov = $("#prov");
                var $dist = $("#dist");
                var $city = $("#city");
                
                $prov.html("<option value=\"\">Seleccionar</option>").val("");
                $dist.html("<option value=\"\">Seleccionar</option>").val("");
                $city.html("<option value=\"\">Seleccionar</option>").val("");
                
                if (deptVal && geoData[deptVal]) {
                    var provinces = geoData[deptVal].provinces;
                    $.each(provinces, function(key, data) {
                        $prov.append($("<option>", { value: key, text: data.label }));
                    });
                }
            });

            // Update Districts when Provincia changes
            $("#prov").change(function() {
                var deptVal = $("#dept").val();
                var provVal = $(this).val();
                var $dist = $("#dist");
                var $city = $("#city");
                
                $dist.html("<option value=\"\">Seleccionar</option>").val("");
                $city.html("<option value=\"\">Seleccionar</option>").val("");
                
                if (deptVal && provVal && geoData[deptVal].provinces[provVal]) {
                    var districts = geoData[deptVal].provinces[provVal].districts;
                    $.each(districts, function(key, data) {
                        $dist.append($("<option>", { value: key, text: data.label }));
                    });
                }
            });

            // Update Cities when Distrito changes
            $("#dist").change(function() {
                var deptVal = $("#dept").val();
                var provVal = $("#prov").val();
                var distVal = $(this).val();
                var $city = $("#city");
                
                $city.html("<option value=\"\">Seleccionar</option>").val("");
                
                if (deptVal && provVal && distVal && geoData[deptVal].provinces[provVal].districts[distVal]) {
                    var cities = geoData[deptVal].provinces[provVal].districts[distVal].cities;
                    $.each(cities, function(key, name) {
                        $city.append($("<option>", { value: key, text: name }));
                    });
                }
            });

            // 3. Search Submit Action with Transition Animation
            $("#search-doctors-form").submit(function(e) {
                e.preventDefault();
                
                var dept = $("#dept").val();
                var prov = $("#prov").val();
                var dist = $("#dist").val();
                var city = $("#city").val();
                
                if (!dept || !prov || !dist || !city) {
                    alert("Por favor, selecciona todas las opciones de filtrado.");
                    return;
                }

                // Smooth Fade-out of Search Box
                $(".search-form-section").fadeOut(400, function() {
                    var found = 0;
                    
                    // Show only cards matching selection
                    $(".doctor-card").each(function() {
                        var cardDept = $(this).data("dept");
                        var cardProv = $(this).data("prov");
                        var cardDist = $(this).data("dist");
                        var cardCity = $(this).data("city");
                        
                        if (cardDept == dept && cardProv == prov && cardDist == dist && cardCity == city) {
                            $(this).show();
                            found++;
                        } else {
                            $(this).hide();
                        }
                    });
                    
                    if (found === 0) {
                        $("#no-results-card").show();
                    } else {
                        $("#no-results-card").hide();
                    }
                    
                    // Smooth Fade-in of Results Container in the same space
                    $(".results-box-container").fadeIn(400);
                });
            });

            // Go back to search box
            $("#back-to-search-btn").click(function(e) {
                e.preventDefault();
                $(".results-box-container").fadeOut(400, function() {
                    $(".search-form-section").fadeIn(400);
                });
            });
        });
    ' );
}
add_action( 'wp_enqueue_scripts', 'adium_enqueue_scripts' );

// Include Custom Post Types and ACF fields
require_once get_template_directory() . '/inc/cpts-especialistas.php';
require_once get_template_directory() . '/inc/acf-fields.php';

// Include Data Import Script
require_once get_template_directory() . '/inc/import-data.php';

// Allow JSON file uploads
function adium_allow_json_uploads( $mimes ) {
    $mimes['json'] = 'application/json';
    return $mimes;
}
add_filter( 'upload_mimes', 'adium_allow_json_uploads' );
