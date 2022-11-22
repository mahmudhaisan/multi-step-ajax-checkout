<?php

namespace Multi\Checkout\Admin;

class Ajax
{
    public function __construct()
    {
        add_action('wp_ajax_get_products_info', [$this, 'get_products_info']);
        add_action('wp_ajax_nopriv_get_products_info', [$this, 'get_products_info']);

        add_action('wp_ajax_removed_items_add_to_main_items', [$this, 'removed_items_add_to_main_items']);
    }

    public function get_products_info()
    {
        $product_id = $_POST['product_id'];
        $product_query = wc_get_product($product_id);

        $product_name = $product_query->get_name();
        $product_image_by_id = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail')[0];
        $product_price = $product_query->get_price();
        WC()->cart->add_to_cart($product_id, 1);

        // add_filter('woocommerce_cart_item_name', [$this, 'isa_woo_cart_attributes'], 10, 2);
        add_action('woocommerce_checkout_before_order_review', [$this, 'action_woocommerce_checkout_before_order_review'], 10, 0);

        // print_r(WC()->cart->get_cart_contents_count());

        ?>

<!-- Single item -->
<div class="product-added-single-page" product-id-to-remove="<?php echo $product_id; ?>">
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

        $product_query = wc_get_product($removed_product_id);

        $product_name = $product_query->get_name();
        $product_image_by_id = wp_get_attachment_image_src(get_post_thumbnail_id($removed_product_id), 'single-post-thumbnail')[0];
        $product_price = $product_query->get_price();

        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            if ($cart_item['product_id'] == $removed_product_id) {
                WC()->cart->remove_cart_item($cart_item_key);
            }
        }

        // print_r(WC()->cart->get_cart_contents_count());

        // echo $products_total_price;
        ?>

<div class="col-md-3 col-sm-4 product-add-to-cart-ajax" items-to-add-id="<?php echo $removed_product_id; ?>"
    items-to-add-price="<?php echo $product_price; ?>">
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
        echo 'hello';
        $total = WC()->cart->total;

        // Testing output
        // var_dump($total);
    }

}

?>