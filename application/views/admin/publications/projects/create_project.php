<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>

<div class="new-item">
	<a class="btn btn-default btn-sm button-adjust" href="<?php echo base_url('projects'); ?>"><i class="fa fa-cubes"></i> All Projects</a>
</div>



<?php
echo form_open_multipart('projects/add_project'); ?>

<div class="row">

	<div class="col-md-7 col-sm-12 col-xs-12">

		<div class="form-group">
			<label class="form-control-label">Project Title</label>
			<input type="text" name="title" class="form-control" value="<?php echo set_value('title'); ?>" required />
		</div>

		<div class="form-group">
			<label class="form-control-label">Project Location</label>
			<input type="text" name="location" class="form-control" value="<?php echo set_value('location', 'Apo Bridge'); ?>" required />
		</div>

		<div class="form-group">
			<label class="form-control-label">Project Description</label>
			<textarea id="email_message" name="description" class="form-control t200" required><?php echo set_value('description'); ?></textarea>
		</div>

	</div><!--/.col-md-7-->

	<div class="col-md-4 col-md-offset-1 col-sm-12 col-xs-12">

		<div class="form-group">
			<label class="form-control-label">Upload Brochure file </label><br />
			<small>Only pdf files allowed (max 5MB).</small>
			<input type="file" name="brochure_file" class="form-control" accept=".pdf" />
			<div class="form-error"><?php echo $error; ?></div>
		</div>

		<div class="form-group">
			<label class="form-control-label">Upload Featured Image </label><br />
			<small>Only JPG and PNG files allowed (max 4MB).</small>
			<input type="file" name="featured_image" id="the_image" class="form-control" accept=".jpeg,.jpg,.png" />
			<div class="form-error"><?php echo $error; ?></div>
		</div>

		<!-- Image preview-->
		<?php echo generate_image_preview(); ?>

		<div class="form-group">
			<button type="submit" class="btn btn-primary m-t-5" id="submit">Add Project</button>
		</div>

	</div><!--/.col-md-6-->

</div><!--/.row-->

<?php echo form_close(); ?>