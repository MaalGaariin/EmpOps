<?php
require 'side.php';
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
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/select2.min.css">
		
		<!-- Full Calander CSS -->
        <link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.min.css">
		
		<!-- Custom CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		
		<title>Calendar Page</title>

		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

			
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	  
	</head>
	<body>
	<br><br>

	<div class="col-xl-9 col-lg-8  col-md-12">
		<div class="card ctm-border-radius shadow-sm grow">
			<div class="card-body">
				<div id="calendar"></div>
			</div>
		</div>
	</div>
		
		<!-- Add Event Modal -->
		<div id="add_event" class="modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Event</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label>Event Name <span class="text-danger">*</span></label>
								<input class="form-control" type="text">
							</div>
							<div class="form-group">
								<label>Event Date <span class="text-danger">*</span></label>
								<div class="cal-icon">
									<input class="form-control datetimepicker" type="text">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Category</label>
								<select class="form-control select" name="category">
									<option value="bg-danger">Danger</option>
									<option value="bg-success">Success</option>
									<option value="bg-purple">Purple</option>
									<option value="bg-primary">Primary</option>
									<option value="bg-info">Info</option>
									<option value="bg-warning">Warning</option>
								</select>
							</div>
							<div class="submit-section text-center">
								<button class="btn btn-theme ctm-border-radius text-white submit-btn button-1">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Event Modal -->
		
		<!-- Add Event Modal -->
		<div class="modal fade none-border" id="my_event" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add Event</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body"></div>
					<div class="modal-footer justify-content-center">
						<button type="button" class="btn btn-theme ctm-border-radius text-white save-event submit-btn button-1">Create event</button>
						<button type="button" class="btn btn-danger ctm-border-radius delete-event submit-btn" data-dismiss="modal">Delete</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Event Modal -->
		
		<!-- Add Category Modal -->
		<div class="modal fade" id="add_new_event">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add Category</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label>Category Name</label>
								<input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" >
							</div>
							<div class="form-group mb-0">
								<label>Choose Category Color</label>
								<select class="form-control select form-white" data-placeholder="Choose a color..." name="category-color">
									<option value="success">Success</option>
									<option value="danger">Danger</option>
									<option value="info">Info</option>
									<option value="primary">Primary</option>
									<option value="warning">Warning</option>
									<option value="inverse">Inverse</option>
								</select>
							</div>
							<div class="submit-section text-center">
								<button type="button" class="btn btn-theme ctm-border-radius text-white save-category submit-btn mt-3 button-1" data-dismiss="modal">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Category Modal -->
				

		<!-- Inner Wrapper -->
		
  
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
     
		<!-- jQuery -->
		<script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
				
		<!-- Datetimepicker JS -->
		<script src="assets/plugins/select2/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/plugins/select2/select2.min.js"></script>
		
		<!-- Full Calendar JS -->
        <script src="assets/js/jquery-ui.min.js"></script>
        <script src="assets/plugins/fullcalendar/fullcalendar.min.js"></script>
        <script src="assets/plugins/fullcalendar/jquery.fullcalendar.js"></script>
		
		<!-- Sticky sidebar JS -->
		<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>		
		<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>		
			
		<!-- Custom Js -->
		<script src="assets/js/script.js"></script>
		
	</body>';
?>