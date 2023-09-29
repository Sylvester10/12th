    <!-- SLIDER AREA START (slider-1) -->
    <div class="ltn__slider-area ltn__slider-6 mb-120---">
        <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">
            <!-- ltn__slide-item -->
            <div class="ltn__slide-item--- ltn__slide-item-9 section-bg-1 bg-image" data-bs-bg="assets/img/bg/test3.jpg">
                <!-- <div class="ltn__slide-item-9-img">
                    <img src="img/slider/111.jpeg" alt="#">
                </div> -->
                <div class="ltn__slide-item-inner">
                    <div class="slide-item-info bg-overlay-white-90 text-center">
                        <div class="slide-item-info-inner  ltn__slide-animation">
                            <h1 class="slide-title animated text-uppercase">INVEST IN THE FUTURE OF REAL ESTATE</h1>
                            <h4 class="slide-sub-title text-uppercase animated"></h4>
                            <div class="btn-wrapper animated">
                                <a href="<?php echo base_url('properties_idu'); ?>" class="theme-btn-1 btn btn-effect-1 text-uppercase">Property Listings</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__slide-item -->
            <div class="ltn__slide-item--- ltn__slide-item-9 section-bg-1 bg-image" data-bs-bg="assets/img/bg/test4.jpg">
                <!-- <div class="ltn__slide-item-9-img">
                    <img src="img/slider/111.jpeg" alt="#">
                </div> -->
                <div class="ltn__slide-item-inner">
                    <div class="slide-item-info bg-overlay-white-90 text-center">
                        <div class="slide-item-info-inner  ltn__slide-animation">
                            <h1 class="slide-title animated text-uppercase">OUR MODERN LIVING QUARTERS</h1>
                            <h4 class="slide-sub-title text-uppercase animated">50% OFF</h4>
                            <div class="btn-wrapper animated">
                                <a href="<?php echo base_url('properties_idu'); ?>" class="theme-btn-1 btn btn-effect-1 text-uppercase">Property Listings</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__slide-item -->
        </div>
    </div>
    <!-- SLIDER AREA END -->


    <!-- SERVICE AREA START ( Feature - 6) -->
    <div class="ltn__feature-area section-bg-1--- pt-115 pb-90 mb-120---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2--- ltn__secondary-color">Our Services</h6>
                        <h1 class="section-title">Our Main Focus</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__custom-gutter---  justify-content-center">
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1 active">
                        <div class="ltn__feature-icon">
                            <!-- <span><i class="flaticon-house-3"></i></span> -->
                            <img src="<?php echo base_url('assets/img/icons/icon-img/22.png'); ?>" alt="#">
                        </div>
                        <div class="ltn__feature-info">
                            <h3><a href="service-details.html">Sales</a></h3>
                            <p>We provide exceptionally high-quality residential and commercial properties that deliver quantitative value to our clients.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1">
                        <div class="ltn__feature-icon">
                            <!-- <span><i class="flaticon-house"></i></span> -->
                            <img src="<?php echo base_url('assets/img/icons/icon-img/21.png'); ?>" alt="#">
                        </div>
                        <div class="ltn__feature-info">
                            <h3><a href="service-details.html">Real Estate Development</a></h3>
                            <p>We are one of Africa’s most respected names in Real Estate Development, recognized as a premier developer of class A residence and commercial Properties throughout the continent.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1">
                        <div class="ltn__feature-icon">
                            <!-- <span><i class="flaticon-deal-1"></i></span> -->
                            <img src="<?php echo base_url('assets/img/icons/icon-img/23.png'); ?>" alt="#">
                        </div>
                        <div class="ltn__feature-info">
                            <h3><a href="service-details.html">Affordable Housing Plan</a></h3>
                            <p>We have flexible payment plans so you can pay for your home at your convenience and own a home that best suits your budget.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SERVICE AREA END -->

    <!-- UPCOMING PROJECT AREA START -->
    <div class="ltn__upcoming-project-area section-bg-1--- bg-image-top pt-115 pb-15" data-bs-bg="assets/img/bg/22.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2--- text-center---">
                    <h6 class="section-subtitle section-subtitle-2--- ltn__secondary-color--- white-color">Upcoming Projects</h6>
                    <h1 class="section-title  white-color">Setting New Standards <br>
                    For Your Dream Living Space </h1>
                </div>
            </div>
        </div>
        <div class="row ltn__upcoming-project-slider-1-active slick-arrow-3">
            <!-- upcoming-project-item -->
            <?php
                if (count($projects) > 0) { ?>

                    <?php
                    foreach ($projects as $p) { ?>

                    <div class="col-lg-12">
                        <div class="ltn__upcoming-project-item">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="ltn__upcoming-project-img">
                                        <img src="<?php echo base_url('assets/uploads/projects/' . $p->featured_image); ?>" alt="#">
                                    </div>
                                </div>
                                <div class="col-lg-5 section-bg-1">
                                    <div class="ltn__upcoming-project-info ltn__menu-widget">
                                        <h6 class="section-subtitle ltn__secondary-color mb-0"><?php echo $p->location; ?></h6>
                                        <h1 class="mb-30"><?php echo $p->title; ?></h1>
                                        <p class="mt">
                                        <?php echo $p->snippet; ?>
                                        </p>
                                        <div class="btn-wrapper animated">
                                            <a href="<?php echo base_url('assets/uploads/projects/' . $p->brochure_file); ?>" target="_blank" class="theme-btn-1 btn btn-effect-1">Download Brochure</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } //endforeach } ?>

            <?php } else { ?>

                    <h3 class="text-danger">No Project(s) to show.</h3>

            <?php } ?>
            <!--  -->
        </div>
    </div>
    </div>

    <!-- CALL TO ACTION START (call-to-action-4) -->
    <div class="ltn__call-to-action-area ltn__call-to-action-4 bg-image pt-50 pb-50" data-bs-bg="assets/img/bg/6.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="call-to-action-inner call-to-action-inner-4 text-center">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">// Have any enquiries? //</h6>
                            <h1 class="section-title white-color"><?php echo business_phone_number; ?></h1>
                        </div>
                        <div class="btn-wrapper">
                            <a href="mailto:<?php echo business_web_mail; ?>" class="theme-btn-1 btn btn-effect-1">Send a mail</a>
                            <a href="https://api.whatsapp.com/send?phone=2348066293996" target="_blank" class="btn btn-transparent btn-effect-4 white-color">Chat via Whatsapp</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CALL TO ACTION END -->

    <!-- SEARCH BY PLACE AREA START -->
    <div class="ltn__search-by-place-area before-bg-top bg-image-top--- pt-115 pb-70" data-bs-bg="assets/img/bg/20.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center---">
                        <h6 class="section-subtitle section-subtitle-2--- ltn__secondary-color">Find Your Dream House</h6>
                        <h1 class="section-title"> Search By Area</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__search-by-place-slider-1-active slick-arrow-1">
                <div class="col-lg-4">
                    <div class="ltn__search-by-place-item">
                        <div class="search-by-place-img">
                            <a href="<?php echo base_url('properties_idu'); ?>"><img src="assets/img/idu1.jpg" alt="#"></a>
                            <div class="search-by-place-badge">
                                <ul>
                                    <li><?php echo $total_properties_idu; ?> Properties</li>
                                </ul>
                            </div>
                        </div>
                        <div class="search-by-place-info">
                            <h4><a href="<?php echo base_url('properties_idu'); ?>">Idu Area</a></h4>
                            <div class="search-by-place-btn">
                                <a href="<?php echo base_url('properties_idu'); ?>">View Properties <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__search-by-place-item">
                        <div class="search-by-place-img">
                            <a href="<?php echo base_url('properties_lugbe'); ?>"><img src="assets/img/lugbe.jpg" alt="#"></a>
                            <div class="search-by-place-badge">
                                <ul>
                                    <li><?php echo $total_properties_lugbe; ?> Properties</li>
                                </ul>
                            </div>
                        </div>
                        <div class="search-by-place-info">
                            <h4><a href="<?php echo base_url('properties_lugbe'); ?>">Lugbe Area</a></h4>
                            <div class="search-by-place-btn">
                                <a href="<?php echo base_url('properties_lugbe'); ?>">View Properties <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__search-by-place-item">
                        <div class="search-by-place-img">
                            <a href="<?php echo base_url('properties_kurudu'); ?>"><img src="assets/img/kurudu.jpg" alt="#"></a>
                            <div class="search-by-place-badge">
                                <ul>
                                    <li><?php echo $total_properties_kurudu; ?> Properties</li>
                                </ul>
                            </div>
                        </div>
                        <div class="search-by-place-info">
                            <h4><a href="<?php echo base_url('properties_kurudu'); ?>">Kurudu Area</a></h4>
                            <div class="search-by-place-btn">
                                <a href="<?php echo base_url('properties_kurudu'); ?>">View Properties <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
    <!-- SEARCH BY PLACE AREA END -->

    <!-- TESTIMONIAL AREA START (testimonial-8) -->
    <div class="ltn__testimonial-area section-bg-1--- bg-image-top pt-115 pb-65" data-bs-bg="assets/img/bg/23.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center---">
                        <h6 class="section-subtitle section-subtitle-2--- ltn__secondary-color--- white-color">Client Testimonials</h6>
                        <h1 class="section-title white-color">See What Our Clients <br>
                            Says About Us</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__testimonial-slider-6-active slick-arrow-3">

            <?php
                foreach ($testimonials as $t) { ?>

                <div class="col-lg-4">
                    <div class="ltn__testimonial-item ltn__testimonial-item-7 ltn__testimonial-item-8">
                        <div class="ltn__testimoni-info">
                            <div class="ltn__testimoni-author-ratting">
                                <div class="ltn__testimoni-info-inner">
                                    <div class="ltn__testimoni-img">
                                        <img src="<?php echo user_avatar; ?>" alt="#">
                                    </div>
                                    <div class="ltn__testimoni-name-designation">
                                        <h5><?php echo $t->name; ?></h5>
                                    </div>
                                </div>
                                <div class="ltn__testimoni-rating">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p><?php echo $t->testimony; ?></p>
                        </div>
                    </div>
                </div>

            <?php } //endforeach ?>
                <!--  -->
            </div>
        </div>
    </div>
    <!-- TESTIMONIAL AREA END -->

    <!-- BLOG/EVENTS AREA START (blog-3) -->
    <div class="ltn__blog-area pt-115--- pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2--- ltn__secondary-color">From our Blog</h6>
                        <h1 class="section-title">Latest News & Events</h1>
                    </div>
                </div>
            </div>
            <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
                <!-- Blog Item -->

                <!-- Check to see if at lis 1 event is published -->
                <?php
                if (count($events) > 0) { ?>

                    <?php
                    foreach ($events as $y) { ?>

                        <div class="col-lg-12">
                            <div class="ltn__blog-item ltn__blog-item-3">
                                <div class="ltn__blog-img">
                                    <a href="<?php echo base_url('home/events_details/' . $y->id); ?>"><img src="<?php echo base_url('assets/uploads/events/' . $y->featured_image); ?>" alt="#"></a>
                                </div>
                                <div class="ltn__blog-brief">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-author">
                                                <a href="#"><i class="far fa-user"></i>Admin</a>
                                            </li>
                                            <li class="ltn__blog-tags">
                                                <a href="#"><i class="far fa-map"></i><?php echo $y->venue; ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="ltn__blog-title"><a href="<?php echo base_url('home/events_details/' . $y->id); ?>"><?php echo $y->caption; ?></a></h3>
                                    <div class="ltn__blog-meta-btn">
                                        <div class="ltn__blog-meta">
                                            <ul>
                                                <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i><?php echo x_month_short($y->date_created); ?> <?php echo x_day_number($y->date_created); ?>, <?php echo x_year_long($y->date_created); ?></li>
                                            </ul>
                                        </div>
                                        <div class="ltn__blog-btn">
                                            <a href="<?php echo base_url('home/events_details/' . $y->id); ?>">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } //endforeach } 
                    ?>

                <?php } else { ?>

                    <h3 class="text-danger">No event to show.</h3>

                <?php } ?>
                <!--  -->
            </div>
        </div>
    </div>
    <!-- BLOG AREA END -->