<?php
/**
 * Template Name: Plantilla de Cuestionario
 */

get_header();

// Fetch banner ACF values or use default mocks
$cuestionario_titulo = get_field('cuestionario_titulo') ?: 'DA EL PRIMER PASO HACIA TU BIENESTAR';
$cuestionario_sub = get_field('cuestionario_subtítulo') ?: 'Haz un test rápido y descubre si necesitas apoyo profesional';
$cuestionario_btn = get_field('cuestionario_btn_txt') ?: 'Empezar cuestionario';
$cuestionario_url = get_field('cuestionario_btn_url') ?: '#';
$cuestionario_img = get_field('cuestionario_img') ?: esc_url( home_url( '/wp-content/uploads/2026/05/CONSULTA-CON-TU-ESPECIALISTA-1-BOTON.webp' ) );

$tabs = get_field('tabs_autocuidado') ?: array(
    array(
        'tab_titulo' => '3 - EXPLORA',
        'tab_color' => 'magenta',
        'tab_imagen' => esc_url( home_url( '/wp-content/uploads/2026/05/comida-saludable-tabs.png' ) ), 
        'tab_consejo_titulo' => 'PRUEBA PREGUNTARTE CÓMO TE SIENTES ANTES Y DESPUÉS DE CADA COMIDA.',
        'tab_consejo_texto' => 'A veces, no se trata de hambre física, sino de estrés, aburrimiento o emociones. Con esos datos, tu médico podrá darte ideas y estrategias que se adapten a tu situación personalizada, para que comer sea más placentero y equilibrado.(21)'
    ),
    array(
        'tab_titulo' => '4 - OBSERVA TU SUEÑO',
        'tab_color' => 'orange',
        'tab_imagen' => esc_url( home_url( '/wp-content/uploads/2026/05/sueno-cozy-tabs.png' ) ), 
        'tab_consejo_titulo' => 'REGISTRA LA CALIDAD DE TU SUEÑO DIARIAMENTE.',
        'tab_consejo_texto' => 'El sueño repara tu mente y cuerpo. Anota tus horas de sueño y cómo te sientes al despertar para descubrir patrones y mejorar tu descanso.'
    ),
    array(
        'tab_titulo' => '5 - REGISTRA TUS HABITOS',
        'tab_color' => 'orange',
        'tab_imagen' => esc_url( home_url( '/wp-content/uploads/2026/05/habitos-rutina-tabs.png' ) ), 
        'tab_consejo_titulo' => 'LLEVA UN REGISTRO DE TUS HÁBITOS DIARIOS.',
        'tab_consejo_texto' => 'Monitorear tus hábitos te permite identificar áreas de mejora en tu bienestar. Registra tus comidas, ejercicio y nivel de hidratación.'
    )
);
?>

<div class="cuestionario-page-container">

    <!-- 1. Módulo interactivo de pestañas -->
    <section class="tabs-section">
        <div class="tabs-nav">
            <?php foreach ($tabs as $index => $tab): ?>
                <button class="tab-btn tab-<?php echo esc_attr($tab['tab_color']); ?> <?php echo $index === 0 ? 'active' : ''; ?>" data-tab="<?php echo $index; ?>">
                    <?php echo esc_html($tab['tab_titulo']); ?>
                </button>
            <?php endforeach; ?>
        </div>

        <div class="tabs-content">
            <?php foreach ($tabs as $index => $tab): ?>
                <div class="tab-content-container <?php echo $index === 0 ? 'active' : ''; ?>" id="tab-content-<?php echo $index; ?>">
                    <div class="tab-image">
                        <?php if (!empty($tab['tab_imagen'])): ?>
                            <img src="<?php echo esc_url($tab['tab_imagen']); ?>" alt="<?php echo esc_attr($tab['tab_consejo_titulo']); ?>">
                        <?php else: ?>
                            <div style="background: linear-gradient(135deg, #F59A6D, #D82B5A); width: 100%; height: 200px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; border-radius: 16px;">
                                🥗 [Foto de Alimentación Saludable]
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="tab-info">
                        <h2 class="tab-info-title"><?php echo esc_html($tab['tab_consejo_titulo']); ?></h2>
                        <p class="tab-info-text"><?php echo esc_html($tab['tab_consejo_texto']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- 2. Banner Cuestionario -->
    <section class="cuestionario-banner-section">
        <div class="hero-banner">
            <div class="hero-banner-content">
                <h2 class="hero-banner-title"><?php echo esc_html($cuestionario_titulo); ?></h2>
                <p class="hero-banner-subtitle"><?php echo esc_html($cuestionario_sub); ?></p>
                <a href="<?php echo esc_url($cuestionario_url); ?>" class="btn-cta">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 8px; vertical-align: text-bottom; display: inline-block;"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <?php echo esc_html($cuestionario_btn); ?>
                </a>
            </div>
            <div class="hero-banner-image">
                <?php if (!empty($cuestionario_img)): ?>
                    <img src="<?php echo esc_url($cuestionario_img); ?>" alt="Test de bienestar emocional">
                <?php else: ?>
                    <div style="background: linear-gradient(45deg, #E2E8F0, #CBD5E1); width: 100%; height: 320px; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #475569;">
                        📱 [Imagen: Mano con Teléfono Móvil]
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

</div>

<?php
get_footer();

