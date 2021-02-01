<?php include_once APPROOT . '/views/inc/header.php' ?>
	<div class="card card-body mt-5 container">
		<h2>All lodges</h2>
		<div class="row">
			<?php if (!empty($data)): ?>
				<?php foreach ($data as $key => $value): ?>
				<div class="col">
					<a href="<?php echo URLROOT .'/lodges/singleLodge/'.$value->lodgeName; ?>"><img class="img-fluid img-thumbnail" style="height: 10rem; width: 15rem;" src="<?php echo $value->imageName;?>" alt="<?php echo $value->imageName; ?>"></a>
					<label id="info">
						<?php echo $value->lodgeName. ' Lodge'; ?><br>
						<pre><?php echo $value->rooms.' Rooms'; ?>     <span class="text-muted"><a href="#<?php echo $value->lodgeName; ?>id" data-toggle="collapse">Other info</a></span></pre>				
					</label>
					<label>Location: <?php echo $value->country.'-'.$value->province.'-'.$value->district.'-'.$value->sector; ?></label>
					<div class="collapse" id="<?php echo $value->lodgeName; ?>id">
						<span class="display-6">Specifications</span><br>
						<label><?php echo $value->specifications; ?></label>
					</div>
				</div>
			<?php endforeach ?>
			<?php endif ?>
		</div>
		<?php if (empty($data)): ?>
			<label id="error_label">There are no lodges in this category to display</label>
		<?php endif ?>
	</div>
<?php include_once APPROOT . '/views/inc/footer.php' ?>
