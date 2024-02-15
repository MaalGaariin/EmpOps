<?php
require 'side_employee.php';
require 'assets/conn.php';
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

    <!-- Stylesheet For Announcements -->
    <link rel="stylesheet" href="assets/css/announce-style.css">
    

    <title>Announcement Dashboard</title>
    
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>
<br><br>';

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
$select = "SELECT * FROM announcement ORDER BY id DESC";
$query = mysqli_query($conn, $select) or die(mysqli_error($conn));
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        echo '<center><div class="announce-body">';
            echo '<div class="announce-card">
                <img src="images/' . $row['file'] . '" alt="Another Logo" width="10%" height="20%">
                <h3>' . $row['title'] . '</h3>
                <hr>
                <p>' . $row['content'] . '</p>
            </div>';
        echo '</div></center>';
    }
}

echo '<!-- Inner Wrapper -->
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

</body>

</html>';
?>
