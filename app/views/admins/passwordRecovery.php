<?php include_once APPROOT . '/views/inc/header.php' ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <?php flash('register_success'); ?>
            <h2>Admin Forgot password </h2> <span class="text-muted" id="small_words">Or <a href="<?php echo URLROOT; ?>/users/adminlogin">Login</a></span>
            <p>Please fill in the telephone for a password recovery message</p>
            <form action="<?php echo URLROOT; ?>/users/adminforgotPassword" method="post">
                <div class="form-group">
                    <label for="telephone">Telephone: <sup>*</sup></label>
                    <input type="text" name="telephone" maxlength="50" onkeypress="return validate_numbers(event)" maxlength="10" class="form-control form-control-lg <?php echo (empty($data['telephone_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['telephone']; ?>">
                    <span class="invalid-feedback"><?php echo $data['telephone_err']; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Change" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/users/adminforgotPassword" class="btn btn-light btn-block">Forgot password? </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once APPROOT . '/views/inc/footer.php' ?>
