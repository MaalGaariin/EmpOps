<?php
require 'side.php';
require 'assets/conn.php';
echo'<!DOCTYPE html>
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

        
        <title>Announcement Page</title>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
       
        <![endif]-->
        
    </head>
	<body>
	<br><br>';
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
$emp = "SELECT * FROM admin";
$emp_query = mysqli_query($conn, $emp) or die(mysqli_error($conn));
$total = mysqli_num_rows($emp_query);
if (!isset($_SESSION['admin_id'])) {
    session_destroy();
    header('location:login.php');
}
$select = "SELECT * FROM announcement ORDER BY id DESC";
$query = mysqli_query($conn, $select) or die(mysqli_error($conn));
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        echo '<center><div class="announce-body">
        <div class="announce-card">
            <img src="images/' . $row['file'] . '" alt="Another Logo" width="10%" height="20%">
            <h3>' . $row['title'] . '</h3>
            <hr>
            <p>' . $row['content'] . '</p>
            <form method="POST" action="process.php">
            <input type="hidden" name="id" value="' . $row['id'] . '">
            <button type="submit" class="delete-btn" name="delete_announce">Delete</button><br><br></form>
        </div>
    </div></center>';
    }
}

echo '
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

<script src="attendance_script.js"></script>';
echo '</body>
</html>';
?>
