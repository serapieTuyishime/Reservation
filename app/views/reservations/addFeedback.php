<?php include_once APPROOT . '/views/inc/header.php' ?>

<div class="row">
	<div class="col-md-6 mx-auto">
    <label class="btn btn-light" onclick="goBack()"><i class="fa fa-backward"></i>Back</label>
        
        <div class="card card-body bg-light mt-5">
        	<?php flash('register_success'); ?>
        	<h2>Post a feedback</h2>
        	<form method="post" action="<?php echo URLROOT ?>/reservations/postFeedback">
        		<div class="form-group">
                    <label for="reservation_id">Reservation code: <sup>*</sup></label>
                    <input type="hidden" name="reservation_id_hidden" value="<?php echo isset($data['reservation_id_db'])?$data['reservation_id_db']:''; ?>">
                    <input type="text" onkeypress="return validate_nnumbers(event)" name="reservation_id" class="form-control form-control-lg <?php echo (empty($data['code_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['reservation_id']; ?>">
                    <span class="invalid-feedback"><?php echo $data['code_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="room">Feedback <sup>*</sup></label>
                    <input type="text" name="feedback" onkeypress="return validate_alphabets_with_symbols(event)" class="form-control form-control-lg" value="<?php echo $data['feedback']; ?>" >
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Finish" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <label onclick="goBack()" class="btn btn-light btn-block">Back</label>
                    </div>
                </div>
        	</form>
    	</div>
    </div>
</div>
<?php include_once APPROOT . '/views/inc/footer.php' ?>
