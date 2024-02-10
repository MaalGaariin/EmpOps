<?php
require 'side.php';
$select="SELECT * FROM employee";
$query=mysqli_query($conn,$select) or die(mysqli_error($conn));
$row=mysqli_fetch_assoc($query);
$total=mysqli_num_rows($query);
$leave="SELECT * FROM le";
$lquery=mysqli_query($conn,$leave) or die(mysqli_error($conn));
$total_leave=mysqli_num_rows($lquery);
					echo'<!-- Widget -->
						<div class="row">
							<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="card dash-widget ctm-border-radius shadow-sm grow">
									<div class="card-body">
										<div class="card-icon bg-primary">
											<i class="fa fa-users" aria-hidden="true"></i>
										</div>
										<div class="card-right">
											<h4 class="card-title">Employees</h4>
											<p class="card-text">'.$total.'</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-sm-6 col-12">
								<div class="card dash-widget ctm-border-radius shadow-sm grow">
									<div class="card-body">
										<div class="card-icon bg-warning">
											<i class="fa fa-building-o"></i>
										</div>
										<div class="card-right">
											<h4 class="card-title">Branches</h4>
											<p class="card-text">1</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-sm-6 col-12">
								<div class="card dash-widget ctm-border-radius shadow-sm grow">
									<div class="card-body">
										<div class="card-icon bg-danger">
											<i class="fa fa-suitcase" aria-hidden="true"></i>
										</div>
										<div class="card-right">
											<h4 class="card-title">Leaves</h4>
											<p class="card-text">'.$total_leave.'</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-sm-6 col-12">
								<div class="card dash-widget ctm-border-radius shadow-sm grow">
									<div class="card-body">
										<div class="card-icon bg-success">
											<i class="fa fa-money" aria-hidden="true"></i>
										</div>
										<div class="card-right">
											<h4 class="card-title">Salary</h4>';
                                      $tsalary = "SELECT SUM(salary) AS total_salary FROM employee";
$tsalary_query = mysqli_query($conn, $tsalary);
$ttt = mysqli_fetch_assoc($tsalary_query);
$totalSalary = $ttt['total_salary'];
											echo'<p class="card-text">$'.$totalSalary.'</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- / Widget -->

						<!-- Chart -->
						<div class="row">
							<div class="col-md-6 d-flex">
								<div class="card ctm-border-radius shadow-sm flex-fill grow">
									<div class="card-header">
										<h4 class="card-title mb-0">Total Employees</h4>
									</div>
									<div class="card-body">
										<canvas id="pieChart"></canvas>
									</div>
								</div>
							</div>
							<div class="col-md-6 d-flex">
								<div class="card ctm-border-radius shadow-sm flex-fill grow">
									<div class="card-header">
										<h4 class="card-title mb-0">Total Salary By Unit</h4>
									</div>
									<div class="card-body">
										<canvas id="lineChart"></canvas>
									</div>
								</div>
							</div>
						</div>
						<!-- / Chart -->



						<!-- Team Leads List -->
						<div class="card flex-fill team-lead shadow-sm grow">
							<div class="card-header">
								<h4 class="card-title mb-0 d-inline-block">Team Leads </h4>
								<a href="team-admin.php" class="dash-card float-right mb-0 text-primary">Manage Team
								</a>
							</div>';
							$team = "SELECT * FROM team";
                    $tquery = mysqli_query($conn, $team);
                    if(mysqli_num_rows($tquery)>0){
                    while ($row = mysqli_fetch_assoc($tquery)) {
    $select = "SELECT * FROM employee WHERE id='" . $row['leader'] . "'";
    $squery = mysqli_query($conn, $select);
    $row_leader = mysqli_fetch_assoc($squery);
    $file = $row_leader['file_name'];
							echo'<div class="card-body">
								<div class="media mb-3">
									<div class="e-avatar avatar-online mr-3"><img src="images/'.$file.'"
											alt="'.$row_leader['name'].'" class="img-fluid"></div>
									<div class="media-body">
										<h6 class="m-0">'.$row_leader['name'].'</h6>
										<p class="mb-0 ctm-text-sm">'.$row['name'].'</p>
									</div>
								</div>
								<hr></div>';
							}}
						echo'<div class="announcement-container">
 <div class="announcement-card">
  <div class="custom-btn btn-160"><span class="btn-label">Add Announcement</span></div>
  <form method="post" action="process.php" enctype="multipart/form-data" class="announcement-form">
    <input type="text" name="title" placeholder="Title" class="announcement-input" name="announment" required>
    <textarea name="content" placeholder="Content" class="announcement-textarea" required></textarea>
    <label for="file_image" class="announcement-upload-label">Upload Image</label>
    <input type="file" name="file_image" id="file_image" accept="image/jpeg,image/png,image/gif" class="announcement-upload-input" required
      onchange="validateImageSize(this.files[0])">
    <button type="submit" name="announce" class="announcement-submit-btn">Submit</button>
  </form>
</div>

<script>
  function validateImageSize(file) {
    const reader = new FileReader();
    reader.onload = function(event) {
      const img = new Image();
      img.onload = function() {
        if (img.width > 600 || img.height > 400) {
        }
      };
      img.src = event.target.result;
    };
    reader.readAsDataURL(file);
  }
</script>
  </div>
</div>
					<div class="col-lg-6 col-md-12 d-flex">
		

						<!--/Content-->

					</div>
					<!-- Inner Wrapper -->

					<div class="sidebar-overlay" id="sidebar_overlay"></div>

					<!-- jQuery -->
					<script src="assets/js/jquery-3.2.1.min.js"></script>

					<!-- Bootstrap Core JS -->
					<script src="assets/js/popper.min.js"></script>
					<script src="assets/js/bootstrap.min.js"></script>

					<!-- Chart JS -->
					<script src="assets/js/Chart.min.js"></script>
					<script src="assets/js/chart.js"></script>

					<!-- Sticky sidebar JS -->
					<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
					<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

					<!-- Custom Js -->
					<script src="assets/js/script.js"></script>

</body>
</html>';
?>