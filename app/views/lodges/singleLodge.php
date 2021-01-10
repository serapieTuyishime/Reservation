<?php include_once APPROOT . '/views/inc/header.php' ?>
	<a href="<?php echo URLROOT;?>/lodges/showAll" class="btn btn-success"><i class="fa fa-backward"></i> Back</a>
	<div class="card card-body mt-5 container">
		<h2>All Rooms in <?php echo isset($data[0]->lodge)? $data[0]->lodge.' lodge':'this lodge'; ?> </h2>
		<div class="row">
			<?php if (!empty($data)): ?>
				<?php foreach ($data as $key => $value): ?>
				<div class="col">
					<a href="<?php echo URLROOT .'/rooms/singleRoom/'.$value->name; ?>"><img class="img-fluid img-thumbnail" style="height: 10rem; width: 15rem;" src="<?php echo $value->imageName;?>" alt="<?php echo $value->imageName; ?>"></a>
					<label id="info">
						<?php echo $value->name. ' Room'; ?>
					</label>
				</div>
			<?php endforeach ?>
			<?php endif ?>
		</div>
		<?php if (empty($data)): ?>
			<label id="error_label">There are no lodges in this category to display</label>
		<?php endif ?>
	</div>
<?php include_once APPROOT . '/views/inc/footer.php' ?>
