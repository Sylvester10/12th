<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="img/bg/14.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Affiliate Program</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Affiliate Program</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- CONTACT ADDRESS AREA START -->
<div class="ltn__contact-address-area mb-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                    <h3>Want to work with us or become an agent?</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTACT ADDRESS AREA END -->

<!-- AFFILIATE MESSAGE AREA START -->
<div class="ltn__contact-message-area mb-30">
    <div class="container">
        <div class="row">
            <div>
                <?php echo flash_message_success('status_msg'); ?>
                <?php echo flash_message_danger('status_msg_error'); ?>
            </div>
            <div class="col-lg-12">
                <div class="ltn__form-box contact-form-box box-shadow white-bg">
                    <h4 class="title-2">Fill the form</h4>
                    <?php
                    
                    echo form_open_multipart('home/add_affiliate'); ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-item input-item-name ltn__custom-icon">
                                <input type="text" name="name" placeholder="Enter your name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-item input-item-email ltn__custom-icon">
                                <input type="email" name="email" placeholder="Enter email address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-item input-item-phone ltn__custom-icon">
                                <input type="text" name="phone" number placeholder="Enter your phone number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-item input-item-map ltn__custom-icon">
                                <input type="text" name="address" number placeholder="Enter your address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-item input-item-date ltn__custom-icon">
                                <input type="text" name="dob" id="datepicker" placeholder="Date of birth">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-item">
                                <select class="nice-select" name="qualification">
                                    <option>Select Qualification</option>
                                    <option value="SSCE">SSCE</option>
                                    <option value="OND">OND </option>
                                    <option value="HND">HND </option>
                                    <option value="B.Sc">B.Sc</option>
                                    <option value="Doctorate Degree">Doctorate Degree</option>
                                    <option value="Masters">Masters</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-item">
                                <select class="nice-select" name="experience">
                                    <option>Select Experience</option>
                                    <option value="< 1 Year">< 1 Year</option>
                                    <option value="1 Year">1 Year </option>
                                    <option value="2 Years">2 Years </option>
                                    <option value="3 Years">3 Years</option>
                                    <option value="4 Years">4 Years</option>
                                    <option value="+5 Years">+5 Years</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Upload your CV <b>(5mb max size)</b></label>
                            <div class="input-item input-item-file ltn__custom-icon">
                                <input type="file" name="cv" accept=".pdf" />
                            </div>
                        </div>
                    </div>
                    <div class="input-item input-item-textarea ltn__custom-icon">
                        <textarea name="cover_letter" placeholder="Type a cover letter"></textarea>
                    </div>
                    <!-- <p><label class="input-info-save mb-0"><input type="checkbox" name="agree"> Save my name, email, and website in this browser for the next time I comment.</label></p> -->
                    <div class="btn-wrapper mt-0">
                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" id="submit" type="submit">Submit</button>
                    </div>

                    <?php echo form_close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- AFFILIATE MESSAGE AREA END -->