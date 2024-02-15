<?php
echo'<!DOCTYPE html>
<html lang="en">
  <head>
  
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
    
    <title>Employees List</title>

    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>';
require 'side.php';
echo'						<div class="col-xl-9 col-lg-8 col-md-12">
							<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white card">
									<div class="card-body">
										<ul class="list-group list-group-horizontal-lg">
											<li class="list-group-item text-center active button-5"><a href="employees.php" class="text-white">All</a></li>
											<li class="list-group-item text-center button-6"><a class="text-dark" href="team-admin.php">Teams</a></li>
											<li class="list-group-item text-center button-6"><a class="text-dark" href="office.php">Offices</a></li>
										</ul>
									</div>
								</div>
							<div class="card shadow-sm grow ctm-border-radius">
								<div class="card-body align-center">
									<h4 class="card-title float-left mb-0 mt-2">'.$total.' People</h4>
									<ul class="nav nav-tabs float-right border-0 tab-list-emp">
										<li class="nav-item">
											<a class="nav-link border-0 font-23 grid-view" href="employees.php"><i class="fa fa-th-large" aria-hidden="true"></i></a>
										</li>
										<li class="nav-item">
											<a class="nav-link border-0 font-23 active list-view" href="employees-list-admin.php"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
										</li>
										<li class="nav-item pl-3">
											<a href="add-employee.php" class="btn btn-theme button-1 text-white ctm-border-radius p-2 add-person ctm-btn-padding"><i class="fa fa-plus"></i> Add Person</a>
										</li>
									</ul>
								</div>
							</div>
							<form method="get" action="employment.php">
    <center>
        <input type="text" placeholder="ID" name="id" style="width: 40%;">
        <input type="submit" value="Search">
    </center>
</form>
<br>
							<div class="ctm-border-radius shadow-sm grow card">
								<div class="card-body">
								
									<!--Content table-->
									<div class="table-back employee-office-table">
										<div class="table-responsive">
											<table class="table custom-table table-hover table-hover">
												<thead>
													<tr>
														<th>Name</th>
														<th>Line Manager</th>
														<th>Team</th>
														<th>Office</th>
														<th>Permissions</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>';
												if(mysqli_num_rows($emp_query)>0){
													while($employer=mysqli_fetch_assoc($emp_query)){
														$line=$employer['team'];
														$select="SELECT * FROM team WHERE name ='$line'";
														$query=mysqli_query($conn,$select) or die(mysqli_error($conn));
														if(mysqli_num_rows($query)>0){
															while($team=mysqli_fetch_assoc($query)){
                                                            $team_id=$team['leader'];
															$name="SELECT * FROM employee WHERE id='$team_id'";
															$name_query=mysqli_query($conn,$name) or die(mysqli_error($conn));
															$fetch=mysqli_fetch_assoc($name_query);
															$file_emp=$employer['file_name'];
															$id_emp=$employer['id'];
														echo'<tr>
														<td>
															<a href="employment.php?id='.$id_emp.'" class="avatar"><img alt="'.$employer['name'].'" src="images/'.$file_emp.'" class="img-fluid"></a>
															<h2><a href="employment.php?id='.$id_emp.'">'.$employer['name'].' </a></h2>
														</td>
														<td><a class="btn btn-outline-success btn-sm">'.$fetch['name'].'</a></td>
														<td><a class="btn btn-outline-warning btn-sm">'.$employer['team'].'</a></td>
														<td>EMPOPS Technologies</td>
														<td>Team Lead</td>
														<td><form method=post action=process.php>
                                                        <input type=hidden name="id" value="'.$employer['id'].'">';
														if($employer['status']==1){
														echo'<button type="submit" class="dropdown-item" name="inactive" title="The Employee Account is Active"> Inactive</button>';
													}elseif ($employer['status']==2) {
														echo'<button type="submit" class="dropdown-item" name="active" title="The Employee Account is Inactive"> Active</a>';
													}
														echo'</form></td>
													</tr>';
												}}}}
												echo'</tbody>
											</table>
										</div>
									</div>
									<!-- /Content Table -->
									
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