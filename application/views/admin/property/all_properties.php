
<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>
<?php echo custom_validation_errors(); ?>

	<div class="new-item">
		<a class="btn btn-default btn-sm button-adjust" href="<?php echo base_url('properties/new_property'); ?>"><i class="fa fa-plus"></i> Add Property</a>
	</div>
	
	
	<?php 
	//select options bulk actions 
	$options_array = array(
		//'value' => 'Caption'
        'publish' => 'Publish',
        'unpublish' => 'Unpublish',
        'available' => 'Available',
        'sold' => 'Sold',
        'delete' => 'Delete'
	); 
	echo modal_bulk_actions('properties/bulk_actions_property', $options_array); ?>
	
		<div class="table-scroll">
			<table id="property_table" class="table table-bordered table-hover cell-text-middle" style="text-align: left">
				
				<input type="hidden" id="csrf_hash" value="<?php echo $this->security->get_csrf_hash(); ?>" />
				
				<thead>
					<tr>
						<th class="w-15-p"> <input type="checkbox" class="radio-box select_all" /> </th>
						<th> Actions </th>
                        <th class="min-w-200"> Title </th>
                        <th class="w-500"> Description </th>
                        <th class="min-w-300"> Price </th>
                        <th class="min-w-200"> State </th>
                        <th class="min-w-200"> LGA </th>
                        <th class="min-w-200"> Address </th>
                        <th class="min-w-200"> Amenities </th>
                        <th class="min-w-200"> YouTube </th>
                        <th class="min-w-200"> Availability </th>
                        <th class="min-w-200"> Published </th>
                        <th class="min-w-300"> Date </th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	
<?php echo form_close(); ?>