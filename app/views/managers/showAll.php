<?php include_once APPROOT . '/views/inc/header.php' ?>
<div class="row">
	<div class="mx-auto">
    <label class="btn btn-success" onclick="goBack()"><i class="fa fa-backward"></i> Back</label>
        <div class="card card-body bg-light mt-5">
        	<?php flash('register_success'); ?>
        	<h2>All managers</h2>
        	<table class="table table-striped" id="datatablee">
        		
        		<thead class="thead-dark">
                    <tr>
        				<th>ID</th>
        				<th>Name</th>
        				<th>Lodge</th>
        				<th>Email</th>
                        <th>Telephone</th>
        				<th>Action</th>
                    </tr>
        		</thead>
        		<?php if (!empty($data)): ?>
                    <?php foreach ($data as $key => $value): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $value->id; ?></td>
                            <td><?php echo $value->name; ?></td>
                            <td><?php echo $value->lodge; ?></td>
                            <td><?php echo $value->email; ?></td>
                            <td><?php echo $value->telephone; ?></td>
                            <td><a href="<?php echo URLROOT.'/managers/delete/'.$value->id; ?>" onclick="return confirm('Please confirm if you have thought about deleting this one too');"><label class="btn btn-danger"><i class="fa fa-trash"></i></label></a></td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
                <?php else: ?>
                    <tr><th colspan="6">No managers to display</th></tr>
                <?php endif ?>
        	</table>
        </div>
    </div>
<?php include_once APPROOT . '/views/admins/menu_bar.php' ?>

</div>
<?php include_once APPROOT . '/views/inc/footer.php' ?>
