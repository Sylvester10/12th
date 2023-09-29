
<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>
<?php echo custom_validation_errors(); ?>

	<?php require "application/views/admin/testimonials/modal/new_testimony.php";  ?>

	<div class="new-item">
		<a class="btn btn-default btn-sm button-adjust" data-toggle="modal" data-target="#new_testimony"><i class="fa fa-plus"></i> New Testimony</a>
	</div>


	<div class="m-b-30">
		<p><i class="fa fa-th-large"></i> All: <?php echo number_format($total_records); ?></p>
	</div>

		
	<table id="table" class="table table-bordered table-hover cell-text-middle" style="text-align: left">
		
		<thead>
			<tr>
				<th> Actions </th>
				<th class="min-w-150"> Name </th>
				<th> Testimony </th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>

			<?php
			foreach ($testimony as $t) {  ?>

				<tr>
					<?php require "application/views/admin/testimonials/modal/option.php";  ?>	
					<td class="w-15-p text-center"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#options<?php echo $t->id; ?>"><i class="fa fa-navicon"></i></button></td>
					<td><?php echo $t->name; ?></td>
					<td><?php echo $t->testimony; ?></td>
					<?php 
						if ($t->published != 'true') { ?>
							<td class="unpub">Unpublished</td>
						<?php } else { ?>
							<td class="pub">Published</td>
						<?php } ?>
				</tr>

			<?php } ?>

		</tbody>
	</table>