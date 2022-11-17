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

include MULTI_STEP_AJAX_PLUGINS_DIR_PATH . 'includes/Frontend/templates/form-html.php';

?>

<div class="container">


    <div class="row">
        <div class="col-md-8">
            <!-- Accordion Start -->
            <form name="checkout" method="post" class="checkout woocommerce-checkout"
                action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
                <div class="accordion" id="accordionExamples">
                    <div class="accordion-item">


                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOnes" aria-expanded="true" aria-controls="collapseOnes">
                                Contact Information
                            </button>
                        </h2>



                        <div id="collapseOnes" class="accordion-collapse collapse show" aria-labelledby="headingOne"
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


                            </div>
                        </div>



                    </div>



                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Payment Information
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                <?php do_action('woocommerce_checkout_before_order_review_heading');?>

                                <h3 id="order_review_heading"><?php esc_html_e('Your orders info', 'woocommerce');?>
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
            </form>

        </div>
    </div>
</div>



<?php do_action('woocommerce_after_checkout_form', $checkout);?>