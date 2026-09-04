<?php
/**
 * Plugin Name: Shopier Dijital Stok Pro
 * Description: Profesyonel Shopier OSB entegrasyonu ile otomatik dijital ürün teslimi, stok yönetimi, raporlama ve WooCommerce bütünleşmesi.
 * Version: 2.0.0
 * Author: MacroShop Development
 * Author URI: https://macroshoptr.com.tr
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: shopier-digital-stock-pro
 * Domain Path: /languages
 * Requires at least: 5.0
 * Requires PHP: 7.4
 * WC requires at least: 3.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('SHOPIER_STOCK_PRO_VERSION', '2.0.0');
define('SHOPIER_STOCK_PRO_PATH', plugin_dir_path(__FILE__));
define('SHOPIER_STOCK_PRO_URL', plugin_dir_url(__FILE__));
define('SHOPIER_STOCK_PRO_BASENAME', plugin_basename(__FILE__));

// Include required files
require_once SHOPIER_STOCK_PRO_PATH . 'includes/class-plugin.php';
require_once SHOPIER_STOCK_PRO_PATH . 'includes/class-database.php';
require_once SHOPIER_STOCK_PRO_PATH . 'includes/class-rest-api.php';
require_once SHOPIER_STOCK_PRO_PATH . 'includes/class-admin.php';
require_once SHOPIER_STOCK_PRO_PATH . 'includes/class-settings.php';
require_once SHOPIER_STOCK_PRO_PATH . 'includes/helpers.php';

// Initialize plugin
add_action('plugins_loaded', function() {
    \ShopierStockPro\Plugin::instance();
});

// Activation hook
register_activation_hook(__FILE__, function() {
    \ShopierStockPro\Database::create_tables();
    flush_rewrite_rules();
});

// Deactivation hook
register_deactivation_hook(__FILE__, function() {
    flush_rewrite_rules();
});
