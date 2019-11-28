<?php 
session_start();
$user=$_SESSION['user'];
// $utype=$_SESSION['username'];

if(!$user){
  header('Location:login.php');
}
?>
<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.15
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>SUSL Resource Mgt</title>
    <!-- Icons-->
   <link href="../src/vendors/css/coreui-icons.min.css" rel="stylesheet">
<link href="../src/vendors/css/flag-icon.min.css" rel="stylesheet">
<link href="../src/vendors/css/font-awesome.min.css" rel="stylesheet">
<link href="../src/vendors/css/simple-line-icons.css" rel="stylesheet">

<link rel="stylesheet" href="../src/vendors/css/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="../src/vendors/css/Ionicons/css/ionicons.min.css">
    <!-- Main styles for this application-->
    <link href="../src/css/style.css" rel="stylesheet">
        <link href="../src/css/styleValidate.css" rel="stylesheet">
    <link href="../src/css/jquery-ui.min.css" rel="stylesheet">
    <link href="../src/css/bootstrap.min.css" rel="stylesheet">
    <link href="../src/css/zebra_datepicker.min.css" rel="stylesheet">
    <link href="../src/css/jquery-confirm.css" rel="stylesheet">
       <link rel="stylesheet" href="../src/css/jquery.dataTables.min.css">
    <link href="../src/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="../build/css/images/logo.PNG" width="100" height="50" alt="CoreUI Logo">
        <img class="navbar-brand-minimized" src="../build/css/images/logo.PNG" width="100" height="30" alt="SUSL Logo">
      </a>
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
      </button>
     
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item d-md-down-none">
          <a class="nav-link" href="<?php echo $user;  echo $utype;?>">
            <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                    
                     <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="fa fa-user"></i> <?php echo $user; ?></a>
              
            </li>
              </div>
          </a>
        </li>
        <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
        <button class="btn btn-outline-dark fa fa-sign-out" type="button" aria-pressed="true"><a href="../system/login.php">Sign Out</a>
        </button>
        </div>
       
        </ul> 
     
      <button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">
        <span class="navbar-toggler-icon"></span>
      </button>
    </header>
    <div class="app-body">
      <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <i class="fa fa-home"></i> Dashboard
                
              </a>
            </li>
          
           <hr>
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="fa fa-user-secret"></i> Person Management</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <a class="nav-link" href="LectureViews.php">
                    <i class="fa fa-circle-o"></i> Manage Lectures</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="nonacaviews.php">
                    <i class="fa fa-circle-o"></i> Manage Non-academic</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="LectureViews.php">
                    <i class="fa fa-circle-o"></i> Manage Demostrators</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="studentviews.php">
                    <i class="fa fa-circle-o"></i> Manage Students</a>
                </li>
              </ul>
            </li>
            
                <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="fa fa-user"></i> Permission Management</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <a class="nav-link" href="CustomerViews.php">
                    <i class="fa fa-circle-o"></i> Manage Assets Permission </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="requestassestsviews.php">
                    <i class="fa fa-circle-o"></i> Manage Location Request </a>
                </li>
               
              </ul>
            </li>
              
             <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="fa fa-automobile"></i> Role Management</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <a class="nav-link" href="addroles.php">
                    <i class="fa fa-circle-o"></i> Manage Role</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="addfaculty.php">
                    <i class="fa fa-circle-o"></i> Manage Faculty</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="adddepartments.php">
                    <i class="fa fa-circle-o"></i> Manage Departments</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="AppointmentsViews.php">
                    <i class="fa fa-circle-o"></i> Manage Privilages</a>
                </li>
                
              </ul>
            </li>
           
             <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="fa fa-spinner"></i> Location Management</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <a class="nav-link" href="departmentlocviews.php">
                    <i class="fa fa-circle-o"></i> Manage Department </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="lecturehalllocviews.php">
                    <i class="fa fa-circle-o"></i> Manage Lecture Hall</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="stockV.php">
                    <i class="fa fa-circle-o"></i> Manage Labs</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="addloctype.php">
                    <i class="fa fa-circle-o"></i> Manage Location</a>
                </li>
                
              </ul>
            </li>
           
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="fa fa-cogs"></i> Assets Management</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <a class="nav-link" href="as.php">
                    <i class="fa fa-circle-o"></i> Manage Fixed Assets</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="as2.php">
                    <i class="fa fa-circle-o"></i> Manage Unfixed Assets</a>
                </li>
                
                
              </ul>
            </li>
           
           <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="fa fa-file-pdf-o"></i> Report Management</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <a class="nav-link" href="employeeReport.php">
                    <i class="fa fa-circle-o"></i> Employee Report </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="customerReport.php">
                    <i class="fa fa-circle-o"></i>Customer Report</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="appointmentReport.php">
                    <i class="fa fa-circle-o"></i>Appointment Report</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="payment.php">
                    <i class="fa fa-circle-o"></i>Payement Report</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="sppReport.php">
                    <i class="fa fa-circle-o"></i>Spare Parts Report</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="msg.php">
                    <i class="fa fa-circle-o"></i>Messages</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="equipementMain.php">
                    <i class="fa fa-circle-o"></i>Maintainance Report</a>
                </li>
              </ul>
            </li>
            </li>
          </ul>
        </nav>
      
      </div>
      <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Admin</a>
          </li>
          <li class="breadcrumb-item active">Dashboard</li>
          <!-- Breadcrumb Menu-->
          <li class="breadcrumb-menu d-md-down-none">
            <div class="btn-group" role="group" aria-label="Button group">
              
             
            </div>
          </li>
        </ol>
