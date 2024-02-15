<?PHP
echo'<!DOCTYPE html>
<html lang="en">
  <head>
  
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
    
    <title>Profile</title>

    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>';
require 'side_employee.php';
echo'						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white p-4 mb-4 card">
									<ul class="list-group list-group-horizontal-lg">
										<li class="list-group-item text-center active button-5"><a href="details.php" class="text-white">Detail</a></li>
										<li class="list-group-item text-center button-6"><a class="text-dark" href="settings.php">Settings</a></li>
									</ul>
								</div>
							<div class="row">
								<div class="col-xl-4 col-lg-6 col-md-6 d-flex">
									<div class="card flex-fill ctm-border-radius shadow-sm grow">
										<div class="card-header">
											<h4 class="card-title mb-0">Basic Information</h4>
										</div>
										<div class="card-body text-center">
											<p class="card-text mb-3"><span class="text-primary"> Name :</span><b>	'.$row['name'].'</b></p>
											<p class="card-text mb-3"><span class="text-primary"> Team :</span><b>	'.$row['team'].'</b></p>
											<p class="card-text mb-3"><span class="text-primary">Nationality :</span>'.$row['nationality'].'</p>
											<p class="card-text mb-3"><span class="text-primary">Date of Birth :</span>'.$row['birth'].'</p>
											<p class="card-text mb-3"><span class="text-primary">Gender : </span>'.$row['gender'].'</p>
										<p class="card-text mb-3"><span class="text-primary">Blood Group :</span>'.$row['blood'].'</p>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-lg-6 col-md-6 d-flex">
									<div class="card flex-fill  ctm-border-radius shadow-sm grow">
										<div class="card-header">
											<h4 class="card-title mb-0">Contact</h4>
										</div>
										<div class="card-body text-center">
											<p class="card-text mb-3"><span class="text-primary">Phone Number : </span>0'.$row['phone'].'</p>
											<p class="card-text mb-3"><span class="text-primary">Personal Email : </span>'.$row['email'].'</p>
											<p class="card-text mb-3"><span class="text-primary">Secondary Number : </span>0'.$row['phone2'].'</p>
											<p class="card-text mb-3"><span class="text-primary">Web Site : </span><a href="'.$row['web'].'">'.$row['web'].'</a></p>
											<p class="card-text mb-3"><span class="text-primary">Linkedin : </span><a href="'.$row['linkedin'].'">'.$row['linkedin'].'</a></p>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-lg-12 col-md-12">
									<div class="row">
										<div class="col-xl-12 col-lg-6 col-md-6 d-flex">
											<div class="card ctm-border-radius shadow-sm grow flex-fill">
												<div class="card-header">
													<h4 class="card-title mb-0">Dates</h4>
												</div>
												<div class="card-body text-center">
													<p class="card-text mb-3"><span class="text-primary">Start Date : </span>'.$row['start'].'</p>
													<p class="card-text mb-3"><span class="text-primary">Visa Expiry Date : </span>'.$row['visa'].'</p>
												</div>
											</div>
										</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/Content-->
			
		</div>
		<!-- Inner Wrapper -->
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
		
		
		<!-- jQuery -->
		<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="assets/plugins/select2/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>		
		
		<!-- Sticky sidebar JS -->
		<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>		
		<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>		
			
		<!-- Custom Js -->
		<script src="assets/js/script.js"></script>

	</body>

</html>';
?>