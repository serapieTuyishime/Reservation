 <?php require_once APPROOT . '/views/inc/header.php'; ?>
 <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"><?php echo isset($data[0]->lodge)? $data[0]->lodge.' lodge':'this lodge'; ?></h1>
              <span class="color-text-a">All rooms</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="<?php echo URLROOT; ?>">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="<?php echo URLROOT; ?>/lodges/showAll">Lodges</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <?php echo isset($data[0]->lodge)? $data[0]->lodge.' lodge':'this lodge'; ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
      <div class="container">
        <div class="row">
          <?php if (!empty($data)): ?>
            <?php foreach ($data as $key => $value): ?>
              <div class="col-md-4">
                <div class="card-box-a card-shadow">
                  <div class="img-box-a">
                    <img src="<?php echo $value->imageName; ?>" alt="" class="img-a img-fluid" style="height: 25rem; width: 32rem;">
                  </div>
                  <div class="card-overlay">
                    <div class="card-overlay-a-content">
                      <div class="card-header-a">
                        <h2 class="card-title-a">
                          <a href="#"><?php echo ucfirst($value->name) ?>
                             Room</a>
                        </h2>
                      </div>
                      <div class="card-body-a">
                        <div class="price-box d-flex">
                          <span class="price-a">Price | Rwf <?php echo $value->price ?></span>
                        </div>
                        <a href="<?php echo URLROOT .'/rooms/singleRoom/'.$value->name; ?>" class="link-a">Click here to view
                          <span class="ion-ios-arrow-forward"></span>
                        </a>
                      </div>
                      <div class="card-footer-a">
                        <ul class="card-info d-flex justify-content-around">
                          <li>
                            <h4 class="card-info-title">Category</h4>
                            <span><?php echo $value->category ?>
                            </span>
                          </li>
                          <li>
                            <a href="">
                              <h4 class="card-info-title">Book it</h4>
                              <span>Now !</span>
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <h4 class="card-info-title">Add to </h4>
                              <span><i class="fa fa-shopping-cart"></i> Cart</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          <?php endif ?>
        </div>
      </div>
    </section><!-- End Property Grid Single-->
    <?php require_once APPROOT . '/views/inc/footer.php'; ?>