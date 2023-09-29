
	


<!--Class Options-->
	<div class="modal fade" id="options<?php echo $t->id; ?>" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal-width">
				<div class="modal-header">
					<div class="pull-right">
						<button class="btn btn-danger btn-sm modal_close_btn" data-dismiss="modal" class="close" title="Close"> &times;</button>
					</div>
					<h4 class="modal-title">Actions</h4>
				</div><!--/.modal-header-->
				<div class="modal-body">
										
					<p><a type="button" class="btn btn-default btn-sm btn-block action-btn" data-toggle="modal" data-target="#edit_testimonial<?php echo $t->id; ?>"> <i class="fa fa-pencil" style="color: green"></i> &nbsp; Edit Testimony </a></p>

					<?php 

						if ($t->published == 'true') { ?>

							<p><a type="button" href="<?php echo base_url('testimonial/unpublish_testimonial/'.$t->id); ?>" class="btn btn-default btn-sm btn-block action-btn"><i class="fa fa-times" style="color: red"></i> &nbsp; Unpublish Testimony </a></p>

							
						<?php } else { ?>

							<p class="pub"><a type="button" href="<?php echo base_url('testimonial/publish_testimonial/'.$t->id); ?>" class="btn btn-default btn-sm btn-block action-btn"><i class="fa fa-check" style="color: green"></i> &nbsp; Publish Testimony </a></p>

					<?php } ?>
					
					<p><a type="button" href="#" class="btn btn-default btn-sm btn-block action-btn" data-toggle="modal" data-target="#delete_testimonial<?php echo $t->id; ?>"> <i class="fa fa-trash" style="color: red"></i> &nbsp; Delete Testimony </a></p>


					
				</div>
			</div>
		</div>
	</div>
	
<?php require "application/views/admin/testimonials/modal/edit_testimonial.php";  ?>
<?php require "application/views/admin/testimonials/modal/delete_testimonial.php";  ?>
