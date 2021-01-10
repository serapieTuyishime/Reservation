<?php include_once APPROOT . '/views/inc/header.php' ?>
<div class="row">
	<div class="col-md-6 mx-auto col">
        <div class="card card-body bg-light mt-5">
        	<?php flash('register_success'); ?>
        	<h2>New Admin</h2>
        	<form method="post" action="<?php echo URLROOT; ?>/admins/register" onsubmit="return checkEmail()">
        		<div class="form-group">
                    <label for="telephone">Telephone: <sup>*</sup></label>
                    <input type="text" name="telephone" maxlength="14" onkeypress="return validate_nnumbers(event)" class="form-control form-control-lg <?php echo (empty($data['telephone_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['telephone']; ?>">
                    <span class="invalid-feedback"><?php echo $data['telephone_err']; ?></span>
                </div>
        		<div class="form-group">
                    <label for="username">Username: <sup>*</sup></label>
                    <input type="text" name="username" maxlength="50" onkeypress="return validate_alphabets(event)" class="form-control form-control-lg <?php echo (empty($data['username_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['username']; ?>">
                    <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password <sup>*</sup></label>
                    <input type="password" name="password" id="passOne" class="form-control form-control-lg <?php echo (empty($data['password_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password_two">Password <i>Confirm</i> <sup>*</sup></label>
                    <input type="password" name="password_two" id="passTwo" class="form-control form-control-lg" >
                </div>
                <input type="submit" value="Register" class="btn btn-success btn-block">
        	</form>
        </div>
<?php include_once APPROOT . '/views/admins/menu_bar.php' ?>

    </div>

<?php include_once APPROOT . '/views/inc/footer.php' ?>