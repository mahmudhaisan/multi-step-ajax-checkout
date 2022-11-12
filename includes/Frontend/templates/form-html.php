<?php

$product_args = array(
    'status' => 'publish',
    'limit' => -1,

);
$products_info = wc_get_products($product_args);

$site_url = get_site_url();
// echo '<pre>';
// print_r($products_info);
// echo '</pre>';

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
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse p-5 collapse show"
                        aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">

                            <div class="service-categories text-xs-center">
                                <div class="">
                                    <!-- showing 2nd accordion contents -->
                                    <div class="mb-3 mt-3 h4 section-title-accordion-item">
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

                                        <h4>Don't See Your Item?</h4>
                                        <input type="text" id="search-query" class="form-control my-3"
                                            placeholder="Search Your Item">
                                        <ul class="list-group d-none" id="list-group-for-search">
                                            <li class="list-group-item active">Header</li>
                                            <li class="list-group-item list-group-item-secondary">Pernalonga</li>
                                            <li class="list-group-item list-group-item-secondary">Patolino</li>
                                            <li class="list-group-item list-group-item-secondary">Eufrazino</li>
                                            <li class="list-group-item list-group-item-secondary">Lola Bunny</li>
                                            <li class="list-group-item list-group-item-secondary">Frajola</li>
                                            <li class="list-group-item list-group-item-secondary">Piu-Piu</li>
                                            <li class="list-group-item list-group-item-secondary">Taz</li>
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
                                                        $product_id             = $product_info->get_id();
                                                        $product_price          = $product_info->get_price();
                                                        $product_stock_quantity = get_post_meta($product_id, '_stock', true);

                                                    ?>
                                                    <!-- Single item -->
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                                            <!-- Image -->
                                                            <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                                                data-mdb-ripple-color="light">
                                                                <img src="" class="w-100" alt="Blue Jeans Jacket" />
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

                                                            <button type="button"
                                                                class="btn btn-primary btn-sm me-1 mb-2"
                                                                data-mdb-toggle="tooltip" title="Remove item">
                                                                <i class="fas fa-trash"></i>
                                                            </button>

                                                            <!-- Data -->
                                                        </div>



                                                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                                            <!-- Quantity -->
                                                            <div class="d-flex mb-4" style="max-width: 300px">
                                                                <button
                                                                    class="btn btn-primary px-3 me-2 cart-quantity-btn"
                                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>

                                                                <div class="form-outline">
                                                                    <input name="cart_quantity_number" id="form1"
                                                                        min="0" product-id=<?php echo $product_id; ?>
                                                                        max="<?php echo $product_stock_quantity; ?>"
                                                                        name="quantity" value="12" type="number"
                                                                        class="form-control cart-quantity-number" />
                                                                    <label class="form-label"
                                                                        for="form1">Quantity</label>
                                                                </div>

                                                                <button
                                                                    class="btn btn-primary px-3 ms-2 cart-quantity-btn"
                                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>



                                                                <button id="tst-btn"
                                                                    product-id="<?php echo $product_id; ?>">check
                                                                </button>


                                                                <a
                                                                    href='?add-to-cart=<?php echo $product_id; ?>&&quantity=<?php echo $val; ?>'>add
                                                                    to cart</a>

                                                            </div>
                                                            <!-- Quantity -->


                                                            <!-- Price -->
                                                            <p class="text-start text-md-center">
                                                                <strong><?php echo get_woocommerce_currency_symbol() . $product_price; ?></strong>
                                                            </p>
                                                            <!-- Price -->
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
        <div class="col-md-4">

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