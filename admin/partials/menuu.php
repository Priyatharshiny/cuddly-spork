<?php
    include("../config/constants.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sun Shine</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- include CSS -->
  <link href="../assets/css/admins.css" rel="stylesheet">

  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/41354f2a54.js" crossorigin="anonymous"></script>


  <!-- =======================================================
  * Template Name: Gp - v4.7.0
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


</head>

<body>

  <!-- ======= Header Section ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">
      <div>
        <a href="index.php" class="logo me-auto me-lg-0">
          <img src="../assets/img/logo.jpg" style="width:70px; max-height:70px;" alt="logo" class="img-fluid">
        </a>
      </div>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="manage-category.php">Category</a></li>
          <li><a class="nav-link scrollto " href="manage-food.php">Products</a></li>
          <li><a class="nav-link scrollto " href="manage-order.php">Orders</a></li>
          <li><a class="nav-link scrollto " href="manage-supplier.php">SUPPLIER</a></li>
          <li><a class="nav-link scrollto " href="manage-suppliers.php">Suppliers</a></li>
          <li><a class="nav-link scrollto " href="manage-employee.php">Employee</a></li>
          <li><a class="nav-link scrollto " href="manage-customer.php">Customers</a></li>
          <li><a class="nav-link scrollto " href="contact-details.php">Contact Details</a></li>
          <li><a class="nav-link scrollto " href="feedback.php">Feedback</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <div>
          <?php  if (isset($_SESSION['username'])) : ?>
            <abbr title="Sign Out"><a href="index.php?logout='1'" class="get-started-btn scrollto">Sign Out <i class="fa fa-sign-out" aria-hidden="true"></i></a></abbr>          <?php endif ?>
        </div>
      </div>
  </header>
  <!-- ======= Header Section End ======= -->




<main id="main">