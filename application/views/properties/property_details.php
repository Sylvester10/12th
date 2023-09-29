<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image mb-0" data-bs-bg="assets/img/bg/14.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Property Details</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li><?php echo $y->lga; ?> Area</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- IMAGE SLIDER AREA START (img-slider-3) -->
<div class="ltn__img-slider-area mb-90">
    <div class="container-fluid">
        <div class="row ltn__image-slider-5-active slick-arrow-1 slick-arrow-1-inner ltn__no-gutter-all">
            <?php 
                $image_names_arr = explode(',', $y->featured_image);
                foreach ($image_names_arr as $image_name){
                    $image = base_url('assets/uploads/properties/'.$image_name);
                    echo '<div class="col-lg-12">
                            <div class="ltn__img-slide-item-4">
                                <a href="'.$image.'" data-rel="lightcase:myCollection">
                                    <img src="'.$image.'" alt="Image">
                                </a>
                            </div>
                        </div>';
                }
            ?>

        </div>
    </div>
</div>
<!-- IMAGE SLIDER AREA END -->

<!-- PROPERTY DETAILS AREA START -->
<div class="ltn__shop-details-area pb-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="ltn__shop-details-inner ltn__page-details-inner mb-60">
                    <div class="ltn__blog-meta">
                        <ul>
                            <li class="ltn__blog-category">
                                <a href="#">Featured</a>
                            </li>
                            <li class="ltn__blog-category">
                                <a class="bg-orange" href="#">For Rent</a>
                            </li>
                            <li class="ltn__blog-date">
                                <i class="far fa-calendar-alt"></i><?php echo x_date($y->date_added); ?>
                            </li>
                        </ul>
                    </div>
                    <h1><?php echo $y->title; ?></h1>
                    <label><span class="ltn__secondary-color"><i class="flaticon-pin"></i></span> <?php echo $y->address; ?></label>

                    <h4 class="title-2">Property Video</h4>
                    <div class="ltn__video-bg-img ltn__video-popup-height-500 bg-overlay-black-50 bg-image mb-60" data-bs-bg="<?php echo base_url('assets/img/others/5.jpg'); ?>">
                        <a class="ltn__video-icon-2 ltn__video-icon-2-border---" href="<?php echo $y->video; ?>" data-rel="lightcase:myCollection">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>

                    <h4 class="title-2">Description</h4>
                    <p><?php echo $y->description; ?></p>

                    <!-- <h4 class="title-2">Property Details</h4>
                    <div class="property-detail-info-list section-bg-1 clearfix mb-60">
                        <ul>
                            <li><label>Property ID:</label> <span>HZ29</span></li>
                            <li><label>Home Area: </label> <span>120 sqft</span></li>
                            <li><label>Rooms:</label> <span>7</span></li>
                            <li><label>Baths:</label> <span>2</span></li>
                            <li><label>Year built:</label> <span>1992</span></li>
                        </ul>
                        <ul>
                            <li><label>Lot Area:</label> <span>HZ29 </span></li>
                            <li><label>Lot dimensions:</label> <span>120 sqft</span></li>
                            <li><label>Beds:</label> <span>7</span></li>
                            <li><label>Price:</label> <span><?php echo number_format($y->price); ?></span></li>
                            <li><label>Property Status:</label> <span>For Sale</span></li>
                        </ul>
                    </div> -->

                   <!-- <h4 class="title-2">Facts and Features</h4>
                    <div class="property-detail-feature-list clearfix mb-45">
                        <ul>
                            <li>
                                <div class="property-detail-feature-list-item">
                                    <i class="flaticon-double-bed"></i>
                                    <div>
                                        <h6>Living Room</h6>
                                        <small>20 x 16 sq feet</small>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="property-detail-feature-list-item">
                                    <i class="flaticon-double-bed"></i>
                                    <div>
                                        <h6>Garage</h6>
                                        <small>20 x 16 sq feet</small>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="property-detail-feature-list-item">
                                    <i class="flaticon-double-bed"></i>
                                    <div>
                                        <h6>Dining Area</h6>
                                        <small>20 x 16 sq feet</small>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="property-detail-feature-list-item">
                                    <i class="flaticon-double-bed"></i>
                                    <div>
                                        <h6>Bedroom</h6>
                                        <small>20 x 16 sq feet</small>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="property-detail-feature-list-item">
                                    <i class="flaticon-double-bed"></i>
                                    <div>
                                        <h6>Bathroom</h6>
                                        <small>20 x 16 sq feet</small>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="property-detail-feature-list-item">
                                    <i class="flaticon-double-bed"></i>
                                    <div>
                                        <h6>Gym Area</h6>
                                        <small>20 x 16 sq feet</small>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="property-detail-feature-list-item">
                                    <i class="flaticon-double-bed"></i>
                                    <div>
                                        <h6>Garden</h6>
                                        <small>20 x 16 sq feet</small>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="property-detail-feature-list-item">
                                    <i class="flaticon-double-bed"></i>
                                    <div>
                                        <h6>Parking</h6>
                                        <small>20 x 16 sq feet</small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div> -->
                    
                    <h4 class="title-2">Features and Amenities</h4>
                    <div class="property-detail-feature-list clearfix mb-45">
                        <ul>
                            <?php 
                                $amenities = explode(',', $y->amenities);
                                foreach ($amenities as $a){
                                    echo '<li>
                                            <div class="property-detail-feature-list-item">
                                                <i class="flaticon-double-bed"></i>
                                                <div>
                                                    <h6>'.$a.'</h6>
                                                </div>
                                            </div>
                                        </li>';
                                }
                            ?>
                        </ul>
                    </div>

                    <h4 class="title-2">From Our Gallery</h4>
                    <div class="ltn__property-details-gallery mb-30">
                        <div class="row">
                            <?php 
                                $image_names_arr = explode(',', $y->featured_image);
                                foreach ($image_names_arr as $image_name){
                                    $image = base_url('assets/uploads/properties/'.$image_name);
                                    echo ' <div class="col-md-6">
                                        <a href="'.$image.'" data-rel="lightcase:myCollection">
                                            <img class="mb-30" src="'.$image.'" alt="Image">
                                        </a>
                                    </div>';
                                }
                            ?>
                        </div>
                    </div>

                    <h4 class="title-2">Floor Plans</h4>
                    <!-- APARTMENTS PLAN AREA START -->
                    <div class="ltn__apartments-plan-area product-details-apartments-plan mb-60">
                        <div class="ltn__tab-menu ltn__tab-menu-3 ltn__tab-menu-top-right-- text-uppercase--- text-center---">
                            <div class="nav">
                                <a class="active show" data-bs-toggle="tab" href="#liton_tab_3_1">First</a>
                                <a data-bs-toggle="tab" href="#liton_tab_3_2" class="">Second </a>
                                <a data-bs-toggle="tab" href="#liton_tab_3_3" class="">Third</a>
                                <a data-bs-toggle="tab" href="#liton_tab_3_4" class="">Fourth</a>
                                <a data-bs-toggle="tab" href="#liton_tab_3_5" class="">Fifth</a>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="liton_tab_3_1">
                                <div class="ltn__apartments-tab-content-inner">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="apartments-plan-img">
                                                <?php 
                                                    $image_names_arr = explode(',', $y->floor_plans);
                                                    $image = base_url('assets/uploads/properties/'.$image_names_arr[0]);
                                                        echo ' <a href="'.base_url('home/property_details/' . $y->id).'"><img src="'.$image.'" alt="#"></a>';
                                                ?>
                                            </div>
                                        </div>
                                        <!--<div class="col-lg-12">
                                            <div class="product-details-apartments-info-list  section-bg-1">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                            <ul>
                                                                <li><label>Total Area</label> <span>2800 Sq. Ft</span></li>
                                                                <li><label>Bedroom</label> <span>150 Sq. Ft</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                            <ul>
                                                                <li><label>Belcony/Pets</label> <span>Allowed</span></li>
                                                                <li><label>Lounge</label> <span>650 Sq. Ft</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_tab_3_2">
                                <div class="ltn__product-tab-content-inner">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="apartments-plan-img">
                                                <?php 
                                                    $image_names_arr = explode(',', $y->floor_plans);
                                                    $image = base_url('assets/uploads/properties/'.$image_names_arr[1]);
                                                        echo ' <a href="'.base_url('home/property_details/' . $y->id).'"><img src="'.$image.'" alt="#"></a>';
                                                ?>
                                            </div>
                                        </div>
                                        <!--<div class="col-lg-12">
                                            <div class="product-details-apartments-info-list  section-bg-1">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                            <ul>
                                                                <li><label>Total Area</label> <span>2800 Sq. Ft</span></li>
                                                                <li><label>Bedroom</label> <span>150 Sq. Ft</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                            <ul>
                                                                <li><label>Belcony/Pets</label> <span>Allowed</span></li>
                                                                <li><label>Lounge</label> <span>650 Sq. Ft</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_tab_3_3">
                                <div class="ltn__product-tab-content-inner">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="apartments-plan-img">
                                                <?php 
                                                    $image_names_arr = explode(',', $y->floor_plans);
                                                    $image = base_url('assets/uploads/properties/'.$image_names_arr[2]);
                                                        echo ' <a href="'.base_url('home/property_details/' . $y->id).'"><img src="'.$image.'" alt="#"></a>';
                                                ?>
                                            </div>
                                        </div>
                                        <!--<div class="col-lg-12">
                                            <div class="product-details-apartments-info-list  section-bg-1">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                            <ul>
                                                                <li><label>Total Area</label> <span>2800 Sq. Ft</span></li>
                                                                <li><label>Bedroom</label> <span>150 Sq. Ft</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                            <ul>
                                                                <li><label>Belcony/Pets</label> <span>Allowed</span></li>
                                                                <li><label>Lounge</label> <span>650 Sq. Ft</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_tab_3_4">
                                <div class="ltn__product-tab-content-inner">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="apartments-plan-img">
                                                <?php 
                                                    $image_names_arr = explode(',', $y->floor_plans);
                                                    $image = base_url('assets/uploads/properties/'.$image_names_arr[3]);
                                                        echo ' <a href="'.base_url('home/property_details/' . $y->id).'"><img src="'.$image.'" alt="#"></a>';
                                                ?>
                                            </div>
                                        </div>
                                       <!-- <div class="col-lg-5">
                                            <div class="apartments-plan-info ltn__secondary-bg--- text-color-white---">
                                                <h2>Top Garden</h2>
                                                <p>Enimad minim veniam quis nostrud exercitation ullamco laboris.
                                                    Lorem ipsum dolor sit amet cons aetetur adipisicing elit sedo
                                                    eiusmod tempor.Incididunt labore et dolore magna aliqua.
                                                    sed ayd minim veniam.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="product-details-apartments-info-list  section-bg-1">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                            <ul>
                                                                <li><label>Total Area</label> <span>2800 Sq. Ft</span></li>
                                                                <li><label>Bedroom</label> <span>150 Sq. Ft</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                            <ul>
                                                                <li><label>Belcony/Pets</label> <span>Allowed</span></li>
                                                                <li><label>Lounge</label> <span>650 Sq. Ft</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_tab_3_5">
                                <div class="ltn__product-tab-content-inner">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="apartments-plan-img">
                                                <?php 
                                                    $image_names_arr = explode(',', $y->floor_plans);
                                                    $image = base_url('assets/uploads/properties/'.$image_names_arr[4]);
                                                        echo ' <a href="'.base_url('home/property_details/' . $y->id).'"><img src="'.$image.'" alt="#"></a>';
                                                ?>
                                            </div>
                                        </div>
                                       <!-- 
                                        <div class="col-lg-12">
                                            <div class="product-details-apartments-info-list  section-bg-1">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                            <ul>
                                                                <li><label>Total Area</label> <span>2800 Sq. Ft</span></li>
                                                                <li><label>Bedroom</label> <span>150 Sq. Ft</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                            <ul>
                                                                <li><label>Belcony/Pets</label> <span>Allowed</span></li>
                                                                <li><label>Lounge</label> <span>650 Sq. Ft</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- APARTMENTS PLAN AREA END -->
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar---">
                    <!-- Author Widget -->
                    <div class="widget ltn__author-widget">
                        <div class="ltn__author-widget-inner text-center">
                            <h3>Are you interested?</h3>
                            <small>Contact us via any of the channels below</small>
                            <div class="btn-wrapper">
                                <a href="https://api.whatsapp.com/send?phone=2347033181509" target="_blank" class="theme-btn-1 btn btn-effect-1">Chat via Whatsapp</a>
                            </div>
                            <div class="btn-wrapper">
                                <a href="mailto:info@12thcityrealestate.ng" class="theme-btn-1 btn btn-effect-1">Send a mail</a>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- SHOP DETAILS AREA END -->