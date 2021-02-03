<?php include_once APPROOT . '/views/inc/header.php' ?>

<section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single">Change a reservation</h1>
          <span class="color-text-a">2 steps</span>
        </div>
      </div>
      <div class="col-md-12 col-lg-4">
        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo URLROOT; ?>">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a href="<?php echo URLROOT; ?>/rooms/showAll">Reservations</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Edit
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section><!-- End Intro Single-->
 <section class="contact">
   <div class="container">
     <div class="row">
       <div class="col-sm-12">
         <div class="row">
           <div class="col-md-8 bg-light pt-5 " style="margin: auto; background: url(<?php echo URLROOT; ?>/img/plan2.jpg); ">
            <?php flash('register_success'); ?>
            <form method="post" action="<?php echo URLROOT ?>/reservations/saveNewReservations">
            <div class="row">
                    <div class="form-group col-lg-8">
                        <label for="reservation_id">Reservation code: <sup>*</sup></label>
                        <input type="hidden" name="reservation_id_hidden" value="<?php echo isset($data['reservation_id_db'])?$data['reservation_id_db']:''; ?>">
                        <input type="text" name="reservation_id" onkeypress="return validate_nnumbers(event)" class="form-control form-control-lg <?php echo (empty($data['code_err'])) ? '':'is-invalid'; ?>"
                            value="<?php echo $data['reservation_id']; ?>">
                        <span class="invalid-feedback"><?php echo $data['code_err']; ?></span>
                    </div>
                    <div class="col">
                        <label for="reservation_id"></label>
                        <input type="submit" class="form-control bg-info mt-3" value="Search" name="">
                    </div>      
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="room">Room name <sup>*</sup></label>
                        <input type="text" name="room" class="form-control form-control-lg bg-light" readonly value="<?php echo $data['room']; ?>" >
                    </div>
                    <div class="form-group col">
                        <label for="reservation_date">Reserved on: <sup>*</sup></label>
                        <input type="text" name="reservation_date" value="<?php echo $data['reservation_date']; ?>" class="form-control form-control-lg bg-light" readonly>
                    </div>
                </div>
                <div class="row">
                        <div class="form-group col">
                        <label for="date_in">Date In: <sup>*</sup></label>
                        <input type="date" name="date_in"  value="<?php echo $data['date_in']; ?>" class="form-control form-control-lg bg-light" readonly >
                    </div>
                    <div class="form-group col">
                        <label for="date_out">Date out: <sup>*</sup></label>
                        <input type="date" name="date_out" min="<?php echo $data['l_date_in']; ?>" value="<?php echo $data['date_out']; ?>" class="form-control form-control-lg <?php echo (empty($data['date_err'])) ? '':'is-invalid'; ?>"
                            value="<?php echo $data['date_out']; ?>">
                        <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>
                    </div> 
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Finish" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <label class="btn btn-light btn-block" onclick="goBack()">Back</label>
                    </div>
                </div>
          </form>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section><!-- End Contact Single-->

<?php include_once APPROOT . '/views/inc/footer.php' ?>
