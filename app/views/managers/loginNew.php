<?php include_once APPROOT . '/views/inc/header.php' ?>
<br><br><br>
<div class="row">
    <div class="col-md-6 mx-auto">
  <div class="bg-white m-4">
    <div class="title-box-d">
      <h3 class="title-d">Search Lodges</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="">
      <form class="form-a" action="<?php echo URLROOT; ?>/lodges/search" method="post">
        <div class="row">
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label for="Type">Country</label>
              <input type="text" class="form-control form-control-lg form-control-a" value="rwanda" readonly name="country">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="Province">Province</label>
              <select class="form-control form-control-lg form-control-a" id="Province" name="province">
                <option value="">-SELECT</option>
                <option value="north">North</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="district">District</label>
              <select class="form-control form-control-lg form-control-a" id="district" name="district">
                <option value="">-Select</option>
                <option value="musanze">Musanze</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="sector">Sector</label>
              <select class="form-control form-control-lg form-control-a" id="sector" name="sector">
                <option value="">Select</option>
                <option value="muhoza">Muhoza</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="cell">cell</label>
              <select class="form-control form-control-lg form-control-a" id="cell" name="cell">
                <option value="">--select</option>
                <option value="ruhengeri">Ruhengeri</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">Search Lodge</button>
          </div>
        </div>
      </form>
    </div>
  </div><!-- End Property Search Section -->>
 </div>
</div>
<?php include_once APPROOT . '/views/inc/footer.php' ?>
