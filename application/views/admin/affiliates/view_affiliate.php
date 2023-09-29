
<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>
<?php echo custom_validation_errors(); ?>

<div class="new-item">
	<a class="btn btn-default btn-sm button-adjust" href="<?php echo base_url('affiliates'); ?>"> Back </a>
</div>


<div class="row">

	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<h3 class="text-bold"><i class="fa fa-user f-s-30"></i> Contact Information</h3>
		<p><b>Date of Birth:</b> <?php echo $y->dob; ?></p>
		<p><b>Phone:</b> <?php echo $y->phone; ?></p>
		<p><b>Email:</b> <?php echo $y->email; ?></p>
		<p><b>Address:</b> <?php echo $y->address; ?></p>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 profile_details">
		<h3 class="text-bold"><i class="fa fa-briefcase f-s-30"></i> Professional Information</h3>
		<p><b>Educational Qualification: </b> <?php echo $y->qualification; ?></p>
		<p><b>Experience: </b> <?php echo $y->experience; ?></p>
		<a class="btn btn-default btn-sm button-adjust" href="<?php echo base_url('assets/uploads/cv_files/'. $y->cv); ?>" target="_blank"> View CV </a>
	</div>

</div>

<div class="row" style="margin-top: 50px;">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3 class="text-bold"><i class="fa fa-pen f-s-30"></i> Cover Letter</h3>
		<p><?php echo $y->cover_letter; ?></p>
	</div>
</div>