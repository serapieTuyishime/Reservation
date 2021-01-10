<?php include_once APPROOT . '/views/inc/header.php' ?>
<div class="jumbotron jumbotron-flud">
    <div class="container">
        <h1 class="display-3"><?php echo $data['title']; ?></h1>
        <p class="lead"><?php echo $data['description']; ?></p>
    </div>
    <div id="subDivHome">
    	<button class="btn btn-success"><a href="<?php echo URLROOT; ?>/reservations/postFeedback">Feedback a room</a></button>
    	<button class="btn btn-success"><a href="<?php echo URLROOT; ?>/lodges/showAll">Find logde</a></button>
    	<!-- <button class="btn btn-success" onclick="theClick()"><a href="<?php echo URLROOT; ?>/reservations/changeReservation">Change a reservation</a></button> -->
    	<!-- <button class="btn btn-success" onclick="theClick()">Change a reservation</button> -->
    	<!-- <button class="btn btn-warning" onclick="theClick()">back</button> -->
    	<form method="post" action="<?php echo URLROOT; ?>/reservations/revert" onsubmit="theClick()">
    		<input type="hidden" id="resId" name="reservation_id">
    		<input type="submit" id="buttonSubmit" value="Change a reservation">
    	</form>
	</div>
</div>


<?php include_once APPROOT . '/views/inc/footer.php' ?>