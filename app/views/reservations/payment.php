<?php include_once APPROOT . '/views/inc/header.php' ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <?php flash('register_success'); ?>
            <h2>Payments</h2> 
            <?php flash('register_success'); ?>
            <p>Please confirm your payment for <span class="font-weight-bold"><?php echo $data['amount']; ?> Rwf</span><i><code> ..(Non refundable)</code></i></p>
            <form action="<?php echo URLROOT.'/reservations/payment/'. $data['reservationId']; ?>" method="post">
                <div class="form-group">
                    <label for="username">Email: <sup>*</sup></label>
                    <i><small><code>This must be the credentials from the finances table</code></small></i>
                    <input type="hidden" name="amount" value="<?php echo $data['amount']; ?>">
                    <input type="text" name="email" maxlength="50" class="form-control form-control-lg <?php echo (empty($data['email_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo isset($data['email'])? $data['email']:''; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?php echo (empty($data['password_err'])) ? '':'is-invalid'; ?>"
                        value="<?php echo isset($data['password']) ? $data['password']:''; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>

                <div class="row">
                	<div class="col">
	                    <input type="submit" value="Confirm" class="btn btn-success btn-block">
	                </div>  
	                <div class="col">
	                    <a href="<?php echo URLROOT; ?>/payments/register" class="text-muted btn btn-light btn-block">No account ? register</a>
	                </div>  
                </div>              
            </form><br><br>
            <div class="">
            	<i>Want to make other decisions?</i>  <span class="text-left"><a href="<?php echo URLROOT; ?>/reservations/changeReservation" class="text-muted"><i class="fa fa-pen"></i>Edit</a>  or  <a href="<?php echo URLROOT; ?>/reservations/deleteReservation" class="text-warning"><i class="fa fa-trash"></i> Delete?</a></span>
            </div>
        </div>
    </div>
</div>
<?php include_once APPROOT . '/views/inc/footer.php' ?>