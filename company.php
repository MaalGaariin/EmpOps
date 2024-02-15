<?php
require 'side_employee.php';
require 'assets/conn.php';
echo '<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="attendance_styles.css">
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
        
        <title>Employees Page</title>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
       
        <![endif]-->
        
    </head>
	<body>
	<br><br>';
$company = "SELECT * FROM company";
$comp_query = mysqli_query($conn, $company) or die(mysqli_error($conn));
if (mysqli_num_rows($comp_query) > 0) {
	$row_company = mysqli_fetch_assoc($comp_query);
	echo '<div class="col-xl-9 col-lg-8 col-md-12">
							<div class="row">
								<div class="col-md-7 d-flex">
									<div class="card ctm-border-radius shadow-sm grow flex-fill">
										<div class="card-header">
											<h4 class="card-title mb-0">' .
		$row_company['name']
		. '</h4>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-md-6">
													<p><span class="text-primary">Register Number : </span>' . $row_company['r_n'] . '</p>
													<p><span class="text-primary">Incorporation Date : </span>' . $row_company['i_date'] . '</p>
													<p><span class="text-primary">VAT Number : </span>' . $row_company['vat'] . '</p>
												</div>
												<div class="col-md-6">
													<p>
														<span class="text-primary">Address:</span><br>' .
		$row_company['address']
		. '
													</p>
													
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-5 d-flex">
									<div class="card ctm-border-radius shadow-sm grow flex-fill">
										<div class="card-header">
											<h4 class="card-title mb-0">
												Contact
											</h4>
										</div>
										<div class="card-body">
											<div class="input-group mb-3">
												<input type="text" class="form-control" value="0' . $row_company['phone'] . '">
											</div>
											<div class="input-group mb-3">
												<input type="text" class="form-control" value="' . $row_company['email'] . '">
											</div>
											<div class="input-group mb-0">
												<input type="email" class="form-control" value="' . $row_company['web'] . '">
											</div>
										</div>
									</div>
								</div>';
}
echo '<div class="col-md-12">
									<div class="company-doc">
										<div class="card ctm-border-radius shadow-sm grow">
											<div class="card-header">
												<h4 class="card-title d-inline-block mb-0">
													Documents
												</h4>
											</div>
											<div class="card-body">
												<div class="employee-office-table">
													<div class="table-responsive">
														<table class="table custom-table">
															<thead>
																<tr>
																	<th>Name</th>
																	<th>Date</th>
																	<th>Size</th>
																	<th class="text-right">Action</th>
																</tr>
															</thead>';
$doc = "SELECT * FROM document";
$doc_query = mysqli_query($conn, $doc) or die(mysqli_error($conn));
if (mysqli_num_rows($doc_query) > 0) {
	while ($row_doc = mysqli_fetch_assoc($doc_query)) {
		echo '<tbody>
																<tr>
																	<td><a href="' . $row_doc['link'] . '" class="text-primary">' . $row_doc['name'] . '</a></td>
																	<td>' . $row_doc['date'] . '</td>
																	<td>' . $row_doc['size'] . '</td>
																	<td class="text-right text-danger">
																		<div class="table-action">
																			<a href="' . $row_doc['link'] . '" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
																				 View
																			</a>
																		</div>
																	</td>
																</tr>
															</tbody>';
	}
}
echo '</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 d-flex">
									<div class="card ctm-border-radius shadow-sm grow flex-fill">
										<div class="card-header">
											<div class="d-inline-block">
												<h4 class="card-title mb-0">' . $row_company['name'] . '</h4>
												<p class="mb-0 ctm-text-sm">Head Office</p>
											</div>
											<div class="d-inline-block float-right" data-toggle="modal" data-target="#editOffice">
											</div>
										</div>
										<div class="card-body">
											<h4 class="card-title">Members</h4>';
