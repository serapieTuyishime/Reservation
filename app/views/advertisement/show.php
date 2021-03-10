<?php include_once APPROOT . '/views/inc/header.php' ?>
<div class="row">
	<div class="mx-auto col-md-9 ml-1">
    <label class="btn btn-success" onclick="goBack()"><i class="fa fa-backward"></i> Back</label>
        <div class="card card-body bg-light mt-5">
        	<?php flash('register_success'); ?>
        	<h2>Advertisements</h2>
            <div class="text-right"><a href="<?php echo URLROOT; ?>/ads/register" class="btn btn-primary"><i class="fa fa-plus"></i> Add new</a></div>
        	<table class="table table-striped table-responsive" id="datatablee">
        		
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
                <tbody>

            		<?php if (!empty($data)): ?>
                        <?php foreach ($data as $key => $value): ?>
                            <tr>
                                <td><?php echo $value->id; ?></td>
                                <td><?php echo $value->advertiser; ?></td>
                                <td><?php echo $value->link; ?></td>
                                <td><?php echo $value->date_in; ?></td>
                                <td><?php echo $value->date_out; ?></td>
                                <td><a href="<?php echo URLROOT.'/ads/delete/'.$value->id; ?>" onclick="return confirm('Are you sure you want to delete this ad');"><label class="btn btn-danger"><i class="fa fa-trash"></i></label></a></td>
                            </tr>
                    <?php endforeach ?>
                    <?php else: ?>
                        <tr><th colspan="6">No managers to display</th></tr>
                    <?php endif ?>
                </tbody>
        	</table>
        </div>
    </div>
<?php include_once APPROOT . '/views/admins/menu_bar.php' ?>

</div>
<?php include_once APPROOT . '/views/inc/footer.php' ?>
