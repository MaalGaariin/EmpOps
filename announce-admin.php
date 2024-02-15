<?php
require 'assets/conn.php';
echo'<link rel="icon" type="image/x-icon" href="assets/img/favicon.png">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        
        <!-- Linearicon Font -->
        <link rel="stylesheet" href="assets/css/lnr-icon.css">
                
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
                
        <!-- Custom CSS -->

        <!-- Stylesheet For Announcements -->
        <link rel="stylesheet" href="/assets/css/announce-style.css">
        
        <title>Employees Dashboard</title>
        
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <style>
        .button{
            display:inline-block;
            padding:10px 20px;
            background-color:yellow;
            color:black;
            text-decoration:none;
            border-radius:4px;
        }
        .button:hover{
            background-color:blue;
        }
    </style>';
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
$emp="SELECT * FROM admin";
$emp_query=mysqli_query($conn,$emp) or die(mysqli_error($conn));
$total=mysqli_num_rows($emp_query);
if(!isset($_SESSION['admin_id'])){
    session_destroy();
    header('location:login.php');
}
echo'<a href="admin-dashboard.php"class="button">Back To Your DashBoard</a>';
$select="SELECT * FROM announcement ORDER BY id DESC";
$query=mysqli_query($conn,$select) or die(mysqli_error($conn));
if(mysqli_num_rows($query)>0){
    while($row=mysqli_fetch_assoc($query)){
echo'<center><div class="announce-body">
        <div class="announce-card">
            <img src="images/'.$row['file'].'" alt="Another Logo" width="10%" height="20%">
            <h3>'.$row['title'].'</h3>
            <hr>
            <p>'.$row['content'].'</p>
            <form method="POST" action="process.php">
            <input type="hidden" name="id-" value="'.$row['id'].'">
            <button type="submit" class="delete-btn" name="delete_announce">Delete</button><br><br></form>
        </div>
    </div></center>';
}}
echo'</body>

</html>';
?>