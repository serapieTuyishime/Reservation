<?php include_once APPROOT . '/views/inc/header.php' ?>
<div class="row">
	<div class="mx-auto">
    <label class="btn btn-light" onclick="goBack()"><i class="fa fa-backward"></i>Back</label>
        <div class="card card-body bg-light mt-5">
        	<?php flash('register_success'); ?>
        	<h2>All managers</h2>
        	<table class="table table-striped">
        		<tr>
        			<thead class="thead-dark">
        				<th>ID</th>
        				<th>Client Name</th>
        				<th>Room</th>
        				<th>Date Reserved</th>
                        <th>FeedBack</th>
        			</thead>
        		</tr>
        		<?php if (!empty($data)): ?>
                    <?php foreach ($data as $key => $value): ?>
                    <tr>
                        <td><?php echo $value->id; ?></td>
                        <td><?php echo $value->guestName; ?></td>
                        <td><?php echo $value->room; ?></td>
                        <td><?php echo $value->reservationDate; ?></td>
                        <td><?php echo $value->feedback; ?></td>
                    </tr>
                <?php endforeach ?>
                <?php else: ?>
                    <tr><th colspan="6">No Feedbacks to display</th></tr>
                <?php endif ?>
        	</table>
        </div>
    </div>
<?php include_once APPROOT . '/views/managers/menu_bar.php' ?>

</div>
<?php include_once APPROOT . '/views/inc/footer.php' ?>
