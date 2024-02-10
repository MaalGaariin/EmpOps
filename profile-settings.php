<?php
require 'side.php';
$slug=$_GET['id'];
$emp="SELECT * FROM employee WHERE id='$slug'";
$emp_query=mysqli_query($conn,$emp) or die(mysqli_error($conn));
$emp_row=mysqli_fetch_assoc($emp_query);
if(isset($_POST['change'])){
	$password=$_POST['password'];
	$repeat=$_POST['repeat'];
	if($password == $repeat){
	$update="UPDATE employee SET password='$password' WHERE id='".$_POST['id']."'";
	mysqli_query($conn,$update) or die(mysqli_error($conn));
}}
echo'<div class="col-xl-9 col-lg-8  col-md-12">
						<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white p-4 mb-4 card">
							<ul class="list-group list-group-horizontal-lg">
								<li class="list-group-item text-center button-6"><a href="employment.php?id='.$slug.'"
										class="text-dark">Employement</a></li>
								<li class="list-group-item text-center button-6"><a href="details-admin.php?id='.$slug.'"
										class="text-dark">Detail</a></li>
								

								<li class="list-group-item text-center active button-5"><a class="text-white"
										href="profile-settings.php?id='.$slug.'">Settings</a></li>
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
										<form method="post" action="profile-settings.php?id='.$slug.'">
											<input type="text" class="form-control" placeholder="ID" name="id" placeholder="ID" required>
										</div>
										<div class="form-group">
											<input type="password" class="form-control" placeholder="New Password"
												id="pwd" name="password" minlength="8" required>
										</div>
										<div class="form-group">
											<input type="password" class="form-control" placeholder="Repeat Password" name="repeat" minlength="8" required>
										</div>
										<div class="text-center">
											<button type="submit"
												class="btn btn-theme button-1 ctm-border-radius text-white text-center" name="change">Change
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