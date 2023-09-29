
<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>
<?php echo custom_validation_errors(); ?>

	<div class="new-item">
		<a class="btn btn-default btn-sm button-adjust" href="<?php echo base_url('projects/create_project'); ?>"><i class="fa fa-plus"></i> Add Project</a>
	</div>
	
	
	<?php 
	//select options bulk actions 
	$options_array = array(
		//'value' => 'Caption'
		'publish' => 'Publish',
		'unpublish' => 'Unpublish',
		'delete' => 'Delete'
	); 
	echo modal_bulk_actions('projects/bulk_actions_projects', $options_array); ?>
	
		<div class="table-scroll">
			<table id="projects_table" class="table table-bordered table-hover cell-text-middle" style="text-align: left">
				
				<input type="hidden" id="csrf_hash" value="<?php echo $this->security->get_csrf_hash(); ?>" />
				
				<thead>
					<tr>
						<th class="w-15-p"> <input type="checkbox" class="radio-box select_all" /> </th>
						<th> Actions </th>
						<th class=""> Photo </th>
						<th class="min-w-200"> Project Title </th>
						<th class="min-w-200"> Project Location </th>
						<th class="w-200"> Description </th>
						<th class="min-w-150"> Brochure </th>					
						<th class="min-w-150"> Published </th>
						<th class=""> Date Added </th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	
<?php echo form_close(); ?>