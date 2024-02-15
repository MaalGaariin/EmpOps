<?php
require 'assets/conn.php';
$id = $_SESSION['admin_id'];
$select = "SELECT * FROM admin WHERE id ='$id'";
$query = mysqli_query($conn, $select) or die(mysqli_error($conn));
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
}
if (isset($_POST['logout'])) {
    session_destroy();
    header('location:login.php');
}
$emp = "SELECT * FROM employee";
$emp_query = mysqli_query($conn, $emp) or die(mysqli_error($conn));
$com = "SELECT * FROM company";
$com_query = mysqli_query($conn, $com) or die(mysqli_error($conn));
$row_com = mysqli_fetch_assoc($com_query);
$total = mysqli_num_rows($emp_query);
if (!isset($_SESSION['admin_id'])) {
    session_destroy();
    header('location:login.php');
}
echo '<!DOCTYPE html>
<html lang="en">
	<head>
	
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Favicon -->
		<link rel="icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Linearicon Font -->
		<link rel="stylesheet" href="assets/css/lnr-icon.css">
				
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
				
		<!-- Custom CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		
		<title>Side Page</title>

		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<style>
         .announcement-container {
  display: flex;
  justify-content: center;
  align-items: center; /* Center vertically */
  height: 100vh; /* Adjust the height as needed */
}

.announcement-card {
  position: relative;
  width: 300px;
  height: auto; /* Adjust height dynamically based on content */
  border: 2px solid #ccc;
  border-radius: 10px;
  padding: 20px;
  text-align: center; /* Center the content horizontally */
}

.btn-label {
  color: blue;
}

.announcement-form {
  margin-top: 20px;
}

