<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="assets/img/bg/14.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Event Details</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="<?php echo base_url('blog'); ?>"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Events/Blog</a></li>
                            <li><?php echo $y->caption; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- PAGE DETAILS AREA START (blog-details) -->
<div class="ltn__page-details-area ltn__blog-details-area mb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="ltn__blog-details-wrap">
                    <div class="ltn__page-details-inner ltn__blog-details-inner">
                        <img class="mb-30" src="<?php echo base_url('assets/uploads/events/' . $y->featured_image); ?>" alt="Image">
                        <h2 class="ltn__blog-title"><?php echo $y->caption; ?>
                        </h2>
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-author">
                                    <a href="#"><i class="far fa-user"></i>Admin</a>
                                </li>
                                <li class="ltn__blog-date">
                                    <i class="far fa-calendar-alt"></i><?php echo x_month_short($y->date_created); ?> <?php echo x_day_number($y->date_created); ?>, <?php echo x_year_long($y->date_created); ?>
                                </li>
                                <li>
                                    <a href="#"><i class="far fa-map"></i><?php echo $y->venue; ?></a>
                                </li>
                            </ul>
                        </div>
                        <p><?php echo $y->description; ?></p>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="sidebar-area blog-sidebar ltn__right-sidebar">
                    <!-- Popular Properties Widget -->
                    <div class="widget ltn__popular-product-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border-2">Popular Properties</h4>
                        <div class="row ltn__popular-product-widget-active slick-arrow-1">
                            <!-- ltn__product-item -->

                            <?php
                            foreach ($properties as $p) { ?>
                            <div class="col-12">
                                <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                    <div class="product-img">

                                        <?php 
                                            $image_names_arr = explode(',', $p->featured_image);
                                            $image = base_url('assets/uploads/properties/'.$image_names_arr[0]);
                                                echo ' <a href="'.base_url('home/property_details/' . $p->id).'"><img src="'.$image.'" alt="#"></a>';
                                        ?>
                                    </div>
                                    <div class="product-info">
                                        <div class="product-price">
                                            <span>₦<?php echo number_format($p->price); ?></span>
                                        </div>
                                        <h2 class="product-title"><a href="<?php echo base_url('home/property_details/' . $p->id); ?>"><?php echo $p->title; ?></a></h2>
                                        <div class="product-img-location">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="flaticon-pin"></i> <?php echo $p->address; ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                            <?php 
                                            $amenities = explode(',', $p->amenities);
                                            foreach ($amenities as $a){
                                                echo '<li><i class="fa fa-check-circle" style="color: #c5ab18 !important;"></i> '.$a.'</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <?php } //endforeach ?>
                            <!--  -->
                        </div>
                    </div>
                    <!-- Popular Post Widget -->
                    <div class="widget ltn__popular-post-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border-2">Latest Events</h4>
                        <ul>

                            <?php
                            foreach ($events as $e) { ?>

                                <li>
                                    <div class="popular-post-widget-item clearfix">
                                        <div class="popular-post-widget-img">
                                            <a href="<?php echo base_url('home/events_details/' . $e->id); ?>>"><img src="<?php echo base_url('assets/uploads/events/' . $e->featured_image); ?>" alt="#"></a>
                                        </div>
                                        <div class="popular-post-widget-brief">
                                            <h6><a href="<?php echo base_url('home/events_details/' . $e->id); ?>">
                                                    <?php echo $e->caption; ?>
                                                </a></h6>
                                            <div class="ltn__blog-meta">
                                                <ul>
                                                    <li class="ltn__blog-date">
                                                        <a href="#"><i class="far fa-calendar-alt"></i><?php echo x_month_short($e->date_created); ?> <?php echo x_day_number($e->date_created); ?>, <?php echo x_year_long($e->date_created); ?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>


                            <?php } //endforeach } 
                            ?>

                        </ul>
                    </div>
                    <!-- Social Media Widget -->
                    <div class="widget ltn__social-media-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border-2">Follow us</h4>
                        <div class="ltn__social-media-2">
                            <ul>
                                <li><a href="https://www.facebook.com/profile.php?id=100088929480811&mibextid=LQQJ4d" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="www.Instagram.com/12th_city_real_estate" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>

                            </ul>
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </div>
</div>
<!-- PAGE DETAILS AREA END -->