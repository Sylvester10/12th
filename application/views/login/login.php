<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="img/bg/14.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Admin Portal</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>" target="_blank"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- LOGIN AREA START -->
<div class="ltn__login-area pb-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="account-login-inner">

                    <?php
                    $form_attributes = array("id" => "admin_login_form");
                    echo form_open('login/login_ajax', $form_attributes);

                    if ($this->session->is_requested) { ?>
                        <input type="hidden" id="requested_page" value="<?php echo $this->session->requested_page; ?>" />
                    <?php } else { ?>
                        <input type="hidden" id="requested_page" value="<?php echo base_url('admin'); ?>" />
                    <?php } ?>

                    <div action="#" class="ltn__form-box contact-form-box">
                        <input type="text" name="email" placeholder="Email*">
                        <input type="password" name="password" placeholder="Password*">


                        <div class="btn-wrapper mt-0">
                            <button class="theme-btn-1 btn btn-block" type="submit">SIGN IN</button>
                        </div>

                        <div class="form-messege mt-20" id="status_msg"></div>
                    </div>

                    <?php echo form_close(); ?>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="account-create text-center pt-50">
                    <h4>LOGIN YOUR ADMIN ACCOUNT</h4>
                    <p>Here you can manage the content that is displayed on your website.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- LOGIN AREA END -->