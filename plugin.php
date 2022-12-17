<?php

/**
 * Plugin Name: Multi Step Ajax Checkout
 * Plugin URI: https://github.com/mahmudhaisan/
 * Description: Multi Step Ajax Product Checkout
 * Version: 1.1
 * Author: Mahmud haisan
 * Author URI: https://github.com/mahmudhaisan
 * Developer: Mahmud Haisan
 * Developer URI: https://github.com/mahmudhaisan
 * Text Domain: msac493
 * Domain Path: /languages
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The Main Plugin Class
 */
final class Multi_Step_Ajax_Checkout
{

    /**
     *  * plugin version
     * @var string
     */
    const VERSION = '1.0';

    /**
     * Class Constructor
     */
    private function __construct()
    {
        $this->define_Plugin_comstants();
        register_activation_hook(__FILE__, [$this, 'activate']); // activation hook
        add_action('plugins_loaded', [$this, 'init_plugin']); //plugin init
        add_action('wp_enqueue_scripts', [$this, 'enqueue_files']);
    }

    /**
     * Initialize Singleton Instance
     */
    public static function init()
    {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define Plugin Constants
     */
    public function define_Plugin_comstants()
    {
        define('MULTI_STEP_AJAX_PLUGIN_VERSION', self::VERSION);
        define('MULTI_STEP_AJAX_FILE_PATH', __FILE__);
        define('MULTI_STEP_AJAX_DIR_PATH', __DIR__);
        define('MULTI_STEP_AJAX_PLUGINS_DIR_PATH', plugin_dir_path(__FILE__));
        define('MULTI_STEP_AJAX_PLUGIN_URL', plugins_url('', MULTI_STEP_AJAX_FILE_PATH));
        define('MULTI_STEP_AJAX_PLUGIN_ASSETS', MULTI_STEP_AJAX_PLUGIN_URL . '/assets');
    }

    /**
     * plugin activation callback function
     *
     * @return void
     */
    public function activate()
    {

        update_option('multi_step_ajax_plugin_version', MULTI_STEP_AJAX_PLUGIN_VERSION);
    }

    /**
     * plugins activity after activating the plugin
     *
     * @return plugins basic things
     */
    public function init_plugin()
    {
        // works for backend
        if (is_admin()) {
            // admin menu class initialize
            new Multi\Checkout\Admin();
        } else { // for elsewhere
            new Multi\Checkout\Frontend(); // Frontend class initialize
        }
    }

    //enqueue files
    public function enqueue_files()
    {
        $woo_currency_symbol = get_woocommerce_currency_symbol();
        // styles
        wp_enqueue_style('bootstrap-file', MULTI_STEP_AJAX_PLUGIN_ASSETS . '/css/bootstrap.min.css');
        wp_enqueue_style('datepicker-file', MULTI_STEP_AJAX_PLUGIN_ASSETS . '/css/bootstrap-datepicker.css');
        wp_enqueue_style('style-file', MULTI_STEP_AJAX_PLUGIN_ASSETS . '/css/style.css');
        wp_enqueue_style('fontawesome-file', MULTI_STEP_AJAX_PLUGIN_ASSETS . '/css/all.min.css');
        wp_enqueue_style('fontawesome-file', MULTI_STEP_AJAX_PLUGIN_ASSETS . '/css/fontawesome.min.css');

        //scripts
        wp_enqueue_script('bootstrap-file', MULTI_STEP_AJAX_PLUGIN_ASSETS . '/js/bootstrap.min.js', array('jquery'), false, true);
        wp_enqueue_script('script_multi_step_accordion', MULTI_STEP_AJAX_PLUGIN_ASSETS . '/js/accordion-multi-step-form.js', array('jquery'), false, true);
        wp_enqueue_script('live-search-script', MULTI_STEP_AJAX_PLUGIN_ASSETS . '/js/jquery.live.search.min.js', array('jquery'), false, true);
        // wp_enqueue_script('datepicker-script', MULTI_STEP_AJAX_PLUGIN_ASSETS . '/js/bootstrap-datepicker.js', array('jquery'), false, true);
        // wp_enqueue_script('jqueryui-script', MULTI_STEP_AJAX_PLUGIN_ASSETS . '/js/jquery-ui.js', array('jquery'), false, true);
        wp_enqueue_script('script_file', MULTI_STEP_AJAX_PLUGIN_ASSETS . '/js/script.js', array('jquery'), false, true);
        wp_localize_script(
            'script_file',
            'multistep_ajax_script',
            array(
                'ajaxurl' => admin_url('admin-ajax.php'),
                'currency_symbol' => $woo_currency_symbol,
            )
        );
    }
}

/**
 * Initialize Main Plugin
 *
 * @return \Multi_Step_Ajax_Checkout
 */

function sync_solutions()
{
    return Multi_Step_Ajax_Checkout::init();
}

// calling the main class instance
sync_solutions();