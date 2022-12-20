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

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
    echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
    return;
}

// if (is_checkout()) {
//     WC()->cart->empty_cart();
// }

$latest_products_args = array(
    'status' => 'publish',
    'limit' => 8,

);

$latest_product_ids_arr = array();
$latest_products_info = wc_get_products($latest_products_args);

$cart_total_price = WC()->cart->get_cart_contents_total();
$woo_currency_symbol = get_woocommerce_currency_symbol();

if (isset($_POST['email'])) {
    global $post;
}

echo $post->ID;

// include MULTI_STEP_AJAX_PLUGINS_DIR_PATH . 'includes/Frontend/templates/form-html.php';

?>

<div class="">
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <!-- Accordion Start -->
            <form name="checkout" method="post" class="checkout woocommerce-checkout" id="product-checkout-main-form"
                action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
                <div class="accordion" id="accordionExamples">
                    <!-- 1st accordion item -->
                    <div class="accordion-item mb-2 main-checkout-accordion-item">
                        <h1 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button id="first-accordion-btn"
                                class="accordion-button accordion-button-text accordion-btn-collapse-expand"
                                type="button" data-bs-toggle="collapse" data-bs-target="#first-accordion-item"
                                aria-expanded="false" aria-controls="first-accordion-item">


                                Please Select Your Items For Removal

                            </button>
                        </h1>
                        <div id="first-accordion-item" class="accordion-collapse collapse p-2 show"
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">

                                <div class="service-categories text-xs-center">
                                    <div class="">
                                        <!-- showing most popular product in accordion items -->
                                        <div class="mb-4 mt-3 h3 section-title-accordion-item">
                                            <p class="h2 ">

                                                Most Popular Items
                                            </p>


                                        </div>
                                        <div class="row product-main-items mb-5">


                                            <?php

// Loop through list of products
foreach ($latest_products_info as $product) {

    // Collect product variables
    $product_id = $product->get_id();
    $product_name = $product->get_name();
    $product_price = $product->get_price();
    $product_image_by_id = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail')[0];

    array_push($latest_product_ids_arr, $product_id);
    ?>

                                            <div class="col-sm-4 col-md-3 col-6 product-add-to-cart-ajax mb-3"
                                                items-to-add-id="<?php echo $product_id; ?>"
                                                items-to-add-price="<?php echo $product_price; ?>">
                                                <div class="wrimagecard wrimagecard-topimage">
                                                    <a href="">
                                                        <div class="wrimagecard-topimage_header p-4">
                                                            <img src="<?php echo $product_image_by_id; ?>"
                                                                class="mx-auto d-block" alt="">
                                                        </div>
                                                        <div class="text-dark p-2 text-center">
                                                            <p class="h2 product-heading-text">
                                                                <?php echo $product_name; ?>

                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                            <?php }?>

                                            <input type="hidden" id="latest_products_id_arr"
                                                data-latest-products-id="<?php echo json_encode($latest_product_ids_arr); ?>">
                                        </div>
                                    </div>



                                    <div class="">
                                        <p class="h2">
                                            Don't See Your Item?
                                        </p>

                                    </div>


                                    <?php

$all_products_args = array(
    'status' => 'publish',

    // 'exclude' => $latest_product_ids_arr,
);

$all_products_info = wc_get_products($all_products_args);

?>

                                    <div class="search-input-results-div">
                                        <input type="text" id="search-query"
                                            class="form-control my-2 bg-white text-dark" placeholder="Search Your Item">
                                        <ul class="list-group bg-white text-dark d-none search-result-vertical"
                                            id="list-group-for-search">


                                            <?php