.announcement-input,
.announcement-textarea,
.announcement-upload-label,
.announcement-submit-btn {
  width: calc(100% - 22px); /* Adjusted width to account for padding */
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.announcement-textarea {
  height: 100px;
}

.announcement-upload-label {
  display: block;
  background-color: #f0f0f0;
  text-align: center;
  line-height: 30px;
  cursor: pointer;
}

.announcement-upload-input {
  display: none;
}

.announcement-submit-btn {
  background-color: blue;
  color: white;
  border: none;
  cursor: pointer;
}

.announcement-submit-btn:hover {
  background-color: darkblue;
}

        </style>
	</head>
	<body>
	<br>
	<br>
		<!-- Inner wrapper -->
		<div class="inner-wrapper">
					
			<!-- Loader -->
			<div id="loader-wrapper">
				
				<div class="loader">
				  <div class="dot"></div>
				  <div class="dot"></div>
				  <div class="dot"></div>
				  <div class="dot"></div>
				  <div class="dot"></div>
				</div>
			</div>



			<!-- Header -->
			<div id="includeHeader"></div>
			<!-- /Header -->
			<!-- Header -->
<header class="header">

    <!-- Top Header Section -->
    <div class="top-header-section">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                    <div class="logo my-3 my-sm-0">
                        <a href="index.html">
                            <img src="assets/img/empops.png" alt="logo image" class="img-fluid" width="100">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-6 text-right">
                    <div class="user-block d-none d-lg-block">
                        <div class="row align-items-center">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="user-notification-block align-right d-inline-block">

                                </div>

                                <!-- User notification-->
                                <div class="user-notification-block align-right d-inline-block">
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item" data-toggle="tooltip" data-placement="top"
                                            title="" data-original-title="Details">
                                            <a href="detail-own.php"
                                                class="font-23 menu-style text-white align-middle">
                                                <span class="lnr lnr-briefcase position-relative"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /User notification-->

                                <!-- user info-->
                                <div class="user-info align-right dropdown d-inline-block header-dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown"
                                        class=" menu-style dropdown-toggle">
                                        <div class="user-avatar d-inline-block">
                                            <img src="assets/img/nati.jpg" alt="user avatar"
                                                class="rounded-circle img-fluid" width="55">
                                        </div>
                                    </a>

                                    <!-- Notifications -->
                                    <div
                                        class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right">
                                        <a class="dropdown-item p-2" href="detail-own.php">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-user mr-3"></span>
                                                <span class="media-body text-truncate">
                                                    <span class="text-truncate">Profile</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="dropdown-item p-2" href="setting-admin.php">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-cog mr-3"></span>
                                                <span class="media-body text-truncate">
                                                    <span class="text-truncate">Settings</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="dropdown-item p-2" href="attendance.php">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-cog mr-3"></span>
                                                <span class="media-body text-truncate">
                                                    <span class="text-truncate">Attendance</span>
                                                </span>
                                            </span>
                                        </a>
                                         <form method=post action"side.php">
													<button type="submit" name="logout">Log out									</form>	
                                    </div>
                                    
                                    <!-- Notifications -->

                                </div>
                                <!-- /User info-->

                            </div>
                        </div>
                    </div>
                    <div class="d-block d-lg-none">
                        <a href="javascript:void(0)">
                            <span class="lnr lnr-user d-block display-5 text-white" id="open_navSidebar"></span>
                        </a>

                        <!-- Offcanvas menu -->
                        <div class="offcanvas-menu" id="offcanvas_menu">
                            <span
                                class="lnr lnr-cross float-left display-6 position-absolute t-1 l-1 text-white"
                                id="close_navSidebar"></span>
                            <div class="user-info align-center bg-theme text-center">
                                <a href="javascript:void(0)" class="d-block menu-style text-white">
                                    <div class="user-avatar d-inline-block mr-3">
                                        <img src="assets/img/profiles/img-6.jpg" alt="user avatar"
                                            class="rounded-circle img-fluid" width="55">
                                    </div>
                                </a>
                            </div>
                            <div class="user-notification-block align-center">
                                <div class="top-nav-search">
                                    <form>
                                        <input type="text" class="form-control" placeholder="Search here">
                                        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <div class="user-menu-items px-3 m-0">
                                <a class="px-0 pb-2 pt-0" href="index.html">
                                    <span class="media align-items-center">
                                        <span class="lnr lnr-home mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                            <span class="text-truncate text-left">Dashboard</span>
                                        </span>
                                    </span>
                                </a>
                                <a class="p-2" href="employees.html">
                                    <span class="media align-items-center">
                                        <span class="lnr lnr-users mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                            <span class="text-truncate text-left">Employees</span>
                                        </span>
                                    </span>
                                </a>
                                <a class="p-2" href="company.html">
                                    <span class="media align-items-center">
                                        <span class="lnr lnr-apartment mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                            <span class="text-truncate text-left">EMPOPS Company</span>
                                        </span>
                                    </span>
                                </a>
                                <a class="p-2" href="calendar-admin.php">
                                    <span class="media align-items-center">
                                        <span class="lnr lnr-calendar-full mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                            <span class="text-truncate text-left">Calendar</span>
                                        </span>
                                    </span>
                                </a>
                                <a class="p-2" href="leave.html">
                                    <span class="media align-items-center">
                                        <span class="lnr lnr-briefcase mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                            <span class="text-truncate text-left">Leave</span>
                                        </span>
                                    </span>
                                </a>


                                <a class="p-2" href="settings.html">
                                    <span class="media align-items-center">
                                        <span class="lnr lnr-cog mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                            <span class="text-truncate text-left">Settings</span>
                                        </span>
                                    </span>
                                </a>
                                <a class="p-2" href="employment.html">
                                    <span class="media align-items-center">
                                        <span class="lnr lnr-user mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                            <span class="text-truncate text-left">Profile</span>
                                        </span>
                                    </span>
                                </a>
                                <a class="p-2" href="login.html">
                                    <span class="media align-items-center">
                                        <span class="lnr lnr-power-switch mr-3"></span>
                                        <span class="media-body text-truncate text-left">
                                            <span class="text-truncate text-left">Logout</span>
                                        </span>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!-- /Offcanvas menu -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Top Header Section -->

</header>
<!-- /Header -->
			<!-- Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="card ctm-border-radius shadow-sm grow">
									<div class="card-body py-4">
										<div class="row">
											<div class="col-md-12 mr-auto text-left">
												<div class="custom-search input-group">
													<div class="custom-breadcrumb">
														<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
															<li class="breadcrumb-item d-inline-block"><a href="admin-dashboard.php" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Employees</li>
														</ol>
														<h4 class="text-dark">Employees</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow">
									<div class="user-info card-body">
										<div class="user-avatar mb-4">
											<img src="images/' . $row['file_name'] . '" alt="User Avatar" class="img-fluid rounded-circle" width="100">
										</div>
										<div class="user-details">
											<h4><b>Welcome ' . $row['name'] . '</b></h4>
											<p>' . $_SESSION['admin_id'] . '</p>
										</div>
									</div>
								</div>
                                


                                <!-- Sidebar -->
                                <div class="sidebar-wrapper d-lg-block d-md-none d-none">
                                    <div class="card ctm-border-radius shadow-sm grow border-none">
                                        <div class="card-body">
                                            <div class="row no-gutters">
                                                <div class="col-6 align-items-center text-center">
                                                    <a href="admin-dashboard.php" class="text-dark p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top">
                                                        <span class="lnr lnr-home pr-0 pb-lg-2 font-23"></span><span class="">Dashboard</span>
                                                    </a>                                               
                                                </div>
                                                <div class="col-6 align-items-center shadow-none text-center">                                          
                                                    <a href="employees.php" class="text-white active p-4 second-slider-btn ctm-border-right ctm-border-top">
                                                        <span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Employees</span>
                                                    </a>                                                
                                                </div>
                                                <div class="col-6 align-items-center shadow-none text-center">                                                
                                                    <a href="company-admin.php" class="text-dark p-4 ctm-border-right ctm-border-left">
                                                        <span class="lnr lnr-apartment pr-0 pb-lg-2 font-23"></span><span class="">EMPOPS Company</span>
                                                    </a>                                                
                                                </div>
                                                <div class="col-6 align-items-center shadow-none text-center">                                                
                                                    <a href="calendar-admin.php" class="text-dark p-4 ctm-border-right">
                                                        <span class="lnr lnr-calendar-full pr-0 pb-lg-2 font-23"></span><span class="">Calendar</span>
                                                    </a>                                                
                                                </div>
                                                <div class="col-6 align-items-center shadow-none text-center">                                          
                                                    <a href="leave.php" class="text-dark p-4 ctm-border-right ctm-border-left">
                                                        <span class="lnr lnr-briefcase pr-0 pb-lg-2 font-23"></span><span class="">Leave</span>
                                                    </a>                                            
                                                </div>
                                                
                                                <!-- New links: Attendance and Announcement -->
                                                <div class="col-6 align-items-center shadow-none text-center">                                          
                                                    <a href="attendance.php" class="text-dark p-4 ctm-border-right ctm-border-left">
                                                        <span class="lnr lnr-clock pr-0 pb-lg-2 font-23"></span><span class="">Attendance</span>
                                                    </a>                                                
                                                </div>
                                                <div class="col-6 align-items-center shadow-none text-center">                                          
                                                    <a href="announce-admin.php" class="text-dark p-4 ctm-border-right">
                                                        <span class="lnr lnr-bullhorn pr-0 pb-lg-2 font-23"></span><span class="">Announcement</span>
                                                    </a>                                                
                                                </div>
                                                <!-- End of New links -->
                                
                                                <div class="col-6 align-items-center shadow-none text-center">                                          
                                                    <a href="setting-admin.php" class="text-dark p-4 last-slider-btn1 ctm-border-right ctm-border-left">
                                                        <span class="lnr lnr-cog pr-0 pb-lg-2 font-23"></span><span class="">Settings</span>
                                                    </a>                                                
                                                </div>
                                                <div class="col-6 align-items-center shadow-none text-center">                                          
                                                    <a href="detail-own.php" class="text-dark p-4 last-slider-btn ctm-border-right">
                                                        <span class="lnr lnr-user pr-0 pb-lg-2 font-23"></span><span class="">Profile</span>
                                                    </a>                                                
                                                </div>
                                                <div class="col-6 align-items-center shadow-none text-center">                
                                                    <form method="POST" action="logout.php" class="text-dark p-4 ctm-border-right ctm-border-left">
                                                        <button type="submit" name="logout" class="btn btn-link p-0 m-0">
                                                            <span class="lnr lnr-exit pr-0 pb-lg-2 font-23"></span>
                                                            <span class="">Log out</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Sidebar -->                                
                                

							</aside>
						</div><div class="col-xl-9 col-lg-8  col-md-12">
						<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card grow">
							<div class="card-body">
								<ul class="list-group list-group-horizontal-lg">
									<li class="list-group-item text-center active button-5"><a href="admin-dashboard.php"
											class="text-white">Admin Dashboard</a></li>
								</ul>
							</div>
						</div>';
