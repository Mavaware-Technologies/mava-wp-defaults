<?php

/**
 * Customize WP Admin footer
 */
add_filter('admin_footer_text', function () {
    return 'Developed by <a href="https://mava.pt" target="_blank">MAVA</a>';
}, 20);

/**
 * Disable Admin Notification of User Password Change
 */
if ( ! function_exists( 'wp_password_change_notification' ) ) {
    function wp_password_change_notification( $user ) {
        return;
    }
}

/**
 * Add contact form on dashboard
 */
add_action('wp_dashboard_setup', function () {
    remove_meta_box('dashboard_primary', 'dashboard', 'side');     // Notícias
    remove_meta_box('dashboard_welcome', 'dashboard', 'normal'); 
    // remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); // Rascunho rápido
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');  // Atividade
    
    wp_add_dashboard_widget('mava_support_widget', '📩 Suporte', 'mava_render_support_form');
});

function mava_render_support_form() {
    if (!empty($_POST['mava_question'])) {
        $message = sanitize_text_field($_POST['mava_question']);
        $site_name = get_bloginfo('name');
        $admin_email = get_option('admin_email');
        $subject = "[{$site_name}] Nova questão do WP Dashboard";

        ob_clean(); // limpa qualquer output pendente antes de enviar, por exemplo de debug
        wp_mail(
            $admin_email,
            $subject,
            $message,
            ['Content-Type: text/plain; charset=UTF-8']
        );
        echo '<p><strong>Obrigado! A sua questão foi enviada com sucesso.</strong></p>';
    }

    ?>
    <form method="post">
        <label for="mava_question">Descreva a sua questão:</label><br>
        <textarea name="mava_question" rows="4" style="width: 100%;"></textarea><br><br>
        <button type="submit" class="button button-primary">Enviar</button>
    </form>
    <?php
}
