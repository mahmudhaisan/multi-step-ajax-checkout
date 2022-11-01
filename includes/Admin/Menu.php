<?php

namespace Multi\Checkout\Admin;

/**
 * Menu class
 */
class Menu
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'admin_menu_callback']);
    }

    /**
     * Register Admin Menu
     *
     * @return void
     */
    public function admin_menu_callback()
    {
        add_menu_page(__('Ajax Multi Step Checkout', 'amsc'), __('Ajax Multi Step Checkout', 'amsc'), 'manage_options', 'ajax-multi-checkout', [$this, 'main_menu_page_cb'], 'dashicons-saved');
        add_submenu_page(__('ajax-multi-checkout', 'amsc'), __('Dashboard', 'amsc'), 'Dashboard', 'manage_options', 'ajax-multi-checkout', [$this, 'main_menu_page_cb']);
        add_submenu_page(__('ajax-multi-checkout', 'amsc'), __('Settings', 'amsc'), __('Settings', 'amsc'), 'manage_options', '', [$this, 'settings_callback']);
    }

    /**
     * Dashboard Main Page Callback
     *
     * @return void
     */
    public function main_menu_page_cb()
    {
        $dashboard = new Dashboard();
        $dashboard->dashboard_page();
    }

    /**
     * Woo Solutions Plugin Callback
     *
     * @return void
     */
    public function settings_callback()
    {
        $setiings_template = new Settings();
        $setiings_template->settings_page();
    }
}