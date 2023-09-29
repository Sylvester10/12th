
<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>
<?php echo custom_validation_errors(); ?>
	
	
	<?php 
	//select options bulk actions 
	$options_array = array(
		//'value' => 'Caption'
        'delete' => 'Delete'
	); 
	echo modal_bulk_actions('affiliates/bulk_actions_affiliates', $options_array); ?>
	
		<div class="table-scroll">
			<table id="affiliates_table" class="table table-bordered table-hover cell-text-middle" style="text-align: left">
				
				<input type="hidden" id="csrf_hash" value="<?php echo $this->security->get_csrf_hash(); ?>" />
				
				<thead>
					<tr>
						<th class="w-15-p"> <input type="checkbox" class="radio-box select_all" /> </th>
						<th> Actions </th>
                        <th class="min-w-200"> Name </th>
                        <th class="w-500"> Email </th>
                        <th class="min-w-300"> Phone </th>
                        <th class="min-w-200"> Address </th>
                        <th class="min-w-300"> Date </th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	
	<?php echo form_close(); ?>