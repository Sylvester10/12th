    <!-- CALL TO ACTION START (call-to-action-6) -->
    <div class="ltn__call-to-action-area call-to-action-6 before-bg-bottom" data-bs-bg="assets/img/1.jpg--">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="call-to-action-inner call-to-action-inner-6 ltn__secondary-bg position-relative text-center---">
                        <div class="coll-to-info text-color-white">
                            <h1>Join our affiliate program</h1>
                            <p>Want to be a part of our ever growing team?</p>
                        </div>
                        <div class="btn-wrapper">
                            <a class="btn btn-effect-3 btn-white" href="<?php echo base_url('affiliate'); ?>">Join now <i class="icon-next"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CALL TO ACTION END -->

    <!-- FOOTER AREA START -->
    <footer class="ltn__footer-area  ">
        <div class="footer-top-area ltn__secondary-bg plr--5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-about-widget">
                            <div class="footer-logo">
                                <div class="site-logo">
                                    <img src="<?php echo business_logo_white; ?>" alt="Logo">
                                </div>
                            </div>
                            <p class="footer_text"><?php echo sub_tagline; ?></p>
                            
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title">Company</h4>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="<?php echo base_url('about'); ?>">About</a></li>
                                    <li><a href="<?php echo base_url('events'); ?>">Events</a></li>
                                    <li><a href="<?php echo base_url('contact'); ?>">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title">Locations</h4>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="<?php echo base_url('properties_idu'); ?>">Idu</a></li>
                                    <li><a href="<?php echo base_url('properties_kurudu'); ?>">Kurudu</a></li>
                                    <li><a href="<?php echo base_url('properties_lugbe'); ?>">Lugbe</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title">Contact Us</h4>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="#"><i class="icon-placeholder"></i> <?php echo business_address; ?></a>
                                    </li>
                                    <li><a href="tel:<?php echo business_phone_number; ?>"><i class="icon-call"></i> <?php echo business_phone_number; ?></a></li>
                                    <li><a href="mailto:<?php echo business_contact_email; ?>"><i class="icon-mail"></i> <?php echo business_contact_email; ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                        <div class="footer-widget footer-newsletter-widget">
                            <h4 class="footer-title">Socials</h4>
                            <p></p>
                            <div class="ltn__social-media mt-20">
                                <ul>
                                    <li><a href="https://www.facebook.com/profile.php?id=100088929480811&mibextid=LQQJ4d" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="www.Instagram.com/12th_city_real_estate" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                    <!-- <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li> -->
                                </ul>
                            </div>
                            <!-- <div class="footer-newsletter">
                                <form action="#">
                                    <input type="email" name="email" placeholder="Email*">
                                    <div class="btn-wrapper">
                                        <button class="theme-btn-1 btn" type="submit"><i class="fas fa-location-arrow"></i></button>
                                    </div>
                                </form>
                            </div>-->
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="ltn__copyright-area ltn__copyright-2 section-bg-7  plr--5">
            <div class="container-fluid ltn__border-top-2">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="ltn__copyright-design clearfix">
                            <p>All Rights Reserved @ <?php echo business_name; ?> <span class="current-year"></span></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 align-self-center">
                        <div class="ltn__copyright-menu text-end">
                            <ul>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy & Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER AREA END -->

    </div>
    <!-- Body main wrapper end -->

    <!-- preloader area start -->
    <div class="preloader d-none" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- All JS Plugins -->
    <script src="<?php echo base_url('assets/js/plugins.js'); ?>"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

    <!-- Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <!-- Custom JS -->
    <script src="<?php echo base_url('assets/js/custom_script.js'); ?>"></script>

    <script type="text/javascript">
        //pass base_url to js
        var base_url = "<?php echo base_url(); ?>";
    </script>

    </body>

    </html>