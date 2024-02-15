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
    
    <title>Employees</title>

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
										<li class="list-group-item text-center active button-5"><a href="employees.php" class="text-white">All</a></li>
										<li class="list-group-item text-center button-6"><a class="text-dark" href="team-admin.php">Teams</a></li>
										<li class="list-group-item text-center button-6"><a class="text-dark" href="office.php">Offices</a></li>
									</ul>
								</div>
							</div>
							<div class="card shadow-sm grow ctm-border-radius">
								<div class="card-body align-center">
									<h4 class="card-title float-left mb-0 mt-2">'.$total.' People</h4>
									<ul class="nav nav-tabs float-right border-0 tab-list-emp">
										<li class="nav-item">
											<a class="nav-link active border-0 font-23 grid-view" href="employees.php"><i class="fa fa-th-large" aria-hidden="true"></i></a>
										</li>
										<li class="nav-item">
											<a class="nav-link border-0 font-23 list-view" href="employees-list-admin.php"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
										</li>
										<li class="nav-item pl-3">
											<a href="add-employee.php" class="btn btn-theme button-1 text-white ctm-border-radius p-2 add-person ctm-btn-padding"><i class="fa fa-plus"></i> Add Person</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="ctm-border-radius shadow-sm grow card">
								<div class="card-body">
									<!--Content tab-->
									<div class="row people-grid-row">
										<div class="col-md-6 col-lg-6 col-xl-4">
										<div class="card widget-profile"><div class="card-body">
											';
													$recordsPerPage=5;
                                      $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                      $startFrom = ($page - 1) * $recordsPerPage;
                                     $totalRecordsQuery = "SELECT COUNT(*) as total FROM employee";
                                      $totalRecordsResult = mysqli_query($conn, $totalRecordsQuery);
                                      $totalRecords = mysqli_fetch_assoc($totalRecordsResult)['total'];

                                       $totalPages = ceil($totalRecords / $recordsPerPage);
                                       $recordsQuery = "SELECT * FROM employee LIMIT $startFrom, $recordsPerPage";
                                         $recordsResult = mysqli_query($conn, $recordsQuery);

                                  if(mysqli_num_rows($recordsResult) > 0) {
                                   while ($employee = mysqli_fetch_assoc($recordsResult)) {
														echo'
												
														<div class="pro-widget-content text-center"><div class="profile-info-widget">
															<a href="employment.php?id='.$employee['id'].'" class="booking-doc-img">
																<img src="images/'.$employee['file_name'].'" alt="'.$employee['name'].'">
															</a>
															<div class="profile-det-info">
																<h4><a href="employment.php?id='.$employee['id'].'" class="text-primary">'.$employee['name'].'</a></h4>
																<div>
																	<p class="mb-0"><b>'.$employee['team'].'</b></p>
																	<p class="mb-0 ctm-text-sm">'.$employee['email'].'</p>
																</div>
															</div>
														';
												}}
												echo"</div>
												</div></div>
								<div class='col-lg-6 col-md-12 d-flex'>
									
		</div>
		<!-- Inner Wrapper -->
<div class='pagination'>";
                                       for ($i = 1; $i <= $totalPages; $i++) {
                                       echo "<center><a href='employees.php?page=$i'>$i</a></center>";
}
												echo'</div>
											</div>
										</div>
										</div>
										</div>
										</div>';
									
										echo'</div>
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
		
		<!-- Sticky sidebar JS -->
		<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>		
		<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>		
					
		<!-- Custom Js -->
		<script src="assets/js/script.js"></script>

	</body>
</html>';
?>