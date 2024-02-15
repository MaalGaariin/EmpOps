<?php
require 'side_employee.php';
require 'assets/conn.php';
$id = $_SESSION['emp_id'];
$select = "SELECT * FROM employee WHERE id ='$id'";
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
$total = mysqli_num_rows($emp_query);
if (!isset($_SESSION['emp_id'])) {
    session_destroy();
    header('location:login.php');
}
echo '<!DOCTYPE html>
<html lang="en">
<br><br>
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
		

		<!-- Stylesheet For Announcements -->
		<link rel="stylesheet" href="/assets/css/announce-style.css">
		
		<title>Employees Dashboard</title>
		
		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		
			
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		
	</head>
	<body>
    <br><br>';
$attendance = "SELECT * FROM attendance WHERE employee_id ='$id'";
$attendance_query = mysqli_query($conn, $attendance);
echo '<h2 style="color: white;">Employee Attendance Records</h2>
    <table id="attendance-table">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>Location</th>
                <th>Status</th>
            </tr>
        </thead>        <tbody id="attendance-data">
';
if (mysqli_num_rows($attendance_query) > 0) {
    while ($row = mysqli_fetch_assoc($attendance_query)) {
        echo '<tr>
        <td>' . $row['employee_id'] . '</td>
       <td>' . $row['date'] . '</td>
        <td>' . $row['time'] . '</td>
        <td>' . $row['location'] . '</td>
        <td>' . $row['status'] . '</td>

        </tr>';
    }
} else {
    echo '<tr><td>There Is no such data.</td></tr>';
}
echo '<!-- Attendance will be loaded here -->
        </tbody>
    </table>

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
    <script src="attendance_script.js"></script>
    
</body>';
?>