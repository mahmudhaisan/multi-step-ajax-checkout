<?php

namespace Multi\Checkout\Frontend;

/**
 * Shortcode Handler Class
 */

class Shortcode
{
    public function __construct()
    {
        add_shortcode('multi_step_form_frontend', [$this, 'accordion_multi_step_frontend']);

    }

    public function accordion_multi_step_frontend()
    {

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
                                    <!-- showing 1st accordion contents -->
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

                                    <span class="fa fa-search"></span>
                                    <input placeholder="Search term">


                                    <input type="text" id="search-query" class="form-control my-3">
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
                                    <div class="btn btn-primary align-right">Next</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h1 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseTwo">
                            When would you like your items picked up?
                        </button>
                    </h1>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                        aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until
                            the collapse
                            plugin adds the appropriate classes that we use to style each element. These classes control
                            the overall
                            appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                            this with
                            custom CSS or overriding our default variables. It's also worth noting that just about any
                            HTML can go
                            within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>







<?php }
}