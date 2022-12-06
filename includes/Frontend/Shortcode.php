<?php

namespace Multi\Checkout\Frontend;

/**
 * Shortcode Handler Class
 */

class Shortcode
{
    public function __construct()
    {
        add_shortcode('multi_step_form_frontend', [$this, 'accordion_multi_step_frontend']);

        add_filter('woocommerce_enable_order_notes_field', '__return_false', 9999);
        add_action('woocommerce_before_checkout_form', [$this, 'remove_checkout_coupon_form'], 9);
        add_filter('wc_add_to_cart_message', '__return_false');
        // add_action('woocommerce_after_checkout_billing_form', [$this, 'test_html_in_checkout']);
        add_action('woocommerce_checkout_order_review', [$this, 'remove_checkout_totals'], 1);
        add_filter('woocommerce_cart_needs_payment', '__return_true');
        add_filter('woocommerce_order_button_html', [$this, 'remove_order_button_html']);
        add_action('add_payment_details_in_checkout_accordion', [$this, 'second_place_order_button'], 1111);
        add_action('woocommerce_checkout_after_order_review', [$this, 'second_place_order_button'], 5);
        add_filter('woocommerce_locate_template', [$this, 'checkout_page_templates_override_woo'], 10, 3);
        // add_action('template_redirect', [$this, 'custom_empty_cart']);
        add_filter('woocommerce_checkout_redirect_empty_cart', '__return_false');
        add_filter('woocommerce_checkout_update_order_review_expired', '__return_false');
        add_action('init', [$this, 'register_my_session']);
        add_action('init', [$this, 'woocommerce_default_shipping_method']);
        add_action('woocommerce_checkout_order_review', [$this, 'checkout_total_product_summary_woocommerce']);
        // add_action('woocommerce_review_order_before_order_total', 'woocommerce_review_order_before_shipping_fn');
        add_shortcode('form_data_values', [$this, 'show_form_data']);
    }

    public function accordion_multi_step_frontend()
    {

        // global $woocommerce;

        require MULTI_STEP_AJAX_DIR_PATH . '/includes/Frontend/templates/form-html.php';

    }

    public function remove_checkout_coupon_form()
    {

        remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);
    }

    // On checkout page

    public function remove_checkout_totals()
    {
        // Remove cart totals block
        remove_action('woocommerce_checkout_order_review', 'woocommerce_order_review', 10);
    }

    public function remove_order_button_html($button)
    {

        $button = '';

        return $button;

    }

    public function add_payment_details_in_checkout_accordion()
    {
        add_filter('woocommerce_cart_needs_payment', '__return_false');
    }

    public function second_place_order_button()
    {
        $order_button_text = apply_filters('woocommerce_order_button_text', __("Place order", "woocommerce"));
        echo '<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr($order_button_text) . '" data-value="' . esc_attr($order_button_text) . '">' . esc_html($order_button_text) . '</button>';
    }

    public function checkout_page_templates_override_woo($template, $template_name, $template_path)
    {
        $basename = basename($template);
        global $post;
        $page_id_num = $post->ID;

        if ($basename == 'form-checkout.php') {

            if ($page_id_num == 80) {
                WC()->cart->empty_cart();
                $template = MULTI_STEP_AJAX_PLUGINS_DIR_PATH . 'templates/checkout/form-checkout.php';
            } else {
                $template = MULTI_STEP_AJAX_PLUGINS_DIR_PATH . 'templates/checkout/load-up-form-checkout.php';

            }
        }

        if ($basename == 'review-order.php') {

            $template = MULTI_STEP_AJAX_PLUGINS_DIR_PATH . 'templates/checkout/review-order.php';
        }

        return $template;
    }

    public function custom_empty_cart()
    {
        if (!(is_cart() || is_checkout()) && !WC()->cart->is_empty()) {
            WC()->cart->empty_cart(true);
        }

    }

    // Start session if not started

    public function register_my_session()
    {
        if (!session_id()) {
            session_start();
        }
    }
    public function checkout_total_product_summary_woocommerce()
    {

        $total_cart_product_price = WC()->cart->get_cart_contents_total();
        $currency_symbol = get_woocommerce_currency_symbol();

        ?>

<table class="table">
    <thead>
        <tr>
            <th scope=" col">Orders Info</th>
            <th scope="col">Subtotal</th>
        </tr>
    </thead>
    <tbody class="shopping_cart_products_body">



        <tr class="product_in_cart_info_name_price">


        </tr>


        <tr class="product_in_cart_info_name_subtotal">
            <td>Subtotal</td>
            <td class="total-price-of-cart-items">
                <span><?php echo $currency_symbol . 0; ?> </span>

            </td>
        </tr>
        <tr class='product_in_cart_info_name_total'>

            <td>Total</td>
            <td class="total-price-of-cart-items">
                <span><?php echo $currency_symbol . 0; ?></span>

            </td>
        </tr>
    </tbody>
</table>

<?php }

    public function woocommerce_default_shipping_method()
    {
        global $wpdb;
        $wpdb->update('wp_woocommerce_shipping_zone_methods', array('is_enabled' => 0), array('method_id' => 'flat_rate'));
        $wpdb->update('wp_woocommerce_shipping_zone_methods', array('is_enabled' => 1), array('method_id' => 'local_pickup'));

    }

    public function woocommerce_review_order_before_shipping_fn()
    {
        echo 'hello';
    }

    public function show_form_data()
    {
        global $post;
        $slug = $post->post_name;
        echo $slug;

        var_dump(session_id());

    }

}