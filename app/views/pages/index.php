<?php include_once APPROOT . '/views/inc/header.php' ?>

  <!-- ======= Intro Section ======= -->
  <div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
    <?php if (!empty($data['lodges'])): ?>
    	<?php foreach ($data['lodges'] as $key => $value): ?>
    		<div class="carousel-item-a intro-item bg-image" style="background-image: url(<?php echo $value->imageName; ?>)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top"><?php echo $value->country; ?>, <?php echo $value->province; ?>
                      <br> <?php echo $value->district; ?></p>
                    <h1 class="intro-title mb-4">
                      <!-- <span class="color-b">204 </span> Mount -->
                      <br> <?php echo $value->lodgeName; ?></h1>
                    <p class="intro-subtitle intro-price">
                      <a href="<?php echo URLROOT .'/lodges/singleLodge/'.$value->lodgeName; ?>"><span class="price-a"><i class="fa fa-forward"></i> More</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    	<?php endforeach ?>
    	<?php else: ?>
    		<div class="carousel-item-a intro-item bg-image" style="background-image: url(<?php echo URLROOT; ?>/img/slide-1.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">Default address
                      <br> Default</p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">def </span> def
                      <br> Default</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">No lodges present at this time</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <?php endif ?>

  </div><!-- End Intro Section -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section class="section-services section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Our Services</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="fa fa-user"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">Reserve single</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c text-muted">
                  You can find a lodge of your interest and just choose one room that satisfy your needs for as long as you want
                </p>
              </div>
              <div class="card-footer-c">
                <a href="<?php echo URLROOT; ?>/lodges/showAll" class="link-c link-icon">Start
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="fas fa-usd"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">Change your reservation </h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c text-muted">
                  Good news is that even if you change your mind you'll have nothing to loose except a few service fee that will feel like you never given. 
                </p>
              </div>
              <div class="card-footer-c">
                <a href="<?php echo URLROOT; ?>/reservation/changeReservation" class="link-c link-icon">Start
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="fa fa-forward"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">More</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c text-muted">
                  Looking for more information!, Get in touch with some of our trusted staff. <br>
                </p>
              </div>
              <div class="card-footer-c">
                <a href="<?php echo URLROOT; ?>/pages/contact" class="link-c link-icon">Read more
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Latest Properties Section ======= -->
    <section class="section-property section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Popular Rooms</h2>
              </div>
              <div class="title-link">
                <a href="<?php echo URLROOT; ?>/lodges/showAll">All Lodges
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div id="property-carousel" class="owl-carousel owl-theme">
       <?php if (!empty($data['rooms'])): ?>
       		<?php foreach ($data['rooms'] as $key => $value): ?>
       			 <div class="carousel-item-b">
            <div class="card-box-a card-shadow">
              <div class="img-box-a" style="height: 20rem;">
                <img src="<?php echo $value->imageName ; ?>" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a  href="<?php echo URLROOT .'/rooms/singleRoom/'.$value->name; ?>"><?php echo $value->name; ?>
                        <br /> <small class="text-muted"><?php echo $value->lodge; ?> lodge</small></a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">Price | Rwf <?php echo $value->price; ?></span>
                    </div>
                    <a href="<?php echo URLROOT .'/rooms/singleRoom/'.$value->name; ?>" class="link-a">Click here to view
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
               
                      <li>
                        <h4 class="card-info-title">Last booked</h4>
                        <span><?php echo $value->category; ?></span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Available</h4>
                        <span>Yes</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Category</h4>
                        <span><?php echo $value->category; ?></span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
        </div>
       		<?php endforeach ?>
       		<?php else: ?>
       			 <div class="carousel-item-b">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="<?php echo URLROOT; ?>/img/property-7.jpg" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="property-single.html">No
                        <br /> Polular rooms</a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">None</span>
                    </div>
                    <a href="property-single.html" class="link-a">You are viewing this because we have no rooms to display
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Bookings</h4>
                        <span>0</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Recent Bookings</h4>
                        <span><?php echo date('Y-m-d'); ?></span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Available</h4>
                        <span>Default</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
        </div>
       <?php endif ?>

        </div>
      </div>
    </section><!-- End Latest Properties Section -->


    <!-- ======= Latest News Section ======= -->


<?php require_once APPROOT . '/views/inc/footer.php' ?>
