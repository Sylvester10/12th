<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>

<div class="new-item">
	<a class="btn btn-default btn-sm button-adjust" href="<?php echo base_url('locations'); ?>"><i class="fa fa-map-pin"></i> All Locations</a>
</div>



<?php
echo form_open('locations/add_location'); ?>

<div class="row">

	<div class="col-md-7 col-sm-12 col-xs-12">

		<div class="form-group">
			<label class="form-control-label">Location</label>
			<input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" required />
		</div>

		<div class="form-group">
			<label class="form-control-label">Location Info</label>
			<textarea id="email_message" name="about" class="form-control t200" required><?php echo set_value('about'); ?></textarea>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary m-t-5" id="submit">Add Location</button>
		</div>

	</div><!--/.col-md-7-->

</div><!--/.row-->

<?php echo form_close(); ?>