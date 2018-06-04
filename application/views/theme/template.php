<!DOCTYPE html>
<html lang="en">

<head>
<?php $this->load->view('theme/head'); ?>
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
<?php $this->load->view('theme/header'); ?>
        <!-- End header header -->
        <!-- Left Sidebar  -->
<?php $this->load->view('theme/sidebar'); ?>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->

            <!-- Bread crumb -->

            <!-- End Bread crumb -->

            <!-- Container fluid  -->
<?php $this->load->view('theme/content'); ?>
            <!-- End Container fluid  -->

            <!-- footer -->
<?php $this->load->view('theme/footer'); ?>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
<?php $this->load->view('theme/jquery'); ?>

</body>

</html>
