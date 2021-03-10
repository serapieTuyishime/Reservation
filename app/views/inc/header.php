<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo SITENAME; ?> - </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Vendor CSS Files -->
  <link href="<?php echo URLROOT; ?>/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo URLROOT; ?>/css/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo URLROOT; ?>/css/animate.css/animate.min.css" rel="stylesheet">
  <!-- <link href="<?php echo URLROOT; ?>/css/font-awesome.min.css" rel="stylesheet"> -->
    <link href="<?php echo URLROOT; ?>/css/font_awesome/css/all.css" rel="stylesheet">

  <link href="<?php echo URLROOT; ?>/css/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/datatables/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/datatables/buttons.dataTables.min.css">

  <!-- Template Main CSS File -->
  <link href="<?php echo URLROOT; ?>/css/home.css" rel="stylesheet">

  <!-- system main css file -->
  <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/style.css">
</head>

<body>

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Search Lodges</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
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

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAMESHORT; ?> <span class="color-b">Project</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/lodges/showAll">Lodges</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/Reservations/changeReservation">Reservations</a>
          </li>
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Pages
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="property-single.html">Property Single</a>
              <a class="dropdown-item" href="blog-single.html">Blog Single</a>
              <a class="dropdown-item" href="agents-grid.html">Agents Grid</a>
              <a class="dropdown-item" href="agent-single.html">Agent Single</a>
            </div>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/Managerlogin">Manager login</a>
          </li>
        </ul>
      </div>
      <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
    </div>
  </nav><!-- End Header/Navbar -->
<main id="main">
  <br><br><br><br>
