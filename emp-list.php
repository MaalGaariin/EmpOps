<?php
require 'side.php';
echo'						<div class="col-xl-9 col-lg-8 col-md-12">
							<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white card">
									<div class="card-body">
										<ul class="list-group list-group-horizontal-lg">
											<li class="list-group-item text-center active button-5"><a href="employees.html" class="text-white">All</a></li>
											<li class="list-group-item text-center button-6"><a class="text-dark" href="employees-team.html">Teams</a></li>
											<li class="list-group-item text-center button-6"><a class="text-dark" href="employees-offices.html">Offices</a></li>
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
											<a class="nav-link border-0 font-23 active list-view" href="emp-list.php"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
										</li>
										<li class="nav-item pl-3">
											<a href="add-employee.php" class="btn btn-theme button-1 text-white ctm-border-radius p-2 add-person ctm-btn-padding"><i class="fa fa-plus"></i> Add Person</a>
										</li>
									</ul>
								</div>
							</div>
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
														echo'<tr>
														<td>
															<a href="employment.html" class="avatar"><img alt="avatar image" src="assets/img/profiles/img-5.jpg" class="img-fluid"></a>
															<h2><a href="employment.html">'.$employer['name'].' </a></h2>
														</td>
														<td><a class="btn btn-outline-success btn-sm">'.$team['leader'].'</a></td>
														<td><a class="btn btn-outline-warning btn-sm">'.$employer['team'].'</a></td>
														<td>EMPOPS Technologies</td>
														<td>Team Lead</td>
														<td><form method=post action=process.php>
                                                        <input type=hidden name="id" value="'.$employer['id'].'">';
														if($employer['status']==1){
														echo'<button type="submit" class="dropdown-item" name="inactive"> Inactive</button>';
													}elseif ($employer['status']==2) {
														echo'<button type="submit" class="dropdown-item" name="active"> Active</a>';
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