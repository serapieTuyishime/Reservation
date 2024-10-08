<?php include_once APPROOT . '/views/inc/header.php' ?>
<br><br><br>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-white mt-5">
            <?php flash('register_success'); ?>
             <h2>Manager login </h2> <span class="text-muted" id="small_words">Or as an <a href="<?php echo URLROOT; ?>/users/adminLogin">admin</a></span>
            <p>Please fill in your credentials to log in</p>
            <form action="<?php echo URLROOT; ?>/users/managerlogin" method="post">
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg <?php echo (empty($data['email_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?php echo (empty($data['password_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-success btn-block form-control">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/users/managerForgotPassword" class="btn btn-light btn-block">Forgot password? </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once APPROOT . '/views/inc/footer.php' ?>
