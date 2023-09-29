
<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>


	<div class="row m-b-50">
	
		<div class="animated flipInY col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<div class="tile-stats custom-bg-blue">
				<div class="icon"><i class="fa fa-building"></i></div>
				<div class="count"><?php echo $total_properties; ?></div>
				<h3 class="stats-title">Properties</h3>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<div class="tile-stats custom-bg-blue">
				<div class="icon"><i class="fa fa-map-pin"></i></div>
				<div class="count"><?php echo $total_locations; ?></div>
				<h3 class="stats-title">Locations</h3>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<div class="tile-stats custom-bg-blue">
				<div class="icon"><i class="fa fa-users"></i></div>
				<div class="count"><?php echo $total_staff; ?></div>
				<h3 class="stats-title">Staff</h3>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<div class="tile-stats custom-bg-blue">
				<div class="icon"><i class="fa fa-envelope"></i></div>
				<div class="count"><?php echo $total_newsletter; ?></div>
				<h3 class="stats-title">Newsletter Subscriptions</h3>
			</div>
		</div>
		
	</div>

	
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#quick_email" data-toggle="tab">Quick Mail</a></li>
			</ul>
		</div>
		<div class="panel-body">
			<div class="tab-content">
				
				<div class="tab-pane active" id="quick_email">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

							<?php 
							echo form_open('message/send_email'); ?>
							
								<h3 class="m-b-30 text-bold">Quick Mail</h3>	
								<div class="form-group">
									<label class="form-control-label">Email</label>
									<input type="email" name="email" class="form-control" required />
								</div>
								<div class="form-group">
									<label class="form-control-label">Subject</label>
									<input type="text" name="subject" class="form-control"  required />
								</div>
								<div class="form-group">
									<label class="form-control-label">Message</label>
									<textarea id="email_message" name="message" class="form-control t100" required></textarea>
								</div>
								
								<div id="q_status_msg"></div>
								
								<div class="form-group">       
									<input type="submit" value="Send Mail" class="btn btn-lg btn-primary">
								</div>

							<?php echo form_close(); ?>

						</div>

					</div>
				</div>			
				
			</div>
		</div>
	</div>