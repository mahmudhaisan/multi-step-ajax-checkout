<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
    exit;
}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disableds and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
    echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
    return;
}

// if (is_checkout()) {
//     WC()->cart->empty_cart();
// }

$latest_products_args = array(
    'status' => 'publish',
    'limit' => 4,

);

$latest_product_ids_arr = array();
$latest_products_info = wc_get_products($latest_products_args);

$cart_total_price = WC()->cart->get_cart_contents_total();
$woo_currency_symbol = get_woocommerce_currency_symbol();

// include MULTI_STEP_AJAX_PLUGINS_DIR_PATH . 'includes/Frontend/templates/form-html.php';

?>

<div class="container">


    <div class="row">
        <div class="col-md-8">

            <!-- Accordion Start -->
            <form name="checkout" method="post" class="checkout woocommerce-checkout"
                action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
                <div class="accordion" id="accordionExamples">

                    <!-- 1st accordion item -->
                    <div class="accordion-item">
                        <h1 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOne">
                                Job Type
                            </button>
                        </h1>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">

                                <div class="service-categories text-xs-center">
                                    <div class="">
                                        <!-- showing most popular product in accordion items -->
                                        <div class="mb-3 mt-3 h3 section-title-accordion-item">
                                            What type of junk do you have?
                                        </div>
                                        <div class="row radio-group  product-main-items">

                                            <div class="col-md-3 col-sm-4 radio-add-to-cart-ajax">
                                                <div class="card card-select-items">
                                                    <img src="https://via.placeholder.com/150" class="card-img-top"
                                                        alt="...">
                                                    <div class="card-body">
                                                        <h3 class="card-title">HOUSEHOLD ITEMS </h3>
                                                        <p class="card-text">Furniture, decor, lamps etc</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-4 radio-add-to-cart-ajax">
                                                <div class="card card-select-items">
                                                    <img src="https://via.placeholder.com/150" class="card-img-top"
                                                        alt="...">
                                                    <div class="card-body">
                                                        <h3 class="card-title">OFFICE CLEANOUT</h3>
                                                        <p class="card-text">Desks, chairs, cubicles etc</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-4 radio-add-to-cart-ajax">
                                                <div class="card card-select-items">
                                                    <img src="https://via.placeholder.com/150" class="card-img-top"
                                                        alt="...">
                                                    <div class="card-body">
                                                        <h3 class="card-title">YARD DEBRIS</h3>
                                                        <p class="card-text">Brush, lawn bags, sticks etc </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-4 radio-add-to-cart-ajax">
                                                <div class="card">
                                                    <img src="https://via.placeholder.com/150" class="card-img-top"
                                                        alt="...">
                                                    <div class="card-body">
                                                        <h3 class="card-title">OTHERS</h3>
                                                        <p class="card-text">Bags, Cardboard etc</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="d-grid gap-2 mt-5 d-md-flex justify-content-md-end accordion-next-btn-wrapper">
                                        <button class="btn btn btn-lg btn-outline-dark me-1 mb-2" id=""
                                            type="button">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 1st accordion item -->

                    <!-- 2ndd accordion item -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#second-loadup-accordion-item" aria-expanded="true"
                                aria-controls="second-loadup-accordion-item">
                                Job Size
                            </button>
                        </h2>
                        <div id="second-loadup-accordion-item" class="accordion-collapse collapse show"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <h1 class="text-center">How much junk do you need removed?</h1>
                                <h3 class="text-center">Use your best guess. We'll review your order.</h3>

                                <div class="row">

                                    <?php

