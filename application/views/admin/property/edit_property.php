<?php echo flash_message_success('status_msg'); ?>
<?php echo flash_message_danger('status_msg_error'); ?>

<div class="new-item">
	<a class="btn btn-default btn-sm button-adjust" href="<?php echo base_url('properties'); ?>"><i class="fa fa-home"></i> All Properties</a>
    <a class="btn btn-default btn-sm button-adjust" href="<?php echo base_url('properties/new_property'); ?>"><i class="fa fa-plus"></i> Add Property</a>
</div>



<?php

echo form_open_multipart('properties/edit_property_details/'.$y->id); ?>

<div class="row">

	<div class="col-md-6 col-sm-12 col-xs-12">

		<div class="form-group">
			<label class="form-control-label">Title</label>
			<input type="text" name="title" class="form-control" value="<?php echo set_value('title', $y->title); ?>"  />
		</div>

		<div class="form-group">
			<label class="form-control-label">Description</label>
			<textarea id="email_message" name="description" class="form-control t200" ><?php echo set_value('description', $y->description); ?></textarea>
		</div>

        <div class="form-group">
            <label class="form-control-label">Price*</label>
            <br />
            <input type="number" name="price" class="form-control" value="<?php echo set_value('price', $y->price); ?>" />
            <div class="form-error"><?php echo form_error('price'); ?></div>
        </div>

        <div class="form-group">
            <label class="form-control-label">State*</label>
            <br />
            <select class="form-control" name="state" >
                <option value="<?php echo $y->state; ?>"><?php echo $y->state; ?></option>
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
            <select class="form-control" name="lga" >
                <option value="<?php echo $y->lga; ?>"> <?php echo $y->lga; ?> </option>
                <option value="idu"> Idu </option>
                <option value="kurudu"> Kurudu </option>
                <option value="lugbe"> Lugbe </option>
            </select>
            <div class="form-error"><?php echo form_error('lga'); ?></div>
        </div>

        <div class="form-group">
            <label class="form-control-label">Address*</label>
            <br />
            <input type="text" name="address" class="form-control" value="<?php echo set_value('address', $y->address); ?>"  />
            <div class="form-error"><?php echo form_error('address'); ?></div>
        </div>

        <div class="form-group">
            <label class="form-control-label">Amenities</label>
            <br/>
            <select class="form-control selectpicker" name="amenities[]" multiple>
                <option selected value="<?php echo set_value('amenities', $y->amenities); ?>"><?php echo $y->amenities; ?></option>
                <option value="ac"> Air Conditioning </option>
                <option value="gym"> Gym </option>
                <option value="pool"> Swimming Pool </option>
                <option value="wifi"> Wifi </option>
                <option value="Basketball"> Basketball Court </option>
                <option value="Barbeque"> Barbeque </option>
                <option value="Recreation"> Recreation </option>
                <option value="Security"> Security </option>
                <option value="Microwave"> Microwave </option>
            </select>
            <div class="form-error"><?php echo form_error('amenities'); ?></div>
        </div>

        <div class="form-group">
            <label class="form-control-label">Video</label><br />
			<small>Please make sure the link has "<b>embed</b>" in it.</small>
            <br />
            <input type="text" name="video" class="form-control" value="<?php echo set_value('video', $y->video); ?>"  />
            <div class="form-error"><?php echo form_error('video'); ?></div>
        </div>

	</div><!--/.col-md-6-->

	<div class="col-md-5 col-md-offset-1 col-sm-12 col-xs-12">

        <div class="form-group">
			<label class="form-control-label">Upload Featured Image </label><br />
			<small>The first image selected would be the main image on display.</small>
            <br />
			<small>Only JPG and PNG files allowed (max 5MB).</small>
			<input type="file" name="featured_image[]" multiple class="form-control" accept=".jpeg,.jpg,.png"  />
			<div class="form-error"></div>
		</div>

        <div class="form-group">
			<label class="form-control-label">Floor Plans </label><br />
			<small>Only JPG and PNG files allowed (max 5MB).</small>
			<input type="file" name="floor_plans[]" multiple class="form-control" accept=".jpeg,.jpg,.png"  />
			<div class="form-error"></div>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary m-t-5">Update Property</button>
		</div>

	</div><!--/.col-md-5-->

</div><!--/.row-->

<?php echo form_close(); ?>