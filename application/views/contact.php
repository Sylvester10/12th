<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="img/bg/14.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Contact Us</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- CONTACT ADDRESS AREA START -->
<div class="ltn__contact-address-area mb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                    <div class="ltn__contact-address-icon">
                        <img src="assets/img/icons/10.png" alt="Icon Image">
                    </div>
                    <h3>Email Address</h3>
                    <p><?php echo business_contact_email; ?></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                    <div class="ltn__contact-address-icon">
                        <img src="assets/img/icons/11.png" alt="Icon Image">
                    </div>
                    <h3>Phone Number</h3>
                    <p><?php echo business_phone_number; ?></p>
                    <p><?php echo business_phone_number2; ?></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                    <div class="ltn__contact-address-icon">
                        <img src="assets/img/icons/12.png" alt="Icon Image">
                    </div>
                    <h3>Office Address</h3>
                    <p><?php echo business_address; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTACT ADDRESS AREA END -->

<!-- CONTACT MESSAGE AREA START -->
<div class="ltn__contact-message-area mb-120 mb--100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__form-box contact-form-box box-shadow white-bg">
                    <h4 class="title-2">Get A Quote</h4>
                    <?php
                    $form_attributes = array("id" => "contact_us_form");
                    echo form_open('home/contact_ajax', $form_attributes); ?>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-item input-item-name ltn__custom-icon">
                                <input type="text" name="name" placeholder="Enter your name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-item input-item-email ltn__custom-icon">
                                <input type="email" name="email" placeholder="Enter email address">
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                                <div class="input-item">
                                    <select class="nice-select">
                                        <option>Select Service Type</option>
                                        <option>Property Management </option>
                                        <option>Mortgage Service </option>
                                        <option>Consulting Service</option>
                                        <option>Home Buying</option>
                                        <option>Home Selling</option>
                                        <option>Escrow Services</option>
                                    </select>
                                </div>
                            </div> -->
                        <div class="col-md-4">
                            <div class="input-item input-item-phone ltn__custom-icon">
                                <input type="text" name="phone" placeholder="Enter phone number">
                            </div>
                        </div>
                    </div>
                    <div class="input-item input-item-textarea ltn__custom-icon">
                        <textarea name="message" placeholder="Enter message"></textarea>
                    </div>
                    <!-- <p><label class="input-info-save mb-0"><input type="checkbox" name="agree"> Save my name, email, and website in this browser for the next time I comment.</label></p> -->
                    <div class="btn-wrapper mt-0">
                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" id="submit" type="submit">Submit</button>
                    </div>
                    <div class="form-messege mb-0 mt-20" id="status_msg"></div>


                    <?php echo form_close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTACT MESSAGE AREA END -->

<!-- GOOGLE MAP AREA START -->
<div class="google-map mb-30">

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8068645.343970305!2d-1.498118149999968!3d9.084866100000022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0b1ae0d579f5%3A0xdea45935c75d8343!2s12th%20CITY%20REAL%20ESTATE%20DEVELOPERS!5e0!3m2!1sen!2sng!4v1674913902813!5m2!1sen!2sng" width="100%" height="100%" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

</div>
<!-- GOOGLE MAP AREA END -->