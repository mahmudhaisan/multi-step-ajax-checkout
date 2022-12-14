<?php

namespace Multi\Checkout\Admin;

class Ajax
{
    public function __construct()
    {

        //click and add on cart ajax actions from main products grid
        add_action('wp_ajax_get_products_info', [$this, 'get_products_info']);
        add_action('wp_ajax_nopriv_get_products_info', [$this, 'get_products_info']);

        //click and add on cart ajax actions from main products grid
        add_action('wp_ajax_search_result_products_action', [$this, 'search_result_products_action']);
        add_action('wp_ajax_nopriv_search_result_products_action', [$this, 'search_result_products_action']); //click and add on cart ajax actions from main products grid

        //click and remove on cart ajax actions
        add_action('wp_ajax_removed_items_add_to_main_items', [$this, 'removed_items_add_to_main_items']);
        add_action('woocommerce_checkout_order_review', [$this, 'checkout_total_product_summary_woocommerce']);

        //shipping pick up costs
        add_action('wp_ajax_shipping_pick_up_costs', [$this, 'shipping_pick_up_costs']);
        add_action('wp_ajax_nopriv_shipping_pick_up_costs', [$this, 'shipping_pick_up_costs']); //shipping pick up costs

        add_action('wp_ajax_loadup_product_add_to_cart', [$this, 'loadup_product_add_to_cart']);
        add_action('wp_ajax_nopriv_loadup_product_add_to_cart', [$this, 'loadup_product_add_to_cart']);

        add_action('wp_ajax_add_to_cart_product_quantity_update', [$this, 'add_to_cart_product_quantity_update']);
        add_action('wp_ajax_nopriv_add_to_cart_product_quantity_update', [$this, 'add_to_cart_product_quantity_update']);

        add_action('wp_ajax_single_added_cart_modified', [$this, 'single_added_cart_modified']);
        add_action('wp_ajax_nopriv_single_added_cart_modified', [$this, 'single_added_cart_modified']);
    }

    public function get_products_info()
    {
        $product_id = $_POST['product_id'];
        $product_query = wc_get_product($product_id);
        $product_name = $product_query->get_name();
        $product_image_by_id = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail')[0];
        $product_price = $product_query->get_price();

        WC()->cart->add_to_cart($product_id, 1);

        $total = WC()->cart->total;
        WC()->session->set('total_price_with-fees', $total);

        // print_r(WC()->cart->get_cart_contents_count());

        ?>

<input type="hidden" class="total-cart-price-count" data-price="<?php echo $total; ?>">

<!-- Single item -->
<div class="product-added-single-page d-flex justify-content-center mt-2 mb-2"
    cart-product-name="<?php echo $product_name; ?>" cart-product-price="<?php echo $product_price; ?>"
    product-id-to-remove="<?php echo $product_id; ?>" cart-total-amount="<?php echo $total; ?>">
    <div class="row product-row mb-3 border-bottom-1">
        <div class="col-md-2 col-sm-3 col-3">



            <!-- Image -->
            <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                <img src="<?php echo $product_image_by_id; ?>" class="cart-product-image" alt="Blue Jeans Jacket" />
            </div>
            <!-- Image -->
        </div>

        <div class="col-md-8 col-sm-6 col-6">
            <!-- Data -->
            <p class="h2 p-2 text-center"><?php echo $product_name; ?>
            </p>
            <!-- Data -->
        </div>



        <!-- quantity -->
        <div class="col-md-2 col-sm-3 col-3">
            <!-- Quantity -->
            <div class="d-flex mb-4" style="max-width: 300px">

                <?php

        $quan_num = 1;

        ?>
                <div class="form-outline product-quantity-single">
                    <input type="hidden" class="product_price_hidden" value="<?php echo $product_price; ?>">
                    <input name="cart_quantity_number" min="1" max="<?php echo 'product_stock_quantity'; ?>"
                        value="<?php echo $quan_num; ?>" product-id-val="<?php echo $product_id ?>" type="number"
                        class="form-control itemQty product-quantity-val" />

                </div>
            </div>
            <!-- Quantity -->

            <button type="button" class="remove-single-item-btn btn btn-lg btn-outline-dark me-1 mb-2"
                item-id-to-remove="<?php echo $product_id; ?>" item-product-name="<?php echo $product_name; ?>"
                data-mdb-toggle="tooltip" title="">
                Remove
            </button>


        </div>
    </div>
</div>





<?php

        wp_die();
    }

