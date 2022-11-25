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
        add_action('wp_ajax_nopriv_search_result_products_action', [$this, 'search_result_products_action']);

        //click and remove on cart ajax actions
        add_action('wp_ajax_removed_items_add_to_main_items', [$this, 'removed_items_add_to_main_items']);
        add_action('woocommerce_checkout_order_review', [$this, 'checkout_total_product_summary_woocommerce']);
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
        // print_r(WC()->cart->get_cart_contents_count());

        ?>

<!-- Single item -->
<div class="product-added-single-page" cart-product-name="<?php echo $product_name; ?>"
    cart-product-price="<?php echo $product_price; ?>" product-id-to-remove="<?php echo $product_id; ?>"
    cart-total-amount="<?php echo $total; ?>">
    <div class="row product-row">
        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">



            <!-- Image -->
            <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                <img src="<?php echo $product_image_by_id; ?>" class="w-100" alt="Blue Jeans Jacket" />
                <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)">
                    </div>
                </a>
            </div>
            <!-- Image -->
        </div>



        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
            <!-- Data -->
            <p><strong><?php echo $product_name; ?></strong>
            </p>
            <!-- Data -->
        </div>



        <!-- quantity -->
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <!-- Quantity -->
            <div class="d-flex mb-4" style="max-width: 300px">

                <?php

        $quan_num = 1;

        ?>
                <div class="form-outline">
                    <input type="hidden" class="product_price_hidden" value="<?php echo $product_price; ?>">
                    <input name="cart_quantity_number" min="0" onchange="quantity_number()"
                        max="<?php echo 'product_stock_quantity'; ?>" value="<?php echo $quan_num; ?>" type="number"
                        class="form-control itemQty" />

                </div>
            </div>
            <!-- Quantity -->

            <button type="button" class="remove-single-item-btn btn btn-white btn-sm border border-primary me-1 mb-2"
                item-id-to-remove="<?php echo $product_id; ?>" item-product-name="<?php echo $product_name; ?>"
                data-mdb-toggle="tooltip" title="">
                Remove Item
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

        if (in_array($removed_product_id, $latest_products_arr)) {?>


<div class="col-md-3 col-sm-4 product-add-to-cart-ajax" items-to-add-name="<?php echo $product_name; ?>"
    items-to-add-id="<?php echo $removed_product_id; ?>" items-to-add-price="<?php echo $product_price; ?>"
    cart-item-total-price="<?php echo $total; ?>">
    <div class="wrimagecard wrimagecard-topimage">
        <a href="">
            <div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
                <img src="<?php echo $product_image_by_id; ?>" alt="">
            </div>
            <div class="wrimagecard-topimage_title">
                <h6> <?php echo $product_name; ?>
                    <div class="pull-right badge">18</div>
                </h6>
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
        // echo 'hello';
        $total = WC()->cart->total;

        // Testing output
        // var_dump($total);
    }

    public function checkout_total_product_summary_woocommerce()
    {?>


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
                <?php echo apply_filters('woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf('&times;&nbsp;%s', $cart_item['quantity']) . '</strong>', $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped                                                                                        ?>
                <?php echo wc_get_formatted_cart_item_data($cart_item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped                                                                                        ?>
            </td>
            <td class="product-total">
                <?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped                                                                                        ?>
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
        // print_r(WC()->cart->get_cart_contents_count());

        ?>

<!-- Single item -->
<div class="product-added-single-page" cart-product-name="<?php echo $product_name; ?>"
    cart-product-price="<?php echo $product_price; ?>" product-id-to-remove="<?php echo $product_id; ?>"
    cart-total-amount="<?php echo $total; ?>">
    <div class="row product-row">
        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">



            <!-- Image -->
            <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                <img src="<?php echo $product_image_by_id; ?>" class="w-100" alt="Blue Jeans Jacket" />
                <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)">
                    </div>
                </a>
            </div>
            <!-- Image -->
        </div>



        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
            <!-- Data -->
            <p><strong><?php echo $product_name; ?></strong>
            </p>
            <!-- Data -->
        </div>



        <!-- quantity -->
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <!-- Quantity -->
            <div class="d-flex mb-4" style="max-width: 300px">

                <?php

        $quan_num = 1;

        ?>
                <div class="form-outline">
                    <input type="hidden" class="product_price_hidden" value="<?php echo $product_price; ?>">
                    <input name="cart_quantity_number" min="0" onchange="quantity_number()"
                        max="<?php echo 'product_stock_quantity'; ?>" value="<?php echo $quan_num; ?>" type="number"
                        class="form-control itemQty" />

                </div>
            </div>
            <!-- Quantity -->

            <button type="button" class="remove-single-item-btn btn btn-white btn-sm border border-primary me-1 mb-2"
                item-id-to-remove="<?php echo $product_id; ?>" item-product-name="<?php echo $product_name; ?>"
                data-mdb-toggle="tooltip" title="">
                Remove Item
            </button>


        </div>
    </div>
</div>

<?php

        wp_die();

    }
}

?>