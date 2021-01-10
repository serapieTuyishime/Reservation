<?php include_once APPROOT . '/views/inc/header.php' ?>

<div class="row">
	<div class="col-md-6 mx-auto">
    <label class="btn btn-light" onclick="goBack()"><i class="fa fa-backward"></i>Back</label>
        
        <div class="card card-body bg-light mt-5">
        	<?php flash('register_success'); ?>
        	<h2>Change a reservation</h2>
        	<form method="post" action="<?php echo URLROOT ?>/reservations/saveNewReservations">
        		<div class="form-group">
                    <label for="reservation_id">Reservation code: <sup>*</sup></label>
                    <input type="hidden" name="reservation_id_hidden" value="<?php echo isset($data['reservation_id_db'])?$data['reservation_id_db']:''; ?>">
                    <input type="text" name="reservation_id" onkeypress="return validate_nnumbers(event)" class="form-control form-control-lg <?php echo (empty($data['code_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['reservation_id']; ?>">
                    <span class="invalid-feedback"><?php echo $data['code_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="room">Room name <sup>*</sup></label>
                    <input type="text" name="room" class="form-control form-control-lg bg-light" readonly value="<?php echo $data['room']; ?>" >
                </div>
                <div class="form-group">
                    <label for="reservation_date">Reserved on: <sup>*</sup></label>
                    <input type="text" name="reservation_date" value="<?php echo $data['reservation_date']; ?>" class="form-control form-control-lg bg-light" readonly>
                </div>
                <div class="form-group">
                    <label for="date_in">Date In: <sup>*</sup></label>
                    <input type="date" name="date_in"  value="<?php echo $data['date_in']; ?>" class="form-control form-control-lg bg-light" readonly >
                </div>
                <div class="form-group">
                    <label for="date_out">Date out: <sup>*</sup></label>
                    <input type="date" name="date_out" min="<?php echo $data['l_date_in']; ?>" value="<?php echo $data['date_out']; ?>" class="form-control form-control-lg <?php echo (empty($data['date_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo $data['date_out']; ?>">
                    <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>
                </div> 
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Finish" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <label class="btn btn-light btn-block" onclick="goBack()">Back</label>
                    </div>
                </div>
        	</form>
    	</div>
    </div>
</div>
<?php include_once APPROOT . '/views/inc/footer.php' ?>
