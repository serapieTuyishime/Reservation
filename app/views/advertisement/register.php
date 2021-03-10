<?php include_once APPROOT . '/views/inc/header.php' ?>
<?php 
$today= date('Y-m-d');
$tomorrow= date('Y-m-d', strtotime('+1 day'));
?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <?php flash('register_success'); ?>
            <h2>Registering Adverisements</h2>
            <form action="<?php echo URLROOT; ?>/ads/register" method="post" enctype="multipart/form-data">
            	<div class="form-group">
                    <label for="advertiser">Advertiser Name: <sup>*</sup></label>
                    <input type="text" name="advertiser" onkeypress="return validate_alphabets(event)" class="form-control form-control-lg" >
                </div>
                <div class="form-group">
                    <label for="ad_link">Advertisement link: <sup>*</sup></label>
                    <input type="text" name="ad_link" class="form-control form-control-lg" >
                </div>
                <div class="form-group row">
                	<div class="col">
                		<label for="date_in">First date</label>
            			<input type="date" id="fromDate" name="date_in" min="<?php echo $today; ?>" class="form-control form-control-lg" >
                	</div>
                	<div class="col">
                		<label for="date_out">Last date</label>
                		<input type="date" id="toDate" name="date_out"min="<?php echo $tomorrow; ?>" class="form-control form-control-lg <?php echo (empty($data['date_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['date_out']; ?>">
                    <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>
                	</div>
                </div>
                <div class="form-group">
                    <label for="imagefile">Image: <sup>*</sup> </label>
                    <input type="file" required name="imagefile" class=" <?php echo (empty($data['image_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['imageName']; ?>">
                    <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
                </div>
                <input type="submit" value="Register" class="btn btn-success btn-block">
            </form>
        </div>
    </div>
<?php include_once APPROOT . '/views/admins/menu_bar.php' ?>

</div>
<?php include_once APPROOT . '/views/inc/footer.php' ?>
