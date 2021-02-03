<?php include_once APPROOT . '/views/inc/header.php' ?>
<div class="row">
	<div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
        	<?php flash('register_success'); ?>
        	<h2>Register new Room</h2>
        	<form action="<?php echo URLROOT; ?>/rooms/register" method="post" enctype="multipart/form-data">
        		<div class="row">
                    <div class="form-group col">
                          <label for="name">Room name: <sup>*</sup></label>
                          <input type="text" name="name"  onkeypress="return validate_alphabets(event)" class="form-control form-control-lg <?php echo (empty($data['name_err'])) ? '':'is-invalid'; ?>"
                              value="<?php echo $data['name']; ?>">
                          <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                      </div>
                      <div class="form-group col">
                          <label for="category">Category: <sup>*</sup></label>
                          <select name="category" class="form-control form-control-lg">
                            <option value="suite"> Suite</option>
                            <option value="premium"> Premium</option>
                            <option value="standard"> Standard</option>
                          </select>
                      </div>      
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="price">Price: <sup>*</sup></label>
                        <input type="text"  onkeypress="return validate_floats(event)" name="price" class="form-control form-control-lg" >
                    </div>
                    <div class="form-group col">
                        <label for="specification">Specifications: <sup>*</sup></label>
                        <input type="text" name="specification" class="form-control form-control-lg" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="specification">Image: <sup>*</sup></label>
                    <input type="file" name="imagefile" class="form-control-lg <?php echo (empty($data['image_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['imageName']; ?>">
                    <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="comments">Extra comments <sup>*</sup></label>
                    <input type="text" name="comments" onkeypress="return validate_alphabets_with_symbols(event)" class="form-control form-control-lg" >
                </div>
                <input type="submit" value="Register" name=""  class="btn btn-success btn-block">
        	</form>
        </div>
    </div>
<?php include_once APPROOT . '/views/managers/menu_bar.php' ?>
    
</div>
<?php include_once APPROOT . '/views/inc/footer.php' ?>
