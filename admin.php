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
    
    <title>Admin Dashboard</title>

    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>';
require 'assets/conn.php';
require 'side.php';
echo'<div class="col-xl-9 col-lg-8  col-md-12">
						<div class="card ctm-border-radius shadow-sm grow">
							<div class="card-header">
								<h4 class="card-title mb-0 d-inline-block">Your Admin</h4>
							</div>
							<div class="card-body">
								<a class="mb-0 cursor-pointer d-block">
								<span class="avatar" data-toggle="tooltip" data-placement="top" title="'.$row['name'].'"><img src="assets/img/nati.jpg" alt="Natnael garomsa" class="img-fluid"></span>
								<span class="ml-4">1 Admin</span>
								</a>
							</div>
						</div>
						<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white card">
								<div class="card-body">
									<div class="list-group list-group-horizontal-lg" id="v-pills-tab" role="tablist">
										<a class=" active list-group-item" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Manage Details</a>
									</div>
								</div>
							</div>
						<div class="card ctm-border-radius shadow-sm grow">
							<div class="card-body">
								<div class="tab-content" id="v-pills-tabContent">
								
									<!-- Tab1-->
									<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
										<div class="table-responsive">
											<table class="table admin-table">
												<thead>
													<tr>
														<th class="pt-0">Rule Description</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<div>
																<h6 class="mb-0">Basic Information</h6>
																<p class="ctm-text-sm">Preferred Name, and birthday </p>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div>
																<h6 class="mb-0">Personal Information</h6>
																<p class="ctm-text-sm">Nationality, full date of birth, and home address </p>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div>
																<h6 class="mb-0">Contact Information</h6>
																<p class="ctm-text-sm">Email And Phone Number </p>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div>
																<h6 class="mb-0">Login Information</h6>
																<p class="ctm-text-sm">Login email </p>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div>
																<h6 class="mb-0">Social Media</h6>
																<p class="ctm-text-sm">Web Site </p>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div>
																<h6 class="mb-0">Company Information</h6>
																<p class="ctm-text-sm">Roll and Employment type </p>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div>
																<h6 class="mb-0">Working Week</h6>
																<p class="ctm-text-sm">View or Manage the days worked </p>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div>
																<h6 class="mb-0">Key Dates</h6>
																<p class="ctm-text-sm">
																	Keep track of important occasions for people in your team. Such as start date, probation date, or visa expiration
																</p>
															</div>
														</td>
													</tr>
													<tr>
														<td class="pb-0">
															<div>
																<h6 class="mb-0">Manage Key Date Types</h6>
																<p class="ctm-text-sm">
																	Create and manage all date types that can be applied to anyone in the company.
																</p>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<!-- /Tab1-->
									
									<!-- Tab2-->
									<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
										<div class="table-responsive">
											<table class="table admin-table">
												<thead>
													<tr>
														<th class="pt-0">Rule Description</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															
														
															<div class="custom-control custom-switch">
																<input type="checkbox" class="custom-control-input" id="switch19" checked>
																<label class="custom-control-label" for="switch19"></label>
															</div>
														</td>
													</tr>
													<tr>
														
														<td>
															<div class="custom-control custom-switch">
																<input type="checkbox" class="custom-control-input" id="switch20" checked>
																<label class="custom-control-label" for="switch20"></label>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															
														<td class="pb-0">
															<div>
																<h6 class="mb-0">Manage Working From Home</h6>
																<p class="ctm-text-sm">
																	Create, edit, or delete working from home requests for people in their team
																</p>
															</div>
														</td>
														<td class="pb-0">
															<div class="custom-control custom-switch">
																<input type="checkbox" class="custom-control-input" id="switch22" checked>
																<label class="custom-control-label" for="switch22"></label>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<!-- /Tab2 -->
									
									<!-- Tab3 -->
									<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
										<div class="table-responsive">
											<table class="table admin-table">
												<thead>
													<tr>
														<th class="pt-0">Rule Description</th>
														<th class="pt-0">Manage</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pb-0">
															<div>
																<h6 class="mb-0">Salary</h6>
																<p class="ctm-text-sm">View or manage salaries </p>
															</div>
														</td>
														<td class="pb-0">
															<div class="custom-control custom-switch">
																<input type="checkbox" class="custom-control-input" id="switch23" checked>
																<label class="custom-control-label" for="switch23"></label>
															</div>
														</td>
														<td class="pb-0">
															<div class="custom-control custom-switch">
																<input type="checkbox" class="custom-control-input" id="switch24" checked>
																<label class="custom-control-label" for="switch24"></label>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<!-- /Tab3 -->
									
									<!-- Tab4 -->
									<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
										<div class="table-responsive">
											<table class="table admin-table">
												<thead>
													<tr>
														<th class="pt-0">Rule Description</th>
													</tr>
												</thead>
											</table>
										</div>
									</div>
									<!-- /Tab5 -->
									
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