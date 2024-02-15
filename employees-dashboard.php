<?php
require 'side_employee.php';
$team = "SELECT * FROM team";
$team_query = mysqli_query($conn, $team) or die(mysqli_error($conn));
echo '
<style>
body {
            font-family: Arial, sans-serif;
        }
        .employee-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-gap: 20px;
            padding: 20px;
        }
        .employee-card {
            background-color: #f8f8f8;
            padding: 20px;
            border-radius: 5px;
            position: relative;
        }
        .employee-card img {
            width: 100%;
            height: auto;
            border-radius: 50%;
        }
        .employee-card .info {
            display: none;
            position: absolute;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .employee-card:hover .info {
            display: block;
        }
.page-container {
  position: relative;
  height: auto; 
  min-height: 750px; 
  width: 590px;
  display: block;
  page-break-inside: avoid;
}

.page-break {
  page-break-before:
}

.page-number::before {
  content: counter(page);
  counter-increment: page;
  position: absolute;
  bottom: 10px; 
  right: 10px;
  font-size: 14px; 
}
</style><!-- Team Leads List -->
									<div class="card flex-fill team-lead shadow-sm grow">
										<div class="card-header">
											<h4 class="card-title mb-0 d-inline-block">Team Leads </h4>
                                       </div>';
$recordsPerPage = 7;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$startFrom = ($page - 1) * $recordsPerPage;
$totalRecordsQuery = "SELECT COUNT(*) as total FROM team";
$totalRecordsResult = mysqli_query($conn, $totalRecordsQuery);
$totalRecords = mysqli_fetch_assoc($totalRecordsResult)['total'];

$totalPages = ceil($totalRecords / $recordsPerPage);
$recordsQuery = "SELECT * FROM team LIMIT $startFrom, $recordsPerPage";
$recordsResult = mysqli_query($conn, $recordsQuery);

if (mysqli_num_rows($recordsResult) > 0) {
  while ($row = mysqli_fetch_assoc($recordsResult)) {
    $lead = $row['leader'];
    $picture = "SELECT * FROM employee WHERE id='$lead'";
    $query = mysqli_query($conn, $picture) or die(mysqli_error($conn));
    $pic = mysqli_fetch_assoc($query);
    if ($pic['file_name'] == 'a') {
      $profile = "img-2.jpg";
    } else {
      $profile = $pic['file_name'];
    }
    echo '<div class="card-body">
											<div class="media mb-3">
												<div class="e-avatar avatar-online mr-3"><img src="images/' . $profile . '" alt="' . $pic['name'] . '" class="img-fluid"></div>
												<div class="media-body">
													<h6 class="m-0">' . $pic['name'] . '</h6>
													<p class="mb-0 ctm-text-sm">' . $row['name'] . '</p>
												</div>
											</div>
											<hr>
											</div>';
  }
}
echo "</div>
								<div class='col-lg-6 col-md-12 d-flex'>
									
		</div>";
for ($i = 1; $i <= $totalPages; $i++) {
  echo "<a href='employees-dashboard.php?page=$i'>$i</a>";
}
echo '<div class="sidebar-overlay" id="sidebar_overlay"></div>
			
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

	</body>
</html>';
