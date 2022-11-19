<?php

namespace Multi\Checkout\Admin;

class Ajax
{
    public function __construct()
    {
        add_action('wp_ajax_get_products_info', [$this, 'get_products_info']);

    }

    public function get_products_info()
    {
        $product_id = $_POST['product_id'];
        $product_query = wc_get_product($product_id);

        $product_name = $product_query->get_name();
        $product_image_by_id = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail')[0];
        $product_price = $product_query->get_price();

        ?>

<!-- Single item -->
<div class="row">
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

        <button type="button" onclick="" class="btn btn-white btn-sm border border-primary me-1 mb-2"
            data-mdb-toggle="tooltip" title="">
            Remove Item
        </button>



    </div>



</div>





<?php

        wp_die();
    }
}