<?php

$product_args = array(
    'status' => 'publish',
    'limit' => 8,

);
$products_info = wc_get_products($product_args);

$cart_total_price = WC()->cart->get_cart_contents_total();
$woo_currency_symbol = get_woocommerce_currency_symbol();

?>






<div class="container">

    <div class="row">
        <div class="col-md-8">

            <div class="accordion" id="accordionPanelsStayOpenExample">



                <!-- 1st accordion item -->
                <div class="accordion-item">
                    <h1 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne">
                            Please Select Your Items For Removal
                        </button>
                    </h1>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">

                            <div class="service-categories text-xs-center">
                                <div class="">
                                    <!-- showing most popular product in accordion items -->
                                    <div class="mb-3 mt-3 h3 section-title-accordion-item">
                                        Most Popular Items
                                    </div>
                                    <div class="row">
                                        <?php

// Loop through list of products
foreach ($products_info as $product) {

    // Collect product variables
    $product_id = $product->get_id();
    $product_name = $product->get_name();
    $product_image_by_id = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail')[0];

    ?>

                                        <div class="col-md-3 col-sm-4 product-add-to-cart-ajax"
                                            items-to-add-id="<?php echo $product_id; ?>">
                                            <div class="wrimagecard wrimagecard-topimage">
                                                <a href="">
                                                    <div class="wrimagecard-topimage_header"
                                                        style="background-color:rgba(187, 120, 36, 0.1) ">
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

                                        <?php }?>
                                    </div>
                                </div>



                                <div class="mb-3 mt-3 h3 section-title-accordion-item">
                                    Don't See Your Item?
                                </div>



                                <input type="text" id="search-query" class="form-control my-3 bg-white text-dark"
                                    placeholder="Search Your Item">
                                <ul class="list-group bg-white text-dark d-none" id="list-group-for-search">
                                    <li class="list-group-item list-group-item-white">Header</li>
                                    <li class="list-group-item list-group-item-white">Pernalonga</li>
                                    <li class="list-group-item list-group-item-white">Patolino</li>
                                    <li class="list-group-item list-group-item-white">Eufrazino</li>
                                    <li class="list-group-item list-group-item-white">Lola Bunny</li>
                                    <li class="list-group-item list-group-item-white">Frajola</li>
                                    <li class="list-group-item list-group-item-white">Piu-Piu</li>
                                    <li class="list-group-item list-group-item-white">Taz</li>
                                </ul>
                                <div class="mb-4 mt-4">
                                    <span>
                                        <p class="h4 new-form-link-text">Have a bunch of items or don't see them
                                            listed?</p>
                                        <a href="#" class="h4 new-form-link text-info">Click Here to Book by
                                            Load
                                            Size</a>
                                    </span>
                                </div>


                                <!-- product infos -->
                                <div class="row d-flex justify-content-center my-4">
                                    <div class="col-md-12 card mb-4">
                                        <div class="card-header py-3">
                                            <h5 class="mb-0">My Items</h5>
                                        </div>
                                        <div class="card-body single-product-added-to-cart">



                                        </div>

                                    </div>

                                </div>

                                <div class="btn btn-primary align-right">Next</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 1st accordion item -->

                <!-- 2nd accordion item -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#second-accordion-item" aria-expanded="true"
                            aria-controls="second-accordion-item">
                            When Would You Like To Picked Up?
                        </button>
                    </h2>
                    <div id="second-accordion-item" class="accordion-collapse collapse show"
                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                            <!-- calender and select row -->
                            <div class="row">
                                <!-- calender row -->
                                <div class="col-md-6">


                                    <div id="date-picker-example"
                                        class="md-form md-outline input-with-post-icon datepicker" inline="true">
                                        <input placeholder="Select date" type="date" id="example" class="form-control">
                                    </div>


                                </div>


                                <!-- calender row -->
                                <div class="col-md-6">
                                    <select class="form-select form-select-lg mb-3"
                                        aria-label=".form-select-lg example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>

                <!-- 3rd accordion item -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#third-accordion-item" aria-expanded="true"
                            aria-controls="third-accordion-item">
                            Orders Details
                        </button>
                    </h2>
                    <div id="third-accordion-item" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h1>In Home or Outdoor Pickup?</h1>

                        </div>
                    </div>
                </div>



            </div>
            <!-- woo checkout -->

        </div>
        <!-- col-md-8 -->



        <div class="col-md-4 guranteed-price-col">
            <div class="row accordion-item p-4">
                <div class="order-summary-col">
                    <h3 class="text-center">Order Details</h3>
                    <div class="row price-row mt-2">
                        <h4 class="mb-0 p-3">Guranteed Price:
                            <span class="product_total_price"></span>
                        </h4>

                    </div>

                </div>
            </div>
        </div>


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