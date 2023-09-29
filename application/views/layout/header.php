<!doctype html>
<html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="noindex, follow" />
        <meta name="keywords" content="<?php echo business_keywords; ?>">
        <meta name="description" content="<?php echo business_description; ?>">
        <title><?php echo $title; ?> - <?php echo business_name; ?></title>

        <!-- Place favicon.png in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
        <!-- Font Icons css -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/font-icons.css'); ?>">
        <!-- plugins css -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins.css'); ?>">
        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
        <!-- Responsive css -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css'); ?>">
        <!-- Custom css -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>">

        <!-- Datepicker CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    </head>

    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

        <!-- Body main wrapper start -->
        <div class="body-wrapper">

            <!-- HEADER AREA START (header-5) -->
            <header class="ltn__header-area ltn__header-5 ltn__header-logo-and-mobile-menu-in-mobile ltn__header-logo-and-mobile-menu ltn__header-transparent--- gradient-color-4---">
                <!-- ltn__header-top-area start -->
                <div class="ltn__header-top-area section-bg-6">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="ltn__top-bar-menu">
                                    <ul>
                                        <li><a href="mailto:<?php echo business_contact_email; ?>"><i class="icon-mail"></i> <?php echo business_contact_email; ?></a></li>
                                        <li><a href="#"><i class="icon-placeholder"></i> <?php echo business_address; ?></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="top-bar-right text-end">
                                    <div class="ltn__top-bar-menu">
                                        <ul>
                                            <li>
                                                <!-- ltn__social-media -->
                                                <div class="ltn__social-media">
                                                    <ul>
                                                        <li><a href="https://www.facebook.com/profile.php?id=100088929480811&mibextid=LQQJ4d" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="www.Instagram.com/12th_city_real_estate" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__header-top-area end -->

                <!-- ltn__header-middle-area start -->
                <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="site-logo-wrap">
                                    <div class="site-logo">
                                        <a href="<?php echo base_url(); ?>"><img src="<?php echo business_logo; ?>" alt="Logo"></a>
                                    </div>
                                    <div class="get-support clearfix d-none">
                                        <div class="get-support-icon">
                                            <i class="icon-call"></i>
                                        </div>
                                        <div class="get-support-info">
                                            <h6>Get Support</h6>
                                            <h4><a href="tel:<?php echo business_phone_number; ?>"><?php echo business_phone_number; ?></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col header-menu-column">
                                <div class="header-menu d-none d-xl-block">
                                    <nav>
                                        <div class="ltn__main-menu">
                                            <ul>
                                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                                <li><a href="<?php echo base_url('about'); ?>">About Us</a></li>
                                                <li class="menu-icon"><a href="#">Property Listing</a>
                                                    <ul>
                                                        <li><a href="<?php echo base_url('properties_idu'); ?>">Idu</a></li>
                                                        <li><a href="<?php echo base_url('properties_lugbe'); ?>">Lugbe</a></li>
                                                        <li><a href="<?php echo base_url('properties_kurudu'); ?>">Kurudu</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="<?php echo base_url('events'); ?>">Event/blog</a></li>
                                                <li><a href="<?php echo base_url('affiliate'); ?>">Affiliate</a></li>
                                                <li><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                            <div class="col--- ltn__header-options ltn__header-options-2 ">
                                <!-- Mobile Menu Button -->
                                <div class="mobile-menu-toggle d-xl-none">
                                    <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                        <svg viewBox="0 0 800 600">
                                            <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                            <path d="M300,320 L540,320" id="middle"></path>
                                            <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__header-middle-area end -->
            </header>
            <!-- HEADER AREA END -->

            <!-- Utilize Mobile Menu Start -->
            <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
                <div class="ltn__utilize-menu-inner ltn__scrollbar">
                    <div class="ltn__utilize-menu-head">
                        <div class="site-logo">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo business_logo; ?>" alt="Logo"></a>
                        </div>
                        <button class="ltn__utilize-close">×</button>
                    </div>
                    <div class="ltn__utilize-menu">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a href="<?php echo base_url('about'); ?>">About Us</a></li>
                            <li><a href="#">Property Listing</a>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo base_url('properties_idu'); ?>">Idu</a></li>
                                    <li><a href="<?php echo base_url('properties_lugbe'); ?>">Lugbe</a></li>
                                    <li><a href="<?php echo base_url('properties_kurudu'); ?>">Kurudu</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url('events'); ?>">Event/blog</a></li>
                            <li><a href="<?php echo base_url('affiliate'); ?>">Affiliate</a></li>
                            <li><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
                        </ul>f
                    </div>
                    <div class="ltn__social-media-2">
                        <ul>
                            <li><a href="https://www.facebook.com/profile.php?id=100088929480811&mibextid=LQQJ4d" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="www.Instagram.com/12th_city_real_estate" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Utilize Mobile Menu End -->

            <div class="ltn__utilize-overlay"></div>