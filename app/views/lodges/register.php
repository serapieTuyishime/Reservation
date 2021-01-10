<?php include_once APPROOT . '/views/inc/header.php' ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
        	<?php flash('register_success'); ?>
            <h2>Registering Lodges</h2>
            <form action="<?php echo URLROOT; ?>/lodges/register" method="post" enctype="multipart/form-data">
            	<div class="form-group">
                    <label for="name">Lodge name: <sup>*</sup></label>
                    <input type="text" name="name" onkeypress="return validate_alphabets(event)" class="form-control form-control-lg <?php echo (empty($data['name_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['name']; ?>">
                    <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="name">Image: <sup>*</sup></label>
                    <input type="file" name="imagefile" class="form-control form-control-lg <?php echo (empty($data['image_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['imagefile']; ?>">
                    <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg <?php echo (empty($data['email_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="telephone">Telephone: <sup>*</sup></label>
                    <input type="telephone" name="telephone" maxlength="14" onkeypress="return validate_nnumbers(event)" class="form-control form-control-lg <?php echo (empty($data['telephone_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['telephone']; ?>">
                    <span class="invalid-feedback"><?php echo $data['telephone_err']; ?></span>
                </div>
                <div class="form-group row">
                	<div class="col">
                		<label for="country">Country</label>
            			<select class="form-control form-control-lg" name="country">
            				<option value="">--Select</option>
            				<option value="rwanda">Rwanda</option>
            			</select>
                	</div>
                	<div class="col">
                		<label for="province">Province</label>
            			<select name="province" class="form-control form-control-lg">
            				<option value="">--Select</option>
            			</select>
                	</div>
                </div>
                <div class="form-group row">
                	<div class="col">
                		<label for="district">District</label>
            			<select name="district" class="form-control form-control-lg">
            				<option value="">--Select</option>
            			</select>
                	</div>
                	<div class="col">
                		<label for="sector">Sector</label>
            			<select name="sector" class="form-control form-control-lg">
            				<option value="">--Select</option>
            			</select>
                	</div>
                </div>
                <div class="form-group">
                    <label for="specification">Specification: <sup>*</sup></label>
                    <input type="text" name="specification" class="form-control form-control-lg">
                </div>
                <input type="submit" value="Register" class="btn btn-success btn-block">
            </form>
        </div>
    </div>
<?php include_once APPROOT . '/views/admins/menu_bar.php' ?>

</div>
<?php include_once APPROOT . '/views/inc/footer.php' ?>