    public function removed_items_add_to_main_items()
    {

        $removed_product_id = $_POST['removed_product_id'];
        $products_total_price = $_POST['total_product_price'];
        $latest_products_arr = json_decode($_POST['latest_products_arr']);

        // print_r($latest_products_arr);

        $product_query = wc_get_product($removed_product_id);

        $product_name = $product_query->get_name();
        $product_image_by_id = wp_get_attachment_image_src(get_post_thumbnail_id($removed_product_id), 'single-post-thumbnail')[0];
        $product_price = $product_query->get_price();

        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            if ($cart_item['product_id'] == $removed_product_id) {
                WC()->cart->remove_cart_item($cart_item_key);
            }
        }

        $total = WC()->cart->total;
        WC()->session->set('total_price_with-fees', $total);

        if (in_array($removed_product_id, $latest_products_arr)) {?>

<input type="hidden" class="total-cart-price-count" data-price="<?php echo $total; ?>">


<div class="col-md-3 col-sm-4  col-6 product-add-to-cart-ajax" items-to-add-name="<?php echo $product_name; ?>"
    items-to-add-id="<?php echo $removed_product_id; ?>" items-to-add-price="<?php echo $product_price; ?>"
    cart-item-total-price="<?php echo $total; ?>">
    <div class="wrimagecard wrimagecard-topimage">
        <a href="">
            <div class="wrimagecard-topimage_header">
                <img src="<?php echo $product_image_by_id; ?>" alt="" class="mx-auto d-block">
            </div>
            <div class="text-dark p-2 text-center">
                <p class="h2 product-heading-text">
                    <?php echo $product_name; ?>

                </p>
            </div>
        </a>
    </div>
</div>

<?php } else {?>
<li class="list-group-item list-group-item-white search-result-item"
    list-product-id="<?php echo $removed_product_id; ?>">

    <?php echo $product_name; ?>
</li>

<?php }

        // print_r(WC()->cart->get_cart_contents_count());

        // echo $products_total_price;

        ?>


<?php

        wp_die();
    }

    public function isa_woo_cart_attributes($cart_item, $cart_item_key)
    {

        // var_dump($cart_item);

        $item_data = $cart_item_key['data'];
        $post = get_post($item_data->id);

        echo 's ' . $cart_item;
    }

    public function action_woocommerce_checkout_before_order_review()
    {
        echo $_SESSION['selected_shipping_cost'];
        // echo 'hello';
        $total = WC()->cart->total;

        // Testing output
        // var_dump($total);
    }

    public function checkout_total_product_summary_woocommerce()
    {
        $woo_currency_symbol = get_woocommerce_currency_symbol();

        ?>


<table class="shop_table woocommerce-checkout-review-order-table">
    <thead>
        <tr>
            <th class="product-name"><?php esc_html_e('Product Name', 'woocommerce');?></th>
            <th class="product-total"><?php esc_html_e('Subtotal', 'woocommerce');?></th>
        </tr>
    </thead>
    <tbody>
        <?php
do_action('woocommerce_review_order_before_cart_contents');

        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

            if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
                ?>
        <tr
            class="<?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
            <td class="product-name">
                <?php echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key)) . '&nbsp;'; ?>
                <?php echo apply_filters('woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf('&times;&nbsp;%s', $cart_item['quantity']) . '</strong>', $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped                                                                                                                                                                                                                                                                                                                                                                                                        ?>
                <?php echo wc_get_formatted_cart_item_data($cart_item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped                                                                                                                                                                                                                                                                                                                                                                                                        ?>
            </td>
            <td class="product-total">
                <?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped                                                                                                                                                                                                                                                                                                                                                                                                        ?>
            </td>
        </tr>
        <?php
}
        }

        do_action('woocommerce_review_order_after_cart_contents');
        ?>
    </tbody>
    <tfoot>

        <tr class="cart-subtotal">
            <th><?php esc_html_e('Subtotal', 'woocommerce');?></th>
            <td><?php wc_cart_totals_subtotal_html();?></td>
        </tr>

        <?php foreach (WC()->cart->get_coupons() as $code => $coupon): ?>
        <tr class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
            <th><?php wc_cart_totals_coupon_label($coupon);?></th>
            <td><?php wc_cart_totals_coupon_html($coupon);?></td>
        </tr>
        <?php endforeach;?>

        <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()): ?>

        <?php do_action('woocommerce_review_order_before_shipping');?>

        <?php wc_cart_totals_shipping_html();?>

        <?php do_action('woocommerce_review_order_after_shipping');?>

        <?php endif;?>

        <?php foreach (WC()->cart->get_fees() as $fee): ?>
        <tr class="fee">
            <th><?php echo esc_html($fee->name); ?></th>
            <td><?php wc_cart_totals_fee_html($fee);?></td>
        </tr>
        <?php endforeach;?>

        <?php if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()): ?>
        <?php if ('itemized' === get_option('woocommerce_tax_total_display')): ?>
        <?php foreach (WC()->cart->get_tax_totals() as $code => $tax): // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
        <tr class="tax-rate tax-rate-<?php echo esc_attr(sanitize_title($code)); ?>">
            <th><?php echo esc_html($tax->label); ?></th>
            <td><?php echo wp_kses_post($tax->formatted_amount); ?></td>
        </tr>
        <?php endforeach;?>
        <?php else: ?>
        <tr class="tax-total">
            <th><?php echo esc_html(WC()->countries->tax_or_vat()); ?></th>
            <td><?php wc_cart_totals_taxes_total_html();?></td>
        </tr>
        <?php endif;?>
        <?php endif;?>

        <?php do_action('woocommerce_review_order_before_order_total');?>

        <tr class="order-total">
            <th><?php esc_html_e('Total', 'woocommerce');?></th>
            <td><?php wc_cart_totals_order_total_html();?></td>
        </tr>

        <?php do_action('woocommerce_review_order_after_order_total');?>

    </tfoot>
