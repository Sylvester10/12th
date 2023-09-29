<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>

<div class="new-item">
	<a class="btn btn-default btn-sm button-adjust" href="<?php echo base_url('events/events_list'); ?>"><i class="fa fa-calendar"></i> All Events</a>
</div>



<?php
echo form_open_multipart('events/create_event_ajax'); ?>

<div class="row">

	<div class="col-md-7 col-sm-12 col-xs-12">

		<div class="form-group">
			<label class="form-control-label">Event Venue</label>
			<input type="text" name="venue" class="form-control" value="<?php echo set_value('venue', 'School Premises'); ?>" required />
		</div>

		<div class="form-group">
			<label class="form-control-label">Event Caption</label>
			<input type="text" name="caption" class="form-control" value="<?php echo set_value('caption'); ?>" required />
		</div>

		<div class="form-group">
			<label class="form-control-label">Event Description</label>
			<p>Note: To add more images to post body, click on the <i class="fa fa-image"></i> icon and insert the image link into the <b>Source</b> field and click <b>Ok</b>.</p> 
			<textarea id="email_message" name="description" class="form-control t200" required><?php echo set_value('description'); ?></textarea>
		</div>

	</div><!--/.col-md-7-->

	<div class="col-md-4 col-md-offset-1 col-sm-12 col-xs-12">

		<div class="form-group">
			<label class="form-control-label">Upload Featured Image </label><br />
			<small>Only JPG and PNG files allowed (max 4MB).</small>
			<input type="file" name="featured_image" id="the_image" class="form-control" accept=".jpeg,.jpg,.png" required />
			<div class="form-error"><?php echo $error; ?></div>
		</div>

		<!-- Image preview-->
		<?php echo generate_image_preview(); ?>

		<div class="form-group">
			<button type="submit" class="btn btn-primary m-t-5" id="submit">Add Event</button>
		</div>

	</div><!--/.col-md-6-->

</div><!--/.row-->

<?php echo form_close(); ?>