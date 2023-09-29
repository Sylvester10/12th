<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="assets/img/bg/14.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">About Us</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- ABOUT US AREA START -->
<div class="ltn__about-us-area pt-120--- pb-90 mt--30">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="about-us-img-wrap about-img-left">
                    <img src="assets/img/others/13.png" alt="About Us Image">
                    <div class="about-us-img-info about-us-img-info-2 about-us-img-info-3">

                        <div class="ltn__video-img ltn__animation-pulse1">
                            <img src="assets/img/others/8.png" alt="video popup bg image">
                            <a class="ltn__video-icon-2 ltn__video-icon-2-border---" href="https://www.youtube.com/embed/X7R-q9rsrtU?autoplay=1&showinfo=0" data-rel="lightcase:myCollection">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="about-us-info-wrap">
                    <div class="section-title-area ltn__section-title-2--- mb-20">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">About Us</h6>
                        <h1 class="section-title">The Leading Real Estate Marketplace<span>.</span></h1>
                        <p>12th City is one of Africa’s most respected names in real estate development and is recognized as a premier developer of Class A residential and commercial properties throughout the continent. With headquarters in the city center of Abuja, Nigeria. We provide exceptionally high-quality residential and commercial properties that deliver quantitative value to our clients. We like to think that investing in our properties is the beginning of a family legacy.</p>
                    </div>
                    <div class="ltn__callout bg-overlay-theme-05  mt-30">
                        <p>"The magic thing about home is that it feels good to leave, and it feels even better to come back." </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT US AREA END -->

<!-- MISSION VISION AREA START -->
<div class="ltn__feature-area section-bg-2 pt-115 pb-90">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-sm-6 col-12">
                <div class="ltn__feature-item ltn__feature-item-7 ltn__feature-item-7-color-white">
                    <div class="ltn__feature-icon-title">
                        <div class="ltn__feature-icon">
                            <span><i class="flaticon-house-4"></i></span>
                        </div>
                        <h3><a href="service-details.html">Our Mission</a></h3>
                    </div>
                    <div class="ltn__feature-info">
                        <p>To enrich the lives we touch by building wealth and creating comfort.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12">
                <div class="ltn__feature-item ltn__feature-item-7 ltn__feature-item-7-color-white">
                    <div class="ltn__feature-icon-title">
                        <div class="ltn__feature-icon">
                            <span><i class="icon-repair-1"></i></span>
                        </div>
                        <h3><a href="service-details.html">Our Core Values</a></h3>
                    </div>
                    <div class="ltn__feature-info">
                        <p>
                        <ul>
                            <li>Relationship: community, love and generosity.</li>
                            <li>Excellence: professionalism, competence and quality.</li>
                            <li>Accountability: Responsibility, reliability and intergrity.</li>
                            <li>Loyalty: commitment, dedication and discipline.</li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12">
                <div class="ltn__feature-item ltn__feature-item-7 ltn__feature-item-7-color-white">
                    <div class="ltn__feature-icon-title">
                        <div class="ltn__feature-icon">
                            <span><i class="icon-mechanic"></i></span>
                        </div>
                        <h3><a href="service-details.html">Our Vision</a></h3>
                    </div>
                    <div class="ltn__feature-info">
                        <p>We envision being the partner of choice to those who believe that smart, comfortable, and thoughtful Real estate development changes cities for the better.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FEATURE AREA END -->

<!-- TEAM AREA START (Team - 3) -->
<div class="ltn__team-area pt-115 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2--- text-center">
                    <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Team</h6>
                    <h1 class="section-title">Our Backbone Staff</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">

            <?php
            foreach ($staff as $s) { ?>

                <div class="col-lg-3 col-sm-6">
                    <div class="ltn__team-item ltn__team-item-3---">
                        <div class="team-img">
                            <img src="<?php echo base_url('assets/uploads/photos/staff/' . $s->photo); ?>" alt="Staff Image">
                        </div>
                        <div class="team-info">
                            <h4><a href="#"><?php echo $s->name; ?></a></h4>
                            <h6 class="ltn__secondary-color"><?php echo $s->designation; ?></h6>
                            <div class="ltn__social-media">
                                <ul>
                                    <li><a href="<?php echo $s->facebook; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="<?php echo $s->twitter; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="<?php echo $s->linkedin; ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="<?php echo $s->instg; ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
</div>
<!-- TEAM AREA END -->