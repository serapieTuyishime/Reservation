<?php include_once APPROOT . '/views/inc/header.php' ?>
<div class="row">
	<div class="mx-auto col-md-9 ml-1">
    <label class="btn btn-success" onclick="goBack()"><i class="fa fa-backward"></i> Back</label>
        <div class="card card-body bg-light mt-5">
        	<?php flash('register_success'); ?>
        	<h2>Lodges</h2>
            <div class="text-right"><a href="<?php echo URLROOT; ?>/lodges/register" class="btn btn-primary"><i class="fa fa-plus"></i> Add new</a></div>
        	<table class="table table-striped table-responsive" id="datatablee">
        		
        		<thead class="thead-dark">
                    <tr>
        				<th>ID</th>
        				<th>Name</th>
                        <th>Email</th>
        				<th>Telephone</th>
                        <th>Address</th>
                        <th>Specifications</th>
        				<th>Actions</th>
                    </tr>
        		</thead>
                <tbody>

            		<?php if (!empty($data)): ?>
                        <?php foreach ($data as $key => $value): ?>
                            <tr>
                                <td><?php echo $value->id; ?></td>
                                <td><?php echo $value->lodgeName; ?></td>
                                <td><?php echo $value->email; ?></td>
                                <td><?php echo $value->telephone; ?></td>
                                <td><?php echo $value->country.'-'.$value->province.'-'.$value->district.'-'.$value->sector.'-'.$value->cell; ?></td>
                                <td><?php echo $value->specifications; ?></td>

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
