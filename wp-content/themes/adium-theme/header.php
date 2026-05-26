<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container header-container">
        <div class="site-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-link">
                <span class="logo-quote logo-quote-left">“</span>
                <span class="logo-text">Hablar te quita<br>un peso de encima.</span>
                <span class="logo-quote logo-quote-right">”</span>
            </a>
        </div>
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="Menú">
            <span class="hamburger-bar"></span>
            <span class="hamburger-bar"></span>
            <span class="hamburger-bar"></span>
        </button>
        <nav class="main-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'fallback_cb'    => false,
                'container'      => false,
                'items_wrap'     => '<ul id="primary-menu" class="nav-menu">%3$s</ul>',
            ) );
            ?>
        </nav>
    </div>
</header>

<main class="site-main container">
