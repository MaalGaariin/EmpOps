<?php
require 'assets/conn.php';
if(isset($_POST['submit'])){
$id=$_POST['id'];
$password=$_POST['password'];
$select="SELECT * FROM employee WHERE id ='$id' AND password='$password' AND status='1'";
$query=mysqli_query($conn,$select) or die(mysqli_error($conn));
$select_admin="SELECT * FROM admin WHERE id ='$id' AND password='$password' AND status='1'";
$admin_query=mysqli_query($conn,$select_admin) or die(mysqli_error($conn));
if(mysqli_num_rows($query)>0){
	$_SESSION['emp_id']=$_POST['id'];
	header('location:employees-dashboard.php');
}elseif(mysqli_num_rows($admin_query)>0){
	$_SESSION['admin_id']=$_POST['id'];
	header('location:admin-dashboard.php');
}else{
	echo"<script>alert('ID OR PASSWORD IS INCORRECT')</script>";
}
}
echo'<!DOCTYPE html>
<html lang="en">
	<head>
	
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Favicon -->
		<link rel="icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Include font awesome for icons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Linearicon Font -->
		<link rel="stylesheet" href="assets/css/lnr-icon.css">
				
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		
		<!-- Custom CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		
		<title>Login Page</title>
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		
	</head>
	<body>
			
			<!-- Loader -->
			<div id="loader-wrapper">
				
				<div class="loader">
				  <div class="dot"></div>
				  <div class="dot"></div>
				  <div class="dot"></div>
				  <div class="dot"></div>
				  <div class="dot"></div>
				</div>
			</div>

		<!-- Main Wrapper -->
		<div class="inner-wrapper login-body">
			<div class="login-wrapper">
				<div class="container">
					<div class="loginbox shadow-sm grow">
						<div class="login-left">
							<img class="img-fluid" src="assets/img/empops.png" alt="Logo">
						</div>
						<div class="login-right">
							<div class="login-right-wrap">
								<h1>Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>
								
								<!-- Form -->
								<form action="login.php" method="POST">
								    <div class="form-group">
								        <input class="form-control" name="id" type="name" placeholder="ID" required>
								    </div>
								    <div class="form-group">
								        <div class="password-toggle">
								            <input class="form-control" type="password" name="password" placeholder="Password" required>
								            <i class="fas fa-eye-slash toggle-password" onclick="togglePasswordVisibility(this)"></i>
								        </div>
								    </div>
								    <div class="form-group">
								        <button class="btn btn-theme button-1 text-white ctm-border-radius btn-block" style="background-color:blue" type="submit" name="submit">Login</button>
								    </div>
								</form>
							    <div class="form-group">
								    <button class="btn btn-theme button-1 text-white ctm-border-radius btn-block" style="background-color:chocolate"  type="button" onclick="redirectToHome()">Go Home</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Main Wrapper -->
		
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

		<!-- JavaScript for toggling password visibility -->
		<script>
		    function togglePasswordVisibility(icon) {
		        const passwordInput = icon.previousElementSibling;
		        if (passwordInput.type === "password") {
		            passwordInput.type = "text";
		            icon.classList.remove("fa-eye");
		            icon.classList.add("fa-eye-slash");
		        } else {
		            passwordInput.type = "password";
		            icon.classList.remove("fa-eye-slash");
		            icon.classList.add("fa-eye");
		        }
		    }
		</script>
		
		<!-- Login Button Redirect -->
		<script>
		    function redirectToHome() {
		        window.location.href = "./index.php";
		    }
		</script>

	</body>
</html>';
?>