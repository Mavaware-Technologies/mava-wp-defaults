<?php
/*
Plugin Name: Mava Defaults
Description: Plugin com definições comuns a todas as instalações.
Version: 1.2.0
Author: Mava
Author URI: https://mava.pt
*/

if (!defined('ABSPATH')) exit;

// Composer autoload
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';

    // Atualizações via GitHub
    $updateChecker = Puc_v4_Factory::buildUpdateChecker(
        'https://github.com/Mavaware-Technologies/mava-wp-defaults/',
        __FILE__,
        'mava-wp-defaults'
    );

    // Se for repositório privado
    // $updateChecker->setAuthentication('teu_github_token');

    // Opcional: branch diferente
    // $updateChecker->setBranch('main');
}

// Hook de exemplo comum
// add_action('init', function () {
//     // Definições comuns, redireções, etc.
// });

// Aplicar definições caso plugins estejam ativos
add_action('plugins_loaded', function () {
    // if (is_plugin_active('advanced-custom-fields/acf.php')) {
    //     require_once __DIR__ . '/includes/acf.php';
    // }

    // if (is_plugin_active('perfmatters/perfmatters.php')) {
    //     require_once __DIR__ . '/includes/perfmatters.php';
    // }

    if (is_plugin_active('multibanco-ifthen-software-gateway-for-woocommerce/multibanco_ifthen_for_woocommerce.php')) {
        require_once __DIR__ . '/includes/ifthenpay.php';
    }
});
