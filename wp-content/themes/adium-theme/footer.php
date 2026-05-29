</main><!-- .site-main -->

<footer class="site-footer">

    <!-- Franja principal: Cita + Aviso educativo | ENLACES -->
    <div class="container footer-grid-container">
        <div class="footer-left-col">
            <div class="footer-logo-quote-box">
                <span class="logo-quote-footer logo-quote-left">"</span>
                <span class="logo-text-footer">Hablar te quita<br>un peso de encima.</span>
                <span class="logo-quote-footer logo-quote-right">"</span>
            </div>
            <p class="footer-educational-notice">
                La información de esta página es educativa, dirigida al público en general, y no reemplaza la consulta con un profesional de la salud.
            </p>
        </div>

        <div class="footer-right-col">
            <div class="footer-nav-links-wrap">
                <span class="footer-nav-label">Enlaces</span>
                <div class="footer-nav-inline-links">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Adium</a>
                    <span class="footer-bullet">·</span>
                    <a href="#">Política de privacidad</a>
                    <span class="footer-bullet">·</span>
                    <a href="<?php echo esc_url( home_url( '/terminos-y-condiciones/' ) ); ?>">Términos y condiciones</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Línea divisoria -->
    <div class="footer-divider"></div>

    <!-- Sub-barra inferior: Logo Adium + Redes Sociales -->
    <div class="container footer-bottom-bar">
        <div class="footer-brand">
            <img
                src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/favicon.png"
                alt="Adium logo"
                class="footer-brand-icon"
            >
            <span class="footer-brand-name">Adium</span>
        </div>

        <!-- Íconos de redes sociales -->
        <div class="footer-social-icons">
            <a href="#" class="footer-social-link" aria-label="Instagram">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg>
            </a>
            <a href="#" class="footer-social-link" aria-label="LinkedIn">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                    <rect x="2" y="9" width="4" height="12"></rect>
                    <circle cx="4" cy="4" r="2"></circle>
                </svg>
            </a>
            <a href="#" class="footer-social-link" aria-label="Facebook">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                </svg>
            </a>
        </div>
    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
