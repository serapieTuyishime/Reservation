<?php include_once APPROOT . '/views/inc/header.php' ?>
<?php 
$today= date('Y-m-d');
$tomorrow= date('Y-m-d', strtotime('+1 day'));
?>
	

<div class="row">
	<div class="col-md-6 mx-auto">
		<a href="<?php echo URLROOT.'/rooms/singleRoom/'.$data['roomName']; ?>" class="btn btn-success"><i class="fa fa-backward"></i> Back</a>
        <div class="card card-body bg-light mt-5">
        	<?php flash('register_success'); ?>
        	<h2>Reservations</h2>
        	<form method="post" action="<?php echo URLROOT ?>/rooms/reservation" onsubmit="getPaymentPassword()" id="">
        		<div class="form-group">
                    <label for="room">Room name: <sup>*</sup></label>
                    <input type="hidden" name="price" value="<?php echo $data['price']; ?>">
                    <input type="text" name="room" class="form-control bg-light" value="<?php echo $data['roomName']; ?>" readonly>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="date_in">Date in: <sup>*</sup></label>
                        <input type="date" name="date_in" min="<?php echo ($data['l_date_out']>=$today)? $data['l_date_out']: $today; ?>" required class="form-control <?php echo (empty($data['date1_err'])) ? '':'is-invalid'; ?>" 
                            value="<?php echo $data['date_in']; ?>" required>
                            <span class="invalid-feedback"><?php echo $data['date1_err']; ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="date_out">Date Out: <sup>*</sup></label>
                        <input type="date" id="toDate" name="date_out" min="<?php echo $tomorrow; ?>" class="form-control <?php echo (empty($data['date_err'])) ? '':'is-invalid'; ?>"
                            value="<?php echo $data['date_out']; ?>" required>
                            <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>
                    </div>
                </div>
                <label style="font-size: 1.8rem;">
                	Reservations under
                </label>
                <div class="row">
                    <div class="form-group col">
                        <label for="lName">Last name: <sup>*</sup></label>
                        <input type="text" onkeypress="return validate_alphabets(event)" name="lName" class="form-control" required>
                    </div>
                    <div class="form-group col">
                        <label for="fName">First name: <sup>*</sup></label>
                        <input type="text" name="fName" onkeypress="return validate_alphabets(event)" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="telephone">Telephone: <sup>*</sup></label>
                        <input type="text" name="telephone" maxlength="14" onkeypress="return validate_nnumbers(event)" class="form-control" required>
                    </div>
                    <div class="form-group col">
                        <label for="email">Email: </label>
                        <input id="paymentEmail" type="text" name="email" class="form-control <?php echo (empty($data['email_err'])) ? '':'is-invalid'; ?>"
                            value="<?php echo ($data['email'])? $data['emmail']:''; ?>" required>
                            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                        <input type="hidden" name="paymentpassword" id="paymentpassword" value="">
                    </div>
                </div>
                <label> Location: </label>
                <div class="form-group row">
                	<div class="col">
                		<label for="country">Country</label>
            			<select class="form-control" name="country">
            				<option value="">--Select</option>
            				<option value="rwanda">Rwanda</option>
            			</select>
                	</div>
                	<div class="col">
                		<label for="province">Province</label>
            			<select name="province" class="form-control">
            				<option value="">--Select</option>
            			</select>
                	</div>
                </div>
                <div class="form-group row">
                	<div class="col">
                		<label for="district">District</label>
            			<select name="district" class="form-control">
            				<option value="">--Select</option>
            			</select>
                	</div>
                	<div class="col">
                		<label for="sector">Sector</label>
            			<select name="sector" class="form-control">
            				<option value="">--Select</option>
            			</select>
                	</div>
                </div>
                <label for="gender">Gender: <sup>*</sup> </label>
            	<div class="form-group row">
                    <div class="col"><input type="radio" name="gender" value="male"> Male </div>
                    <div class="col"><input type="radio" name="gender" value="female"> Female </div>
                    <div class="col"><input type="radio" name="gender" value="other" checked> Other </div>
                </div>
                <input type="submit" value="Book it!" class="btn btn-success btn-block form-control">
        	</form>
        </div>
    </div>
</div>
<script type="text/javascript">
    function getPaymentPassword(e)
    {
        var email= document.getElementById('paymentEmail').value;
        var password= prompt('Please enter the password for ' + email+ ' To initiate payment ');
  
            // put the inputted password into the hidden password field
        document.getElementById('paymentpassword').value= password;
    }

</script>
<?php include_once APPROOT . '/views/inc/footer.php' ?>
