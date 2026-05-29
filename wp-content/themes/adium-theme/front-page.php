<?php
/**
 * The template for displaying the front page
 */

get_header();

// Fetch banner ACF values or use default mocks
$consulta_titulo = get_field('consulta_titulo') ?: 'CONSULTA CON UN ESPECIALISTA Y RECIBE ORIENTACIÓN OPORTUNA';
$consulta_btn = get_field('consulta_btn_txt') ?: 'BUSCAR UN ESPECIALISTA';
$consulta_url = get_field('consulta_btn_url') ?: esc_url( home_url( '/preguntar/' ) );
$consulta_img = get_field('consulta_img') ?: '';

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

<div class="front-page-container">

    <!-- Sección Hero (Imagen 1 recreada en HTML/CSS) -->
    <section class="hero-banner-main" style="background-image: url('<?php echo esc_url( home_url( '/wp-content/uploads/2026/05/hero_bg.png' ) ); ?>');">
        <div class="hero-banner-main-overlay"></div>
        <div class="container hero-banner-main-content">
            <div class="hero-quote-box">
                <span class="hero-quote-mark left-quote">“</span>
                <h1 class="hero-quote-text">Hablar<br>te quita<br>un peso de<br>encima.</h1>
                <span class="hero-quote-mark right-quote">”</span>
            </div>
            <h2 class="hero-sub-title">¡Gracias por sumarte!</h2>
            <p class="hero-sub-text">La obesidad es una enfermedad compleja que implica múltiples factores. Hablar de sus señales es dar el primer paso para abordarla y empezar a mejorar la calidad de vida.</p>
        </div>
        <div class="hero-scroll-arrows">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.7)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 13l5 5 5-5M7 6l5 5 5-5"/></svg>
        </div>
    </section>

    <!-- Secciones adicionales en secuencia -->
    <!-- Sección Videos Testimoniales (Imagen 2 recreada en HTML/CSS) -->
    <section class="testimonial-videos-section container">
        <div class="tv-left-col">
            <h2 class="tv-title">¿Por qué la obesidad es<br>considerada una enfermedad?</h2>
            <p class="tv-text">La obesidad no es un tema estético ni de fuerza de voluntad: es una enfermedad crónica que afecta al cuerpo y a la mente. Se relaciona con alteraciones metabólicas y aumenta el riesgo de múltiples problemas de salud. Como toda enfermedad, requiere diagnóstico y acompañamiento médico. Entenderla como tal es el primer paso para empezar a tratarla con seriedad y esperanza. <sup>(1)</sup></p>
        </div>
        <div class="tv-right-col">
            <!-- Video 1 -->
            <div class="tv-video-card">
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/05/video1_thumb.png' ) ); ?>" alt="Testimonio Mujer" class="tv-video-thumb">
                <div class="tv-video-overlay">
                    <div class="tv-play-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="var(--color-text-dark)" stroke="none"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                    </div>
                    <div class="tv-quote-box">
                        <p class="tv-quote">"Pensaba que todo era cuestión<br>de dietas y ejercicios, pero no"</p>
                    </div>
                    <p class="tv-subtext">Mirá esta historia y empecemos a hablar.</p>
                </div>
            </div>
            <!-- Video 2 -->
            <div class="tv-video-card">
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/05/video2_thumb.png' ) ); ?>" alt="Testimonio Hombre" class="tv-video-thumb">
                <div class="tv-video-overlay">
                    <div class="tv-play-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="var(--color-text-dark)" stroke="none"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                    </div>
                    <div class="tv-quote-box">
                        <p class="tv-quote">"Lo más difícil fue entender<br>que la obesidad es una enfermedad"</p>
                    </div>
                    <p class="tv-subtext">Mirá esta historia y empecemos a hablar.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Síntomas y Consecuencias (Imagen 3 recreada en HTML/CSS) -->
    <section class="symptoms-section container">
        <h2 class="symptoms-main-title">Cuando tu cuerpo quiere hablar por ti.</h2>
        <p class="symptoms-main-subtitle">La obesidad no siempre llega sola. Hablar de sus señales y de sus consecuencias ocultas es el primer paso para reconocerlas... y para quitarte un peso de encima.</p>

        <div class="symptoms-cards-wrapper">
            <button class="symptoms-nav-btn symptoms-nav-prev" aria-label="Anterior">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#2F3E46" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
            </button>
            
            <div class="symptoms-cards-container">
                <!-- Card 1 -->
                <div class="symptom-card">
                    <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/05/2.1.png' ) ); ?>" alt="Icono gota" class="symptom-icon">
                    <h3 class="symptom-title">Diabetes tipo 2</h3>
                    <p class="symptom-text">¿Sientes mucha sed, cansancio<br>o visión borrosa? <sup>(2)</sup></p>
                </div>
                <!-- Card 2 -->
                <div class="symptom-card">
                    <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/05/2.2.png' ) ); ?>" alt="Icono presión arterial" class="symptom-icon">
                    <h3 class="symptom-title">Hipertensión arterial</h3>
                    <p class="symptom-text">¿Te has medido la presión<br>arterial últimamente? <sup>(3)</sup></p>
                </div>
                <!-- Card 3 -->
                <div class="symptom-card">
                    <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/05/2.3.png' ) ); ?>" alt="Icono corazón" class="symptom-icon">
                    <h3 class="symptom-title">Enfermedad<br>cardiovascular</h3>
                    <p class="symptom-text">¿Te falta el aire o sientes<br>dolor en el pecho? <sup>(4)</sup></p>
                </div>
            </div>

            <button class="symptoms-nav-btn symptoms-nav-next" aria-label="Siguiente">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#2F3E46" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
            </button>
        </div>
        
        <p class="symptoms-footer-text"><strong>Estos síntomas no siempre significan obesidad, pero pueden estar relacionados con ella.</strong> Muchos pasamos<br>por lo mismo, y que <strong>hables con tu médico</strong> es un paso importante que te ayudará a recuperar tu bienestar.</p>
    </section>

    <!-- Sección de Preguntas Frecuentes (Imagen 4 recreada en HTML/CSS) -->
    <section class="faq-cards-section container">
        <h2 class="faq-cards-main-title">Hacer preguntas es una forma de cuidarte</h2>
        <p class="faq-cards-main-subtitle">La obesidad puede generar muchas dudas y percepciones que no siempre reflejan la realidad. Estas respuestas brindan información clara para comprenderla mejor y dar el paso de hablar con tu médico.</p>

        <div class="faq-cards-wrapper">
            <button class="faq-nav-btn faq-nav-prev" aria-label="Anterior">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
            </button>
            
            <div class="faq-cards-container">
                <div class="faq-card bg-orange card-pos-1">
                    <p class="faq-card-text">¿Qué significa realmente vivir con obesidad? <sup>(8)</sup></p>
                    <a href="#" class="faq-card-link">VER RESPUESTA</a>
                </div>
                <div class="faq-card bg-magenta card-pos-2">
                    <p class="faq-card-text">¿Es la obesidad una consecuencia de la falta de voluntad? <sup>(9)</sup></p>
                    <a href="#" class="faq-card-link">VER RESPUESTA</a>
                </div>
                <div class="faq-card bg-salmon card-pos-3">
                    <p class="faq-card-text">¿Qué relación existe entre la obesidad y el bienestar emocional? <sup>(11)</sup></p>
                    <a href="#" class="faq-card-link">VER RESPUESTA</a>
                </div>
                <div class="faq-card bg-dark card-pos-4">
                    <p class="faq-card-text">¿Cómo sé si lo mío es sobrepeso o ya obesidad? <sup>(12)</sup></p>
                    <a href="#" class="faq-card-link">VER RESPUESTA</a>
                </div>
                <div class="faq-card bg-magenta card-pos-5">
                    <p class="faq-card-text">¿Hay una única forma de hacer frente a la enfermedad? <sup>(10)</sup></p>
                    <a href="#" class="faq-card-link">VER RESPUESTA</a>
                </div>
            </div>

            <button class="faq-nav-btn faq-nav-next" aria-label="Siguiente">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
            </button>
        </div>
    </section>

    <!-- Sección Calculadoras: IMC e ICA (Imágenes 5 y 6 recreadas en HTML/CSS) -->
    <section class="calculators-section container">
        <h2 class="calculators-main-title">Prepárate para hablar con un profesional médico.</h2>
        <p class="calculators-main-subtitle">La idea de este conjunto de herramientas es ayudarte a revisar tus hábitos, darte tips y generar preguntas, para brindarte confianza y seguridad a la hora de hablar con tu médico.</p>

        <!-- ================= CALCULADORA IMC (Imagen 5) ================= -->
        <div class="calculator-card">
            <h3 class="calculator-card-title">1 - Calcula tu IMC</h3>
            <hr class="calculator-card-divider">
            <p class="calculator-card-desc">Ingresa tu altura y tu peso para obtener tu índice de masa corporal. <sup>(18 - 19 - 20)</sup></p>
            <form class="calculator-form" onsubmit="event.preventDefault();">
                <div class="calculator-input-group">
                    <label>Tu altura (cm)</label>
                    <input type="number" placeholder="Ej.: 170" required>
                </div>
                <div class="calculator-input-group">
                    <label>Tu peso (kg)</label>
                    <input type="number" placeholder="Ej.: 65" required>
                </div>
            </form>
            <div class="calculator-action">
                <button type="submit" class="calculator-btn">CALCULAR</button>
            </div>
        </div>
        
        <!-- Banner Informativo IMC -->
        <div class="calculator-info-banner">
            <div class="info-banner-left">
                <div class="info-icon">?</div>
                <h4 class="info-title">¿Qué es el IMC?</h4>
            </div>
            <div class="info-banner-right">
                <p class="info-text">El índice de masa corporal es un índice simple recomendado por la OMS, que se utiliza comúnmente para clasificar a los adultos en bajo peso, normopeso, sobrepeso y la obesidad. Se define como el peso en kilogramos dividido entre la talla en metros al cuadrado (kg/m²). <sup>(18-20)</sup></p>
            </div>
        </div>

        <!-- ================= CALCULADORA ICA (Imagen 6) ================= -->
        <div class="calculator-card">
            <h3 class="calculator-card-title">2 - Calcula tu ICA</h3>
            <hr class="calculator-card-divider">
            <p class="calculator-card-desc">Para obtener tu ICA (índice cintura-altura), mide tu cintura colocando una cinta métrica alrededor de tu abdomen, a la altura del ombligo y mide también tu altura. Introduce estos valores en la siguiente calculadora: <sup>(24-26)</sup></p>
            <form class="calculator-form" onsubmit="event.preventDefault();">
                <div class="calculator-input-group">
                    <label>Tu cintura (cm)</label>
                    <input type="number" placeholder="Ej.: 90" required>
                </div>
                <div class="calculator-input-group">
                    <label>Tu altura (cm)</label>
                    <input type="number" placeholder="Ej.: 170" required>
                </div>
            </form>
            <div class="calculator-action">
                <button type="submit" class="calculator-btn">CALCULAR</button>
            </div>
        </div>

        <!-- Banner Informativo ICA -->
        <div class="calculator-info-banner">
            <div class="info-banner-left">
                <div class="info-icon">?</div>
                <h4 class="info-title">¿Qué es el ICA?</h4>
            </div>
            <div class="info-banner-right">
                <p class="info-text">El índice cintura-altura es una medida práctica para evaluar la distribución del tejido graso corporal y se usa en conjunto con el índice de masa corporal (IMC) para complementar la evaluación del médico tratante. <sup>(25)</sup></p>
            </div>
        </div>
    </section>

    <!-- 1. Banner Consulta con Especialistas (Arriba de los tabs) -->
    <section class="consulta-banner-section">
        <div class="hero-banner" style="--banner-bg: #FFF5F7; background: var(--banner-bg);">
            <div class="hero-banner-content">
                <h2 class="hero-banner-title"><?php echo esc_html($consulta_titulo); ?></h2>
                <a href="<?php echo esc_url($consulta_url); ?>" class="btn-cta">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 8px; vertical-align: text-bottom; display: inline-block;"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <?php echo esc_html($consulta_btn); ?>
                </a>
            </div>
            <div class="hero-banner-image">
                <?php if (!empty($consulta_img)): ?>
                    <img src="<?php echo esc_url($consulta_img); ?>" alt="Especialistas médicos sonriendo">
                <?php else: ?>
                    <div style="background: linear-gradient(45deg, #FFF5F7, #FFE4E6); width: 100%; height: 320px; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #E11D48;">
                        🩺 [Imagen: Grupo de 5 Especialistas]
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- 2. Módulo interactivo de pestañas -->
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
                            <!-- Fallback premium SVG/CSS shape representation matching salad bowl graphic -->
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

    <!-- Sección 7: La Voz de los Especialistas (recreada en HTML con arte de 7.png) -->
    <section class="specialists-voice-section">
        <h2 class="sv-title">La voz de los especialistas</h2>
        <p class="sv-subtitle">Según médicos especialistas, estos son los temas que los pacientes más <strong>necesitan hablar durante la consulta</strong></p>

        <div class="sv-slider-wrapper">
            <button class="sv-nav sv-nav--prev" id="sv-prev" aria-label="Anterior">&#8249;</button>

            <div class="sv-cards-track">
                <!-- Card 1 - Doctora -->
                <div class="sv-card">
                    <div class="sv-card-img-wrap">
                        <img class="sv-card-img" src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/05/7.1.webp' ) ); ?>" alt="Especialista Nutrición y alimentación">
                    </div>
                </div>

                <!-- Card 2 - Doctor con pregunta activa -->
                <div class="sv-card sv-card--featured">
                    <div class="sv-card-img-wrap">
                        <img class="sv-card-img" src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/05/7.2.webp' ) ); ?>" alt="Especialista Obesidad y bienestar">
                    </div>
                </div>

                <!-- Card 3 - Doctor con pregunta -->
                <div class="sv-card sv-card--featured">
                    <div class="sv-card-img-wrap">
                        <img class="sv-card-img" src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/05/7.3.webp' ) ); ?>" alt="Especialista Familia y tratamiento">
                    </div>
                </div>
            </div>

            <button class="sv-nav sv-nav--next" id="sv-next" aria-label="Siguiente">&#8250;</button>
        </div>
    </section>

    <!-- Sección 8: Info Cards — Layout HTML/CSS fiel al diseño (sin imágenes recortadas) -->
    <section class="info-cards-section">

        <!-- Tarjeta: Obesidad -->
        <div class="info-card-col">
            <img class="info-card-img" src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/05/8.1.png' ) ); ?>" alt="Mujer sonriendo al aire libre">
            <div class="info-card-content">
                <h3 class="info-card-title">¿Deseas saber más sobre la obesidad? Descubre más sobre el tema</h3>
                <a href="#" class="info-card-btn">Más información</a>
            </div>
        </div>

        <!-- Tarjeta: Diabetes -->
        <div class="info-card-col">
            <img class="info-card-img" src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/05/8.2.png' ) ); ?>" alt="Frutas, verduras y medidor de glucosa">
            <div class="info-card-content">
                <h3 class="info-card-title">¿Deseas saber más de la Diabetes tipo 2? Encuentra todo sobre esta enfermedad aquí.</h3>
                <a href="#" class="info-card-btn">Más información</a>
            </div>
        </div>

    </section>


    <!-- Recreación del Banner 9 en Código HTML (Newsletter) -->
    <section class="newsletter-section">
        <h2 class="newsletter-title">¿Seguimos en contacto?</h2>
        <p class="newsletter-subtitle">Recibe información valiosa con recomendaciones saludables y tratamientos, con contenido generado por los mejores profesionales. Recuerda que tu médico tratante es el profesional en salud a quién debes dirigir tus consultas.</p>
        <form class="newsletter-form">
            <input type="email" placeholder="Tu e-mail" class="newsletter-input" required>
            <button type="submit" class="newsletter-submit-btn">Enviar</button>
        </form>
        <div class="newsletter-references">
            <a href="#" class="references-toggle">+ Referencias (Click para ver)</a>
        </div>
    </section>

</div>

<?php
get_footer();

