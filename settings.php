<?php
require 'side_employee.php';
if(isset($_POST['change'])){
$current=$_POST['current'];
$password=$_POST['password'];
$repeat=$_POST['repeat'];
$select="SELECT * FROM employee WHERE id='$id' AND password='$current'";
$query=mysqli_query($conn,$select) or die(mysqli_error($conn));
if($password == $repeat){
if(mysqli_num_rows($query)>0){
	$change="UPDATE employee SET password ='$password' WHERE id ='$id'";
	$submit=mysqli_query($conn,$change) or die(mysqli_error($conn));
	echo"Updated Successesfully";
}else{
	echo"Password Error";
}
}else{
	echo"Password and Repeat Password is <br> not the same";
}}
echo'					<div class="col-xl-9 col-lg-8  col-md-12">
						<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white p-4 mb-4 card">
							<ul class="list-group list-group-horizontal-lg">
								<li class="list-group-item text-center button-6"><a href="details.php"
										class="text-dark">Detail</a></li>
								

								<li class="list-group-item text-center active button-5"><a class="text-white"
										href="settings.php">Settings</a></li>
							</ul>
						</div>
						<div class="row">
							<div class="col-lg-6 d-flex">
								<div class="card ctm-border-radius shadow-sm grow flex-fill">
									<div class="card-header">
										<h4 class="card-title mb-0">Change Password</h4>
										<span class="ctm-text-sm">Your password needs to be at least 8 characters
											long.</span>
									</div>
									<div class="card-body">
										<div class="form-group">
										<form method=post action='.$_SERVER['PHP_SELF'].'>
											<input type="password" name="current" class="form-control" placeholder="Current Password" minlength=8 required>
										</div>
										<div class="form-group">
											<input type="password" name="password" class="form-control" placeholder="New Password"
												id="pwd" minlength=8 required>
										</div>
										<div class="form-group">
											<input type="password" name="repeat" class="form-control" placeholder="Repeat Password" minlength=8 required>
										</div>
										<div class="text-center">
							<button type="submit" name="change" class="btn btn-theme button-1 ctm-border-radius text-white text-center">Change
												My Password</button></form>
										</div>
									</div>
								</div>
							</div>
							
		<!--/Content-->
	</div>
	<!-- Inner Wrapper -->

	<div class="sidebar-overlay" id="sidebar_overlay"></div>

	<!-- jQuery -->
	<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
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