$members = "SELECT * FROM employee LIMIT 15";
$members_query = mysqli_query($conn, $members) or die(mysqli_error($conn));
if (mysqli_num_rows($members_query) > 0) {
	while ($row = mysqli_fetch_assoc($members_query)) {
		if ($row['file_name'] == 'a') {
			$profile = "images/img-2.jpg";
		} else {
			$profile = $row['file_name'];
		}
		echo '<a href="employment.html"><span class="avatar" data-toggle="tooltip" data-placement="top" title="' . $row['name'] . '"><img alt="avatar image" src="images/' . $profile . '" class="img-fluid"></span></a>';
	}
}
echo '</div>
									</div>
								</div>
								<div class="col-md-6 d-flex">
									<div class="card shadow-sm grow ctm-border-radius flex-fill">
									<div class="card-header">
										<h4 class="card-title mb-0 d-inline-block">Overview </h4>
									</div>';
$team = "SELECT * FROM team";
$team_query = mysqli_query($conn, $team) or die(mysqli_error($conn));
if (mysqli_num_rows($team_query) > 0) {
	$teams = mysqli_num_rows($team_query);
}
$emp = "SELECT * FROM employee WHERE status=1";
$emp_query = mysqli_query($conn, $emp) or die(mysqli_error($conn));
if (mysqli_num_rows($emp_query) > 0) {
	$employee = mysqli_num_rows($emp_query);
}
echo '<div class="card-body">
										<div class="row">
											<div class="col-md-6 col-6 text-center">
												<h5 class="btn btn-outline-primary mt-3"><b>' . $teams . '</b></h5>
												<p class="mb-3">Teams</p>
											</div>
											<div class="col-md-6 col-6 text-center">
												<h5 class="btn btn-outline-primary mt-3"><b>' . $employee . '</b></h5>
												<p class="mb-3">People</p>
											</div>
										</div>
										<div class="text-center">
											<a href="employees-dashboard.php" class="btn btn-theme text-white ctm-border-radius mt-2 button-1">People Directory</a>
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
		
		<!--  add office The Modal -->
		<div class="modal fade" id="addOffice">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Create a New Office</h4>
						<p>Offices allow you to group people by location. Offices can subscribe to different public holidays, helping you to localize people\'s time off allowances.</p>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Name">
						</div>
						<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme ctm-border-radius text-white float-right button-1">Add</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="editOffice">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Edit Office</h4>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Office Name">
						</div>
						<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme text-white ctm-border-radius float-right button-1">Save</button>
					</div>
				</div>
			</div>
		</div>
		
		<!--Delete The Modal -->
		<div class="modal fade" id="delete">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-4">Are You Sure Want to Delete?</h4>
						<button type="button" class="btn btn-danger text-white text-center ctm-border-radius mb-2 mr-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme text-white text-center ctm-border-radius mb-2 button-1" data-dismiss="modal">Delete</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- New Team The Modal -->
		<div class="modal fade" id="add-information" role="document">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					<div class="modal-body style-add-modal">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Add Company Information</h4>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" type="text" placeholder="Company Name">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" type="text" placeholder="Registered Company Number">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control datetimepicker" type="text" placeholder="Incorporation Date">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" type="text" placeholder="Vat Number">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" type="text" placeholder="Address Line1">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" type="text" placeholder="Address Line2">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" type="text" placeholder="City">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" type="text" placeholder="Country">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" type="text" placeholder="Post-Code">
							</div>
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme ctm-border-radius text-white float-right button-1">Add</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- New Folder The Modal -->
		<div class="modal fade" id="NewFolder">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Create New Folder</h4>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Name">
						</div>
						<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme ctm-border-radius text-white float-right button-1">Add</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- add document The Modal -->
		<div class="modal fade" id="addDocument">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Upload Document</h4>
						<div class="form-group">
							<input type="file" class="form-control">
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme ctm-border-radius text-white float-right button-1">Upload</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- add office The Modal -->
		<div class="modal fade" id="addOffice1">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Add Office</h4>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Name">
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme ctm-border-radius text-white float-right button-1">Add</button>
					</div>
				</div>
			</div>
		</div>
				
		<!-- jQuery -->
		<script src="assets/js/jquery-3.2.1.min.js"></script>
		
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