foreach ($all_products_info as $single_product) {

    // Collect product variables
    $product_id = $single_product->get_id();
    $product_name = $single_product->get_name();
    $product_price = $single_product->get_price();
    $product_image_by_id = wp_get_attachment_image_src(get_post_thumbnail_id($single_product_id), 'single-post-thumbnail')[0];

    ?>

                                            <li class="list-group-item list-group-item-white search-result-item h3 pt-3 pb-3"
                                                list-product-id="<?php echo $product_id; ?>">

                                                <?php echo $product_name; ?>
                                            </li>
                                            <?php }?>

                                        </ul>
                                    </div>
                                    <div class="mb-4 mt-5">
                                        <span class="text-center">
                                            <p class="h2 new-form-link-text">
                                                Have a bunch of items or don't see them
                                                listed?
                                            </p>
                                            <a href="#" class="h2 new-form-link load-size-form-link">
                                                <strong>

                                                    Click Here to Book
                                                    by
                                                    Load Size
                                                </strong>
                                            </a>
                                        </span>
                                    </div>


                                    <!-- product infos -->
                                    <div
                                        class="row cart-single-page-item-added-from-main d-flex justify-content-center my-4">
                                        <div class="col-md-12 card mb-4 border-0">
                                            <div class="card-header py-3 my-items-heading border-0">
                                                <p class="mb-0 h2 text-center">
                                                    <strong>

                                                        My Items
                                                    </strong>
                                                </p>
                                            </div>
                                            <div class="card-body single-product-added-to-cart border-0">

                                                <p
                                                    class="card no-products-text border-0 h2 text-danger text-center mt-2 mb-2">


                                                    There are no products on your cart. Please add your items from
                                                    above.


                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="d-grid gap-2 d-md-flex justify-content-md-end accordion-next-btn-wrapper">
                                            <button class="btn btn btn-lg btn-outline-dark me-1 mb-2" disabled
                                                id="first-accordion-item-next" type="button">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 1st accordion item -->

                    <!-- 2nd accordion item -->
                    <div class="accordion-item mb-2 main-checkout-accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button
                                class="accordion-button accordion-button-text accordion-btn-collapse-expand collapsed"
                                id="second-accordion-btn" disabled type="button" data-bs-toggle="collapse"
                                data-bs-target="#second-accordion-item" aria-expanded="false"
                                aria-controls="second-accordion-item">
                                When Would You Like To Picked Up?
                            </button>
                        </h2>
                        <div id="second-accordion-item" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                <!-- calender and select row -->
                                <div class="row">
                                    <!-- calender row -->
                                    <div class="col-md-6 mb-3">
                                        <div id="date-picker-example"
                                            class="md-form md-outline input-with-post-icon datepicker" inline="true">
                                            <input placeholder="Select date" name="picked-up-date-value" type="date"
                                                id="datepicker-input" class="form-control input-field-date-time">


                                        </div>

                                    </div>


                                    <!-- calender row -->
                                    <div class="col-md-6">
                                        <select
                                            class="form-select form-select-lg mb-3 form-select-pickup-time input-field-date-time"
                                            name="picked-up-time-value" aria-label=".form-select-lg example">
                                            <option selected>Open this select menu</option>
                                            <option value="morning">Morning(8am - 12am)</option>
                                            <option value="afternoon">Afternoon(12pm - 4pm)</option>
                                            <option value="evening">Evening(4pm - 8pm)</option>
                                            <option value="all-day">All Day(8am - 8pm)</option>
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="mt-3 mb-3 h2 text-heading-class">


                                                We allow scheduling for next day up to 90 days in
                                                advance!

                                            </p>
                                        </div>

                                        <div class="col-md-11 col-sm-10 col-10">

                                            <p class="h2 mt-2 mb-2 text-dark">
                                                Would you like us to complete your order as soon as possible?
                                            </p>

                                        </div>
                                        <div class="col-md-1 col-sm-2 col-2 my-auto">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="yes"
                                                    name="possible-order-delivery-request" id="flexCheckDefault">

                                            </div>
                                        </div>
                                    </div>


                                    <div class="">
                                        <p class="mt-3 mb-3 h2 text-heading-class">
                                            If we can accommodate an earlier time and/or date, we will contact you to
                                            verify the change. This could be as soon as 1 hour from the time your
                                            booking is placed. If we are unable to come sooner, we will work your order
                                            according to your scheduled date/time you've selected.
                                        </p>

                                    </div>


                                    <div class="mt-3 mb-3">

                                        <p class="h2">
                                            Special Instructions (mattress size, dimensions, description, etc.)
                                        </p>
                                    </div>


                                    <div class="form-group">
                                        <textarea name="custom-special-instructions" class="form-control"
                                            id="exampleFormControlTextarea1" rows="6"></textarea>
                                    </div>

                                </div>
                                <div
                                    class="d-grid gap-2 d-md-flex justify-content-md-end accordion-next-btn-wrapper mt-5">
                                    <button class="btn btn btn-lg btn-outline-dark me-1 mb-2"
                                        id="second-accordion-item-next" disabled type="button">Next</button>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>

                <!-- 3rd accordion item -->
                <div class="accordion-item mb-2 main-checkout-accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button accordion-button-text accordion-btn-collapse-expand  collapsed"
                            id="third-accordion-btn" disabled type="button" data-bs-toggle="collapse"
                            data-bs-target="#third-accordion-item" aria-expanded="false"
                            aria-controls="third-accordion-item">
                            Orders Details
                        </button>
                    </h2>
                    <div id="third-accordion-item" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body p-4">
                            <h1>In Home or Outdoor Pickup?</h1>
                            <div class="mb-2">
                                <div class="card shipping-pick-up-card-1 shipping-pick-up-cards shipping-select-class"
                                    shipping-cost="0">
                                    <div class="card-body">
                                        <p class="mb-0 shipping-pick-up-heading">
                                            <strong>In Home Pick Up</strong>
                                        </p>
                                        <p class="mb-0">Your Loaders will remove and transport your item(s) from
                                            inside your
                                            home.</p>
                                    </div>

                                </div>
                                <div class="card mt-3 shipping-pick-up-card-2 shipping-pick-up-cards" shipping-cost="5">
                                    <div class="card-body">
                                        <p class="mb-0 shipping-pick-up-heading">
                                            <strong> Outdoor Pick Up </strong> ($5 Discount)
                                        </p>
                                        <p class="mb-0">Your Loaders will pick up your item(s) from outside your
                                            home or building. You are responsible for placing your item(s) outdoors
                                            and are not required to be present during the pickup. *$5 Discount is
                                            not applicable with promo code.*</p>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end accordion-next-btn-wrapper  mt-5">
                                <button class="btn btn-lg btn-outline-dark me-1 mb-2" id="third-accordion-item-next"
                                    type="button">Next</button>
                            </div>

                        </div>
                    </div>
                </div>





                <div class="accordion-item mb-2 main-checkout-accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button id="fourth-accordion-btn"
                            class="accordion-button accordion-btn-collapse-expand collapsed accordion-button-text"
                            disabled type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnes"
                            aria-expanded="false" aria-controls="collapseOnes">
                            Contact Information
                        </button>
                    </h2>



                    <div id="collapseOnes" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExamples">
                        <div class="accordion-body checkout-woo-process-options p-4">
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
                                    disabled type="button">Next</button>

                            </div>




                        </div>
                    </div>

                </div>


                <!--  accordion item -->
                <div class="accordion-item mb-2 main-checkout-accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed accordion-btn-collapse-expand accordion-button-text"
                            id="fifth-accordion-btn" disabled type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Payment Information
                        </button>
                    </h2>

                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body p-4">

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
            </form>

        </div>




        <?php

?>



        <div class="col-md-4 guranteed-price-col mt-2">
            <div class="row accordion-item main-checkout-accordion-item p-4 m-1">
                <div class="order-summary-col">

                    <p class="text-center h2">
                        <strong>

                            Order Details
                        </strong>
                    </p>
                    <div class="row price-row mt-4">
                        <p class="mb-0 p-3 h2">

                            Guranteed Price:


                            <span class="product_total_price"></span>


                        </p>

                    </div>

                </div>
            </div>
        </div>



    </div>





    <?php do_action('woocommerce_after_checkout_form', $checkout);?>