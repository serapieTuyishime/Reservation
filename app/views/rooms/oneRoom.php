<?php include_once APPROOT . '/views/inc/header.php' ?>
	<!-- <a href="<?php echo URLROOT;?>/lodges/showAll" class="btn btn-success"><i class="fa fa-backward"></i> Back</a> -->
	<?php 
		if (empty($data->name)) 
		{
			header('location:'. URLROOT.'/lodges/showAll');
			die();
		}
	 ?>
<section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"><?php echo $data->name; ?> Room</h1>
              <span class="color-text-a"><?php echo $data->lodge; ?> Lodge</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="<?php echo URLROOT; ?>">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="<?php echo URLROOT; ?>/rooms/showAll">Rooms</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <?php echo $data->name; ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
              <div class="carousel-item-b">
                <img src="<?php echo $data->imageName; ?>" width="100%" height="80%">
              </div>
               <!-- <div class="carousel-item-b">
                <img src="<?php echo $data->imageName; ?>" width="100%" height="80%">
              </div>
               <div class="carousel-item-b">
                <img src="<?php echo $data->imageName; ?>" width="100%" height="80%">
              </div> -->
            </div>
            <div class="row justify-content-between">
              <div class="col-md-5 col-lg-4">
                <div class="property-price d-flex justify-content-center foo">
                  <div class="card-header-c d-flex">
                    <div class="card-box-ico">
                      <span class="ion-money">Rwf</span>
                    </div>
                    <div class="card-title-c align-self-center">
                      <h5 class="title-c"><?php echo $data->price; ?></h5>
                    </div>
                  </div>
                </div>
                <div class="property-summary">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d section-t4">
                        <h3 class="title-d">Quick Summary</h3>
                      </div>
                    </div>
                  </div>
                  <div class="summary-list">
                    <ul class="list">
                      <li class="d-flex justify-content-between">
                        <strong>Reservations this year:</strong>
                        <span><?php echo $data->reservations; ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Reservations:</strong>
                        <span><?php echo ($data->dateOut>=date('Y-m-d'))?'Booked until: '.$data->dateOut: "Last booked on: ".$data->dateOut; ?></span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-7 col-lg-7 section-md-t3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Room Description</h3>
                    </div>
                  </div>
                </div>
                <div class="property-description">
                  <p class="description color-text-a">
                    <strong>Category: </strong><?php echo $data->category; ?>
                  </p>
                  <p class="description color-text-a no-margin">
                    <div id="feedbacks_div"> <span class="card-title display-6"> <strong>Comments: </strong></span> <br>     
                      <label  class="p-2 mb-3"><?php echo $data->pastComments; ?></label>
                    </div>
                  </p>
                </div>
                <div class="row section-t3">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Specifications</h3>
                    </div>
                  </div>
                </div>
                <div class="amenities-list color-text-a">
                  <ul class="list-a no-margin">
                    <?php $specs= explode(',', $data->specifications);

                    if (!empty($specs)) 
                    {
                      foreach ($specs as $key => $value) 
                      {
                        echo "<li>".$value."  </li>";
                      }
                    }
                     ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="title-box-d section-t4">
                <h3 class="title-d">Actions</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-12 row">
            <div class="col">
              <a href="<?php echo URLROOT;?>/rooms/prepareReservation/<?php echo $data->name; ?>"><button class="btn btn-success btn-block" id=""><i class="fa fa-edit"></i> Book</button></a>
            </div>
            <div class="col">
              <a href="" class="btn btn-info btn-block" id=""><i class="fa fa-shopping-cart"></i> Add to cart</a>
            </div>
            <div class="col">
              <a href="<?php echo URLROOT;?>/lodges/singleLodge/<?php echo $data->lodge; ?>"><button class="btn btn-warning btn-block" id=""><i class="fa fa-backward"></i> Back</button></a>
              
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Property Single-->
<?php require_once APPROOT . '/views/inc/footer.php' ?>
