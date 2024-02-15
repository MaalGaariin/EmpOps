<?php
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
    
    <title>Settings</title>

    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>';
require 'side.php';
echo'<div class="col-xl-9 col-lg-8 col-md-12">
							<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white card">
									<div class="card-body">
										<ul class="list-group list-group-horizontal-lg">
										<li class="list-group-item text-center button-6"><a class="text-dark" href="detail-own.php">Details</a></li>
<li class="list-group-item text-center active button-5"><a href="setting-admin.php" class="text-white">Settings</a></li>
										</ul>
									</div>
								</div>
								
								<div class="col-md-6 d-flex">
									<div class="card ctm-border-radius shadow-sm flex-fill grow">
										<div class="card-header">
											<h4 class="card-title mb-0">
												Change Password
											</h4>
										</div>
										<div class="card-body">
											<form method=post action="process.php">
												<div class="form-group">
													<label>Current Password</label>
													<input type="password" name="current" class="form-control" required>
												</div>
													<input type="hidden" name="id" value="'.$id.'" required>
												<div class="form-group">
													<label>New Password</label>
													<input type="password" name="new" class="form-control" minlength=8 required>
												</div>
												<div class="text-center">
													<button type="submit" class="btn btn-theme button-1 ctm-border-radius text-white" name="changea">Save Changes</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>			
		</div>		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
				
		<!-- jQuery -->
		<script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>	
		
		<!-- Sticky sidebar JS -->
		<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>		
		<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>		
			
		<!-- Custom Js -->
		<script src="assets/js/script.js"></script>
			
	</body>
</html>';
?>