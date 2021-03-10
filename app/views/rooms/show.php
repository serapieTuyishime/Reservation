<?php include_once APPROOT . '/views/inc/header.php' ?>
<div class="row">
	<div class="mx-auto ml-1 col-md-9">
    <label class="btn btn-success" onclick="goBack()"><i class="fa fa-backward"></i> Back</label>
        <div class="card card-body bg-light mt-5">
        	<?php flash('register_success'); ?>
        	<h2>All Rooms</h2>
            <div class="text-right"><a href="<?php echo URLROOT; ?>/rooms/register" class="btn btn-primary"><i class="fa fa-plus"></i> Add new</a></div>

        	<table class="table table-striped" id="datatablee">

        		<thead class="thead-dark">
                    <tr>
        				<th>ID</th>
        				<th>Name</th>
        				<th>Price</th>
        				<th>Category</th>
                        <th>Specification</th>
        				<th>Action</th>
                    </tr>
        		</thead>
				<tbody>

	        		<?php if (!empty($data)): ?>
	                    <?php foreach ($data as $key => $value): ?>
	                        <tr>
	                            <td><?php echo $value->id; ?></td>
	                            <td><?php echo $value->name; ?></td>
	                            <td><?php echo $value->price; ?></td>
	                            <td><?php echo $value->category; ?></td>
	                            <td><?php echo $value->specifications; ?></td>
	                            <td><a href="<?php echo URLROOT.'/rooms/delete/'.$value->id; ?>" onclick="return confirm('Please confirm if you have thought about deleting this one too');"><label class="btn btn-danger"><i class="fa fa-trash"></i></label></a></td>
	                        </tr>
	                    </tbody>
	                <?php endforeach ?>
	                <?php else: ?>
	                    <tr><th colspan="6">No managers to display</th></tr>
	                <?php endif ?>
				</tbody>
        	</table>
        </div>
    </div>
<?php include_once APPROOT . '/views/managers/menu_bar.php' ?>

</div>
<?php include_once APPROOT . '/views/inc/footer.php' ?>
