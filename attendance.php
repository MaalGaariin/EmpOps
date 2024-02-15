<?php
require 'side.php';
require 'assets/conn.php';
$id=$_SESSION['admin_id'];
$select="SELECT * FROM admin WHERE id ='$id'";
$query=mysqli_query($conn,$select) or die(mysqli_error($conn));
if(mysqli_num_rows($query)>0){
    $row=mysqli_fetch_assoc($query);
}
if(isset($_POST['logout'])){
    session_destroy();
    header('location:login.php');
}
$emp="SELECT * FROM employee";
$emp_query=mysqli_query($conn,$emp) or die(mysqli_error($conn));
$com="SELECT * FROM company";
$com_query=mysqli_query($conn,$com) or die(mysqli_error($conn));
$row_com=mysqli_fetch_assoc($com_query);
$total=mysqli_num_rows($emp_query);
if(!isset($_SESSION['admin_id'])){
    session_destroy();
    header('location:login.php');
}
if(!isset($_SESSION['admin_id'])){
    session_destroy();
    header('location:login.php');
}
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
        
        <title>Employees Page</title>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
       
        <![endif]-->
        
    </head>
    <body>
    <br>
    <br>
      

        <form method="POST" action="process.php">
    <h1>Employee Attendance</h1>

    <div id="attendance-form">
        <div class="container">
            <label for="employee-id">Employee ID:</label>
            <input type="text" id="employee-id" name="employee-id" required>
            <br>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="'.date('Y-m-d').'" required>
            <br>
            <label for="time">Time:</label>
            <input type="time" id="time" name="time" value="'.time().'" required>
            <br>
            
            <div class="location">
                <label for="location">Location:</label>
                <select id="location" name="location" required>
                    <option value="remote">Remote/Home</option>
                    <option value="office">Office/On-site</option>
                </select>
            </div>
            <br>

            <div class="status">
                <label for="status">Status:</label>
                <select id="status" name="status" required>
                    <option value="present">Present</option>
                    <option value="late">Late</option>
                    <option value="absent">Absent</option>
                    <option value="half-day">Half-day</option>
                    <option value="leave">Leave</option>
                </select>
            </div>
            <button class="submit" type="submit" name="attend">Submit Attendance</button>
        </div>
    </div>
    </form>
    <div id="date-selection">
    <form method="post" action="'.$_SERVER['PHP_SELF'].'">
        <label for="view-date">View Attendance for Date:</label>
        <input type="date" id="view-date" name="view-date" required>
        <button type="submit" name="view">View Attendance</button></form>
    </div>';
    if(isset($_POST['view'])){
   $date=$_POST['view-date'];
    }
    if(!isset($date)){
    $date=date('Y-m-d');
}
$attendance="SELECT * FROM attendance WHERE date ='$date'";
$attendance_query=mysqli_query($conn,$attendance);
  echo "<h2>Attendance Records on Date: {$date}</h2>"; 
  echo '
  <table id="attendance-table">
      <thead>
          <tr>
              <th>Employee ID</th>
              <th>Date</th>
              <th>Time</th>
              <th>Location</th>
              <th>Status</th>
          </tr>
      </thead>        
      <tbody id="attendance-data">
';
      if(mysqli_num_rows($attendance_query)>0){
          while ($row=mysqli_fetch_assoc($attendance_query)) {
      echo'<tr>
      <td>'.$row['employee_id'].'</td>
     <td>'.$row['date'].'</td>
      <td>'.$row['time'].'</td>
      <td>'.$row['location'].'</td>
      <td>'.$row['status'].'</td>

      </tr>';
  }}else{
      echo'<tr><td>There Is no such data.</td></tr>';
  }
          echo'<!-- Attendance will be loaded here -->
      </tbody>
  </table>

  
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

  <script src="attendance_script.js"></script>
</body>

</html>';
?>
