<?PHP
require 'side.php';
$emp="SELECT * FROM admin WHERE id='".$_SESSION['admin_id']."'";
$emp_query=mysqli_query($conn,$emp) or die(mysqli_error($conn));
$row=mysqli_fetch_assoc($emp_query);
echo'						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white p-4 mb-4 card">
									<ul class="list-group list-group-horizontal-lg">
										<li class="list-group-item text-center active button-5"><a href="details.php" class="text-white">Detail</a></li>
										<li class="list-group-item text-center button-6"><a class="text-dark" href="setting-admin.php">Settings</a></li>
									</ul>
								</div>
							<div class="row">
								<div class="col-xl-4 col-lg-6 col-md-6 d-flex">
									<div class="card flex-fill ctm-border-radius shadow-sm grow">
										<div class="card-header">
											<h4 class="card-title mb-0">Basic Information</h4>
										</div>
										<div class="card-body text-center">
											<p class="card-text mb-3"><span class="text-primary"> Name :</span><b>	'.$row['name'].'</b></p>
											<p class="card-text mb-3"><span class="text-primary"> ID :</span><b>	'.$row['id'].'</b></p>
										</div>
									</div>
								</div>
												</div>
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
		
		
		
		<!-- jQuery -->
		<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.2.1.min.js"></script>
		
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