// Loop through list of products
foreach ($latest_products_info as $product) {

    // Collect product variables
    $product_id = $product->get_id();
    $product_name = $product->get_name();
    $product_price = $product->get_price();
    $product_image_by_id = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail')[0];

    ?>


                                    <div class="col-md-3 col-sm-4 radio-add-to-cart-ajax">
                                        <div class="card card-select-items">
                                            <img src="<?php echo $product_image_by_id; ?>" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h3 class="card-title"> <?php echo $product_name; ?> </h3>

                                            </div>
                                        </div>
                                    </div>



                                    <?php }?>

                                </div>

                                <div
                                    class="d-grid gap-2 mt-5 d-md-flex justify-content-md-end accordion-next-btn-wrapper">
                                    <button class="btn btn btn-lg btn-outline-dark me-1 mb-2" id=""
                                        type="button">Next</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- 2nd accordion item -->

                <!-- 3rd accordion item -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#third-loadup-accordion-item" aria-expanded="true"
                            aria-controls="second-accordion-item">
                            Date and Time
                        </button>
                    </h2>
                    <div id="third-loadup-accordion-item" class="accordion-collapse collapse show"
                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h2 class="text-center">When Would You Like To Picked Up?</h2>

                            <!-- calender and select row -->
                            <div class="row">
                                <!-- calender row -->
                                <div class="col-md-6">

                                    <div id="date-picker-example"
                                        class="md-form md-outline input-with-post-icon datepicker" inline="true">
                                        <input placeholder="Select date" type="date" id="datepicker-input"
                                            class="form-control">


                                    </div>


                                </div>


                                <!-- calender row -->
                                <div class="col-md-6">
                                    <select class="form-select form-select-lg mb-3 form-select-pickup-time"
                                        aria-label=".form-select-lg example">
                                        <option selected>Open this select menu</option>
                                        <option value="morning">Morning(8am - 12am)</option>
                                        <option value="afternoon">Afternoon(12pm - 4pm)</option>
                                        <option value="evening">Evening(4pm - 8pm)</option>
                                        <option value="all-day">All Day(8am - 8pm)</option>
                                    </select>
                                </div>






                                <div
                                    class="d-grid gap-2 d-md-flex justify-content-md-end accordion-next-btn-wrapper mt-5">
                                    <button class="btn btn btn-lg btn-outline-dark me-1 mb-2"
                                        id="second-accordion-item-next" type="button">Next</button>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
                <!-- 3rd accordion item -->



                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button id="fourth-accordion-btn" class="accordion-button collapsed" disableds type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseOnes" aria-expanded="false"
                            aria-controls="collapseOnes">
                            Contact Information
                        </button>
                    </h2>



                    <div id="collapseOnes" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExamples">
                        <div class="accordion-body">
                            <?php if ($checkout->get_checkout_fields()): ?>

                            <?php do_action('woocommerce_checkout_before_customer_details');?>

                            <div class="col2-set" id="customer_details">
                                <div class="col-1">
                                    <?php do_action('woocommerce_checkout_billing');?>
                                </div>

                                <div class="col-2">
                                    <?php do_action('woocommerce_checkout_shipping');?>
                                </div>
                            </div>

                            <?php do_action('woocommerce_checkout_after_customer_details');?>

                            <?php endif;?>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end accordion-next-btn-wrapper">

                                <button class="btn btn-lg btn-outline-dark me-1 mb-2" id="fourth-accordion-item-next"
                                    type="button">Next</button>

                            </div>


                        </div>
                    </div>

                </div>



                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" id="fifth-accordion-btn" disableds type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                            aria-controls="collapseTwo">
                            Payment Information
                        </button>
                    </h2>

                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                            <?php do_action('woocommerce_checkout_before_order_review_heading');?>

                            <h3 id="orders_info_texts"><?php esc_html_e('Your orders info', 'woocommerce');?>
                            </h3>

                            <?php do_action('woocommerce_checkout_before_order_review');?>

                            <div id="order_review" class="woocommerce-checkout-review-order">
                                <?php do_action('woocommerce_checkout_order_review');?>
                            </div>

                            <?php do_action('woocommerce_checkout_after_order_review');?>
                        </div>
                    </div>
                </div>


        </div>


    </div>





</div>
</div>



<?php do_action('woocommerce_after_checkout_form', $checkout);?>