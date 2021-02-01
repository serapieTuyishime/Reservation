<?php include_once APPROOT . '/views/inc/header.php' ?>
	<!-- <a href="<?php echo URLROOT;?>/lodges/showAll" class="btn btn-success"><i class="fa fa-backward"></i> Back</a> -->
	<?php 
		if (empty($data->name)) 
		{
			header('location:'. URLROOT.'/lodges/showAll');
			die();
		}
	 ?>
	<div id="singleRoom" class="card card-body" style="background-color: inherit;" >
		<label class="display-4 text-capitalize"><?php echo $data->name; ?> Room</label>
		<div class="row" >
			<div class="card bg-light mt-5 col">
				<div class="img-thumbnail"  id="imageDiv">
					<img src="<?php echo $data->imageName; ?>" width="100%" height="80%">
					<div class="caption">
						<p id="data_div">
							<?php echo $data->specifications; ?></p>
					</div>
				</div>
			</div>
			<div class="col card mt-5" id="few_details">
				<label class="text-dark text-truncate font-weight-bold  lead">Price: <br></label>
				<?php echo $data->price; ?> Rwf per night
				<br>
				<label class="text-dark text-truncate font-weight-bold  lead">Reservations this year: <br></label>
				<?php echo $data->reservations; ?>
				<label class="text-dark text-truncate font-weight-bold  lead">Reservations <br></label>
				<?php echo ($data->dateOut>=date('Y-m-d'))?'Booked until: '.$data->dateOut: "Last booked on: ".$data->dateOut; ?>
			</div>
		</div>
		
		<div id="feedbacks_div"> <span class="card-title display-6"> Comments:</span> <br>		 
			<label  class="p-2 mb-3"><?php echo $data->pastComments; ?></label>
		</div>
		<div id="links_div " class="mt-5">
			<label class="row">
				<label class="col">
					<a href="<?php echo URLROOT;?>/rooms/prepareReservation/<?php echo $data->name; ?>"><button class="btn btn-success" id="bigButton"><i class="fa fa-enter"></i>Book</button></a>
				</label>
				<label class="col">
					<a href="<?php echo URLROOT;?>/lodges/singleLodge/<?php echo $data->lodge; ?>"><button class="btn btn-warning" id="bigButton"><i class="fa fa-backward"></i> Back</button></a>
				</label>
			</label>
		</div>
	</div>
<?php include_once APPROOT . '/views/inc/footer.php' ?>
