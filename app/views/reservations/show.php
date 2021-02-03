<?php include_once APPROOT . '/views/inc/header.php' ?>
<div class="row">
	<div class="mx-auto">
    <label class="btn btn-light" onclick="goBack()"><i class="fa fa-backward"></i>Back</label>

        <div class="card card-body bg-light mt-5">
        	<?php flash('register_success'); ?>
        	<h2>All reservations</h2>
        	<table class="table table-striped" id="datatablee">
        		<tr>
        			<thead class="thead-dark">
        				<th>ID</th>
        				<th>Room</th>
        				<th>Lodge</th>
        				<th>Guest</th>
        				<th>Date in</th>
        				<th>Date out</th>
        			</thead>
        		</tr>
        		<?php if (!empty($data)): ?>
                    <?php foreach ($data as $key => $value): ?>
                    <tr>
                        <td><?php echo $value->id; ?></td>
                        <td><?php echo $value->room; ?></td>
                        <td><?php echo $value->lodge; ?></td>
                        <td><?php echo $value->guestName; ?></td>
                        <td><?php echo $value->dateIn; ?></td>
                        <td><?php echo $value->dateOut; ?></td>
                    </tr>
                <?php endforeach ?>
                <?php else: ?>
                    <tr><th colspan="6">No reservations in this category</th></tr>
                <?php endif ?>
        	</table>
            <form method="post" action="<?php echo URLROOT; ?>/reservations/findReservationsBydate">
                <label class="text-muted" >Displaying reservations from: <input type="date" class="form-control-lg" value="<?php echo isset($data[0]->minDateOut)? $data[0]->minDateOut: date('Y-m-d'); ?>" name="dateFrom"></label>
                <input type="submit" class="btn btn-success" value="Go.." name="">
            </form>
        </div>
    </div>
<?php include_once APPROOT . '/views/managers/menu_bar.php' ?>

</div>
<?php include_once APPROOT . '/views/inc/footer.php' ?>
