<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="assets/img/bg/14.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Events</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Our Latest Events</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- BLOG AREA START -->
<div class="ltn__blog-area ltn__blog-item-3-normal mb-100">
    <div class="container">


        <?php
        if ($total_records > 0) { ?>


            <div class="row">
                <!-- Blog Item -->

                <?php
                $count = 1;
                foreach ($events as $y) { ?>


                    <div class="col-lg-4 col-sm-6 col-12">
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

                <!--  -->
            </div>

        <?php } else { ?>

            <h3 class="text-danger">No event to show.</h3>

        <?php } ?>


        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__pagination-area text-center">
                    <div class="ltn__pagination">
                        <ul>
                            <li><?php echo pagination_links($links, 'ltn__pagination active'); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BLOG AREA END -->