<?php include_once APPROOT . '/views/inc/header.php' ?>
<div class="row">
    <div class="col-md-6 mx-auto col">
        <div class="card card-body bg-light mt-5">
            <?php flash('register_success'); ?>
            <h2>Registering managers</h2>
            <form action="<?php echo URLROOT; ?>/managers/register" method="post">
                <div class="form-group">
                    <label for="fName">First name: <sup>*</sup></label>
                    <input type="text" name="fName" maxlength="70" onkeypress="return validate_alphabets(event)" class="form-control form-control-lg"  >
                </div>
                <div class="form-group">
                    <label for="lName">Last name: <sup>*</sup></label>
                    <input type="text" name="lName" maxlength="70" class="form-control form-control-lg" onkeypress="return validate_alphabets(event)">
                </div>
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" maxlength="70" class="form-control form-control-lg <?php echo (empty($data['email_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="telephone">Telephone: <sup>*</sup></label>
                    <input type="text" name="telephone" maxlength="14" onkeypress="return validate_nnumbers(event)" class="form-control form-control-lg <?php echo (empty($data['telephone_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['telephone']; ?>">
                    <span class="invalid-feedback"><?php echo $data['telephone_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="telephone">Lodge: <sup>*</sup></label>
                    <input type="text" list="lodge" name="belongingLodge" class="form-control form-control-lg" onkeypress="return validate_alphabets(event)">
                    <datalist id="lodge">
                        <option value=" "/>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" maxlength="30" class="form-control form-control-lg <?php echo (empty($data['password_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                    <input type="password" name="confirm_password" maxlength="30" class="form-control form-control-lg <?php echo (empty($data['confirm_password_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['confirm_password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                </div>                
                <input type="submit" value="Register" class="btn btn-success btn-block">
            </form>
        </div>
    </div>
<?php include_once APPROOT . '/views/admins/menu_bar.php' ?>
    
</div>

<script type="text/javascript">
    window.onload= function()
    {
        var lodge= document.getElementById('lodge');
        var all_lodges= <?php echo json_encode($data['lodges']); ?>;
        var options= "";
        for (var i = 0; i < all_lodges.length; i++) 
        {
            options+= "<option value='" +all_lodges[i]+"'/>";
        }
        lodge.innerHTML= options;

    }

</script>
<?php include_once APPROOT . '/views/inc/footer.php' ?>
