<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>

<div class="new-item">
	<a class="btn btn-default btn-sm button-adjust" href="<?php echo base_url('projects'); ?>"><i class="fa fa-cubes"></i> All Projects</a>
</div>


<?php
echo form_open_multipart('projects/edit_project_ajax/' . $y->id);

?>

<div class="row">

	<div class="col-md-6 col-sm-12 col-xs-12">

		<input type="hidden" id="project_id" value="<?php echo $y->id; ?>" />

		<div class="form-group">
			<label class="form-control-label">Project Title</label>
			<input type="text" name="title" class="form-control" value="<?php echo set_value('title', $y->title); ?>" />
		</div>

		<div class="form-group">
			<label class="form-control-label">Project Location</label>
			<input type="text" name="location" class="form-control" value="<?php echo set_value('location', $y->location); ?>" />
		</div>

		<div class="form-group">
			<label class="form-control-label">Project Description</label>
			<textarea id="email_message" name="description" class="form-control t200" ><?php echo set_value('description', $y->description); ?></textarea>
		</div>

	</div><!--/.col-md-7-->

	<div class="col-md-4 col-md-offset-1 col-sm-12 col-xs-12">

		<div class="form-group">
			<label class="form-control-label">Update Brochure file <b>(<?=$y->brochure_file?>)</b> </label><br />
			<small>Only pdf files allowed (max 5MB).</small>
			<input type="file" name="brochure_file" class="form-control" accept=".pdf" />
			<div class="form-error"><?php echo $error; ?></div>
		</div>

		<div class="form-group">
			<label class="form-control-label">Featured Image </label><br />

			<div class="file_area">
				<small>Only JPG and PNG files allowed (max 4MB).</small>
				<input type="file" name="featured_image" id="the_image_on_update" class="form-control" accept=".jpeg,.jpg,.png" />
			</div>
			
			<div id="current_image_area" class="m-b-10">
				<img id="current_image" src="<?php echo base_url('assets/uploads/projects/' . $y->featured_image_thumb); ?>" />
			</div>
			<label class="form-control-label" id="change_image_text">Change image?</label> <br />
		</div>

		<!-- Image preview-->
		<?php echo generate_image_preview(); ?>

		<div class="form-group">
			<button type="submit" class="btn btn-primary m-t-5" id="submit">Update Project</button>
		</div>

	</div><!--/.col-md-4-->

</div><!--/.row-->


<?php echo form_close(); ?>