</table>

<?php }

    public function search_result_products_action()
    {

        $product_id = $_POST['product_id'];
        $product_query = wc_get_product($product_id);
        $product_name = $product_query->get_name();
        $product_image_by_id = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail')[0];
        $product_price = $product_query->get_price();
        WC()->cart->add_to_cart($product_id, 1);

        $total = WC()->cart->total;
        WC()->session->set('total_price_with-fees', $total);
        // print_r(WC()->cart->get_cart_contents_count());

        ?>

<input type="hidden" class="total-cart-price-count" data-price="<?php echo $total; ?>">

<!-- Single item -->
<div class="product-added-single-page" cart-product-name="<?php echo $product_name; ?>"
    cart-product-price="<?php echo $product_price; ?>" product-id-to-remove="<?php echo $product_id; ?>"
    cart-total-amount="<?php echo $total; ?>">
    <div class="row product-row mb-3">
        <div class="col-md-2 col-sm-3">



            <!-- Image -->
            <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                <img src="<?php echo $product_image_by_id; ?>" class="cart-product-image" alt="Blue Jeans Jacket" />

            </div>
            <!-- Image -->
        </div>



        <div class="col-md-8 col-sm-6">
            <!-- Data -->
            <p class="h2 p-2 text-center"><?php echo $product_name; ?>
            </p>
            <!-- Data -->
        </div>



        <!-- quantity -->
        <div class="col-md-2 col-sm-3">
            <!-- Quantity -->
            <div class="d-flex mb-4" style="max-width: 300px">

                <?php

        $quan_num = 1;

        ?>
                <div class="form-outline product-quantity-single">
                    <input type="hidden" class="product_price_hidden" value="<?php echo $product_price; ?>">
                    <input name="cart_quantity_number" min="1" max="<?php echo 'product_stock_quantity'; ?>"
                        value="<?php echo $quan_num; ?>" type="number" product-id-val="<?php echo $product_id ?>"
                        class="form-control itemQty product-quantity-val" />

                </div>
            </div>
            <!-- Quantity -->

            <button type="button" class="remove-single-item-btn btn btn-lg btn-outline-dark me-1 mb-2"
                item-id-to-remove="<?php echo $product_id; ?>" item-product-name="<?php echo $product_name; ?>"
                data-mdb-toggle="tooltip" title="">
                Remove
            </button>


        </div>
    </div>
</div>

<?php

        wp_die();

    }

    public function shipping_pick_up_costs()
    {
        $shipping_cost = $_POST['shipping_cost'];
        WC()->session->set('selected_shipping_cost', $shipping_cost);

        $total = intval(WC()->cart->subtotal);

        echo '$' . ($total + intval($shipping_cost));

        wp_die();
    }

    public function loadup_product_add_to_cart()
    {
        WC()->cart->empty_cart();
        $loadup_add_item_id = $_POST['loadup_add_item_id'];
        WC()->cart->add_to_cart($loadup_add_item_id, 1);
        $total = WC()->cart->total;
        echo $total;

        wp_die();
    }

    public function add_to_cart_product_quantity_update()
    {
        $product_quantity_id = $_POST['product_quantity_id'];
        $product_quantity_value = $_POST['product_quantity_value'];

        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            if ($cart_item['product_id'] == $product_quantity_id) {
                WC()->cart->remove_cart_item($cart_item_key);
            }
        }

        WC()->cart->add_to_cart($product_quantity_id, $product_quantity_value);

        $subtotal = intval(WC()->cart->subtotal);

        $selected_shipping_cost = intval(WC()->session->get('selected_shipping_cost'));

        echo '$' . ($subtotal + $selected_shipping_cost);
        wp_die();

    }

    public function single_added_cart_modified()
    {
        $subtotal = intval(WC()->cart->subtotal);

        $selected_shipping_cost = intval(WC()->session->get('selected_shipping_cost'));

        echo '$' . ($subtotal + $selected_shipping_cost);

        wp_die();

    }

}

?>