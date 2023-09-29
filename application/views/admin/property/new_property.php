<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>

<div class="new-item">
	<a class="btn btn-default btn-sm button-adjust" href="<?php echo base_url('properties'); ?>"><i class="fa fa-calendar"></i> All Properties</a>
</div>



<?php

echo form_open_multipart('properties/add_property'); ?>

<div class="row">

	<div class="col-md-6 col-sm-12 col-xs-12">

		<div class="form-group">
			<label class="form-control-label">Title</label>
			<input type="text" name="title" class="form-control" value="<?php echo set_value('title'); ?>" required />
		</div>

		<div class="form-group">
			<label class="form-control-label">Description</label>
			<textarea id="email_message" name="description" class="form-control t200" required><?php echo set_value('description'); ?></textarea>
		</div>

        <div class="form-group">
            <label class="form-control-label">Price*</label>
            <br />
            <input type="number" name="price" class="form-control" value="<?php echo set_value('price'); ?>" required/>
            <div class="form-error"><?php echo form_error('price'); ?></div>
        </div>

        <div class="form-group">
            <label class="form-control-label">State*</label>
            <br />
            <select class="form-control" name="state" required>
                <option value="<?php echo set_value('state'); ?>"><?php echo set_value('state'); ?></option>
                <?php
                $states = nigerian_states();
                foreach ($states as $state) { ?>
                    <option value="<?php echo $state; ?>"> <?php echo $state; ?> </option>
                <?php }
                ?>
            </select>
            <div class="form-error"><?php echo form_error('state'); ?></div>
        </div>

        <div class="form-group">
            <label class="form-control-label">LGA*</label>
            <br />
            <select class="form-control" name="lga" required>
                <option value="<?php echo set_value('lga'); ?>"> <?php echo set_value('lga'); ?> </option>
                <option value="idu"> Idu </option>
                <option value="kurudu"> Kurudu </option>
                <option value="lugbe"> Lugbe </option>
            </select>
            <div class="form-error"><?php echo form_error('lga'); ?></div>
        </div>

        <div class="form-group">
            <label class="form-control-label">Address*</label>
            <br />
            <input type="text" name="address" class="form-control" value="<?php echo set_value('address'); ?>" required />
            <div class="form-error"><?php echo form_error('address'); ?></div>
        </div>

        <div class="form-group">
            <label class="form-control-label">Amenities</label>
            <br/>
            <select class="form-control selectpicker" name="amenities[]" multiple required>
                <option value="<?php echo set_value('amenities'); ?>"><?php echo set_value('amenities'); ?></option>
                <option value="ac"> Air Conditioning </option>
                <option value="gym"> Gym </option>
                <option value="pool"> Swimming Pool </option>
                <option value="wifi"> Wifi </option>
                <option value="Basketball"> Basketball Court </option>
                <option value="Barbeque"> Barbeque </option>
                <option value="Recreation"> Recreation </option>
                <option value="Security"> Security</option>
                <option value="Microwave"> Microwave </option>
            </select>
            <div class="form-error"><?php echo form_error('amenities'); ?></div>
        </div>

        <div class="form-group">
            <label class="form-control-label">Video</label><br />
			<small>Please make sure the link has "<b>embed</b>" in it.</small>
            <br />
            <input type="text" name="video" class="form-control" value="<?php echo set_value('video'); ?>" placeholder="https://www.youtube.com/embed/eWUxqVFBq74" />
            <div class="form-error"><?php echo form_error('video'); ?></div>
        </div>

	</div><!--/.col-md-6-->

	<div class="col-md-5 col-md-offset-1 col-sm-12 col-xs-12">

		<div class="form-group">
			<label class="form-control-label">Upload Featured Image </label><br />
			<small>The first image selected would be the main image on display.</small>
            <br />
			<small>Only JPG and PNG files allowed (max 5MB).</small>
			<input type="file" name="featured_image[]" multiple class="form-control" accept=".jpeg,.jpg,.png" required />
			<div class="form-error"><?php echo $error_list; ?></div>
		</div>

        <div class="form-group">
			<label class="form-control-label">Floor Plans </label><br />
			<small>Only JPG and PNG files allowed (max 5MB).</small>
			<input type="file" name="floor_plans[]" multiple class="form-control" accept=".jpeg,.jpg,.png" required />
			<div class="form-error"><?php echo $error_list; ?></div>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary m-t-5" id="submit">Add Property</button>
		</div>

	</div><!--/.col-md-5-->

</div><!--/.row-->

<?php echo form_close(); ?>