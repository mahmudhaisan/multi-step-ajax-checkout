<?php

$product_args = array(
    'status' => 'publish',
    'limit' => -1,

);
$products_info = wc_get_products($product_args);

$cart_total_price = WC()->cart->get_cart_contents_total();
$woo_currency_symbol = get_woocommerce_currency_symbol();



?>






<div class="container">

    <div class="row">
        <div class="col-md-8">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h1 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne">
                            Please select your items for removal
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
                                        <div class="col-md-3 col-sm-4">
                                            <div class="wrimagecard wrimagecard-topimage">
                                                <a href="#">
                                                    <div class="wrimagecard-topimage_header"
                                                        style="background-color:rgba(187, 120, 36, 0.1) ">
                                                        <center><i class="fa fa-area-chart" style="color:#BB7824"></i>
                                                        </center>
                                                    </div>
                                                    <div class="wrimagecard-topimage_title">
                                                        <h4>Charts
                                                            <div class="pull-right badge">18</div>
                                                        </h4>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4">
                                            <div class="wrimagecard wrimagecard-topimage">
                                                <a href="#">
                                                    <div class="wrimagecard-topimage_header"
                                                        style="background-color: rgba(22, 160, 133, 0.1)">
                                                        <center><i class="fa fa-cubes" style="color:#16A085"></i>
                                                        </center>
                                                    </div>
                                                    <div class="wrimagecard-topimage_title">
                                                        <h4>Controls
                                                            <div class="pull-right badge" id="WrControls"></div>
                                                        </h4>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4">
                                            <div class="wrimagecard wrimagecard-topimage">
                                                <a href="#">
                                                    <div class="wrimagecard-topimage_header"
                                                        style="background-color:  rgba(213, 15, 37, 0.1)">
                                                        <center><i class="fa fa-newspaper" style="color:#d50f25"> </i>
                                                        </center>
                                                    </div>
                                                    <div class="wrimagecard-topimage_title">
                                                        <h4>Forms
                                                            <div class="pull-right badge" id="WrForms"></div>
                                                        </h4>
                                                    </div>

                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4">
                                            <div class="wrimagecard wrimagecard-topimage">
                                                <a href="#">
                                                    <div class="wrimagecard-topimage_header"
                                                        style="background-color:  rgba(51, 105, 232, 0.1)">
                                                        <center><i class="fa fa-table" style="color:#3369e8"> </i>
                                                        </center>
                                                    </div>
                                                    <div class="wrimagecard-topimage_title">
                                                        <h4>Grid System
                                                            <div class="pull-right badge" id="WrGridSystem"></div>
                                                        </h4>
                                                    </div>

                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4">
                                            <div class="wrimagecard wrimagecard-topimage">
                                                <a href="#">
                                                    <div class="wrimagecard-topimage_header"
                                                        style="background-color:  rgba(250, 188, 9, 0.1)">
                                                        <center><i class="fa fa-camera-retro" style="color:#fabc09">
                                                            </i>
                                                        </center>
                                                    </div>
                                                    <div class="wrimagecard-topimage_title">
                                                        <h4>Information
                                                            <div class="pull-right badge" id="WrInformation"></div>
                                                        </h4>
                                                    </div>

                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4">
                                            <div class="wrimagecard wrimagecard-topimage">
                                                <a href="#">
                                                    <div class="wrimagecard-topimage_header"
                                                        style="background-color: rgba(121, 90, 71, 0.1)">
                                                        <center><i class="fa fa-bars" style="color:#795a47"> </i>
                                                        </center>
                                                    </div>
                                                    <div class="wrimagecard-topimage_title">
                                                        <h4>Navigation
                                                            <div class="pull-right badge" id="WrNavigation"></div>
                                                        </h4>
                                                    </div>

                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4">
                                            <div class="wrimagecard wrimagecard-topimage">
                                                <a href="#">
                                                    <div class="wrimagecard-topimage_header"
                                                        style="background-color: rgba(130, 93, 9, 0.1)">
                                                        <center><i class="fa fa-magic" style="color:#825d09"></i>
                                                        </center>
                                                    </div>
                                                    <div class="wrimagecard-topimage_title">
                                                        <h4>Themes & Icons
                                                            <div class="pull-right badge" id="WrThemesIcons"></div>
                                                        </h4>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>


                                        <div class="mb-3 mt-3 h3 section-title-accordion-item">
                                            Don't See Your Item?
                                        </div>



                                        <input type="text" id="search-query"
                                            class="form-control my-3 bg-white text-dark" placeholder="Search Your Item">
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
                                                <div class="card-body">
                                                    <?php

                                                    foreach ($products_info as $product_info) {
                                                        $product_id = $product_info->get_id();
                                                        $product_price = $product_info->get_price();
                                                        $product_stock_quantity = get_post_meta($product_id, '_stock', true);

                                                        $product_image_by_id = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail')[0];
                                                    ?>
                                                    <!-- Single item -->
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                                            <!-- Image -->
                                                            <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                                                data-mdb-ripple-color="light">
                                                                <img src="<?php echo $product_image_by_id; ?>"
                                                                    class="w-100" alt="Blue Jeans Jacket" />
                                                                <a href="#!">
                                                                    <div class="mask"
                                                                        style="background-color: rgba(251, 251, 251, 0.2)">
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <!-- Image -->
                                                        </div>



                                                        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                                            <!-- Data -->
                                                            <p><strong><?php echo $product_info->get_title(); ?></strong>
                                                            </p>
                                                            <!-- Data -->
                                                        </div>



                                                        <!-- quantity -->
                                                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                                            <!-- Quantity -->
                                                            <div class="d-flex mb-4" style="max-width: 300px">
                                                                <button
                                                                    class="btn btn-primary px-3 me-2 cart-quantity-btn"
                                                                    onchange="quantity_number()"
                                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>

                                                                <?php

                                                                    $quan_num = 1;


                                                                    ?>

                                                                <div class="form-outline">
                                                                    <input type="hidden" class="product_price_hidden"
                                                                        value="<?php echo $product_price; ?>">
                                                                    <input name="cart_quantity_number" min="0"
                                                                        onchange="quantity_number()"
                                                                        max="<?php echo $product_stock_quantity; ?>"
                                                                        value="<?php echo $quan_num; ?>" type="number"
                                                                        class="form-control itemQty" />



                                                                </div>



                                                                <button
                                                                    class="btn btn-primary px-3 ms-2 cart-quantity-btn"
                                                                    onchange="quantity_number()"
                                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>

                                                            </div>
                                                            <!-- Quantity -->

                                                            <button type="button"
                                                                class="btn btn-white btn-sm border border-primary me-1 mb-2"
                                                                data-mdb-toggle="tooltip" title="">
                                                                Remove Item
                                                            </button>



                                                        </div>



                                                    </div>
                                                    <hr class="my-4" />

                                                    <!-- Single item -->
                                                    <?php } ?>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="btn btn-primary align-right">Next</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- accordion item -->
            </div>
            <!-- accordion -->

        </div>
        <div class="col-md-4 ">
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

    <div class="row">
        <div class="col-md-8">
            <?php echo "[woocommerce_checkout]"; ?>
        </div>
        <div class="col-md-4">

        </div>
    </div>





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




        console.log(i);

        // console.log((itemQty[i].value) * (itemPrice[i].value));








    }


    for (var value of arrProductTotalPrice) {
        finalProductPrice += value;
    }



    itemTotalPrice[0].innerText = finalProductPrice;



}
</script>