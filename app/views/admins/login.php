<?php include_once APPROOT . '/views/inc/header.php' ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <?php flash('register_success'); ?>
            <h2>Admin login </h2> <span class="text-muted" id="small_words">Or as a <a href="<?php echo URLROOT; ?>/managers/login">manager</a></span>
            <p>Please fill in your credentials to log in</p>
            <form action="<?php echo URLROOT; ?>/admins/login" method="post">
                <div class="form-group">
                    <label for="username">Username: <sup>*</sup></label>
                    <input type="username" name="username" maxlength="50" onkeypress="return validate_alphabets(event)" class="form-control form-control-lg <?php echo (empty($data['username_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['username']; ?>">
                    <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?php echo (empty($data['password_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/managers/register" class="btn btn-light btn-block">No account? Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once APPROOT . '/views/inc/footer.php' ?>