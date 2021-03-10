<?php include_once APPROOT . '/views/inc/header.php' ?>
<div class="row">
	<div class="mx-auto ml-1 col-md-9">
    <label class="btn btn-light" onclick="goBack()"><i class="fa fa-backward"></i>Back</label>

        <div class="card card-body bg-light mt-5">
        	<?php flash('register_success'); ?>
        	<h2><?php echo isset($data['heading'])? $data['heading']: 'All reservations'; ?></h2>
        	<table class="table table-striped" id="dataTable">
        		<thead>
        			<tr class="thead-dark">
        				<th>ID</th>
        				<th>Room</th>
        				<th>Guest</th>
        				<th>Date in</th>
						<th>Date out</th>
        				<th>Days</th>
        			</tr>
        		</thead>
        		<tbody>
					<?php if (!empty($data['reservations'])): ?>
	                    <?php foreach ($data['reservations'] as $key => $value): ?>
		                    <tr>
		                        <td><?php echo $value->id; ?></td>
		                        <td><?php echo $value->room; ?></td>
		                        <td><?php echo $value->guestName; ?></td>
		                        <td><?php echo $value->dateIn; ?></td>
								<td><?php echo $value->dateOut; ?></td>
								<td>
									<?php
									$date1=new DateTime($value->dateIn);
									$date2=new DateTime($value->dateOut);
									$interval= $date1->diff($date2);
									echo $interval->format('%d days');
									 ?>
								</td>
		                    </tr>
		                <?php endforeach ?>
	                <?php else: ?>
	                    <tr><th colspan="6">No reservations in this category</th></tr>
	                <?php endif ?>
        		</tbody>
        	</table>
            <form method="post" action="<?php echo URLROOT; ?>/lodges/findReservationsBydate">
                <label class="text-muted" >Displaying reservations from: <input type="date" class="form-control-lg" name="dateFrom"></label> To
				<label class="text-muted" ><input type="date" class="form-control-lg" name="dateTo"></label>
                <input type="submit" class="btn btn-success" value="Go.." name="">
            </form>
        </div>
    </div>
<?php include_once APPROOT . '/views/managers/menu_bar.php' ?>

</div>
<?php include_once APPROOT . '/views/inc/footer.php' ?>
