<?php

$product_args = array(
    'status' => 'publish',
    'limit' => 4,

);
$products_info = wc_get_products($product_args);

$cart_total_price = WC()->cart->get_cart_contents_total();
$woo_currency_symbol = get_woocommerce_currency_symbol();

?>


<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="accordion" id="accordionPanelsStayOpenExample">
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
foreach ($products_info as $product) {

    // Collect product variables
    $product_id = $product->get_id();
    $product_name = $product->get_name();
    $product_price = $product->get_price();
    $product_image_by_id = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail')[0];

    ?>


                                <div class="col-md-3 col-sm-4 radio-add-to-cart-ajax">
                                    <div class="card card-select-items">
                                        <img src="<?php echo $product_image_by_id; ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h3 class="card-title"> <?php echo $product_name; ?> </h3>

                                        </div>
                                    </div>
                                </div>



                                <?php }?>

                            </div>

                            <div class="d-grid gap-2 mt-5 d-md-flex justify-content-md-end accordion-next-btn-wrapper">
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




                                <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker"
                                    inline="true">
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






                            <div class="d-grid gap-2 d-md-flex justify-content-md-end accordion-next-btn-wrapper mt-5">
                                <button class="btn btn btn-lg btn-outline-dark me-1 mb-2"
                                    id="second-accordion-item-next" type="button">Next</button>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <!-- 3rd accordion item -->

            <!-- fouth accordion item -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#fourth-loadup-accordion-item" aria-expanded="true"
                        aria-controls="third-loadup-accordion-item">
                        Orders Details
                    </button>
                </h2>
                <div id="fourth-loadup-accordion-item" class="accordion-collapse collapse show"
                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <h1>In Home or Outdoor Pickup?</h1>


                    </div>
                </div>
            </div>
            <!-- fouth accordion item -->

        </div>
        <!-- woo checkout -->

    </div>
    <!-- col-md-8 -->
</div>
<!-- row -->
</div>








<script>
function quantity_number() {
    var itemQty = document.getElementsByClassName('itemQty');
    var itemPrice = document.getElementsByClassName('product_price_hidden');
    var itemTotalPrice = document.getElementsByClassName('product_total_price');
    var arrProductTotalPrice = [];
    var finalProductPrice = 0;

    for (i = 0; i < itemPrice.length; i++) {
        var itemQtyValue = itemQty[i].value;
        var itemPriceValue = itemPrice[i].value;
        var totalPriceValue = (itemQty[i].value) * (itemPrice[i].value);
        arrProductTotalPrice.push(totalPriceValue);
    }

    for (var value of arrProductTotalPrice) {
        finalProductPrice += value;
    }

    itemTotalPrice[0].innerText = finalProductPrice;
}
</script>