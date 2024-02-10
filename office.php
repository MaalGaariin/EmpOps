<?php
require 'side.php';
$image="SELECT * FROM company";
$query=mysqli_query($conn,$image) or die(mysqli_error($conn));
$rowa=mysqli_fetch_assoc($query);
echo'						<div class="col-xl-9 col-lg-8  col-md-12">
								<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white card">
									<div class="card-body">
										<ul class="list-group list-group-horizontal-lg">
											<li class="list-group-item text-center button-6"><a href="employees.php" class="text-dark">All</a></li>
											<li class="list-group-item text-center button-6"><a class="text-dark" href="team-admin.php">Teams</a></li>
											<li class="list-group-item text-center active button-5"><a class="text-white" href="employees-office.php">Offices</a></li>
										</ul>
									</div>
								</div>
							<div class="card shadow-sm grow ctm-border-radius">
								<div class="card-body align-center">
									<h4 class="card-title float-left mb-0 mt-2">1 Office</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="card ctm-border-radius shadow-sm grow">
										<div class="card-header">
											<div class="d-inline-block">
												<h4 class="card-title mb-0">'.$rowa['name'].'</h4>
												<p class="mb-0 ctm-text-sm">Head Office</p>
											</div>
											<div class="d-inline-block float-right" data-toggle="modal" data-target="#editOffice">
												<a href="javascript:void(0)" class="btn btn-theme mt-2 text-white float-right ctm-border-radius" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i>	</a>
											</div>
										</div>
										<div class="card-body">
											<h4 class="card-title">Members</h4>';
                                            $image="SELECT * FROM employee";
                                            $query=mysqli_query($conn,$image) or die(mysqli_error($conn));
                                            while($row=mysqli_fetch_assoc($query)){
						echo'<a href="employment.php"><span class="avatar" data-toggle="tooltip" data-placement="top" title="'.$row['name'].'"><img class="img-fluid" alt="'.$row['name'].'" src="images/'.$row['file_name'].'"></span></a>';
                                                }
											echo'<button type="button" class="btn btn-theme float-right ctm-border-radius text-white coll-arrow" data-toggle="collapse" data-target="#visit"></button>
											<a target="_blank" href="#" class="btn btn-theme button-1 float-right mx-2 d-none"> Visit</a>
											<div id="visit" class="collapse show">
														<div class="table-back mt-4 employee-office-table">
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
																	</thead>';
                                                                    while($row=mysqli_fetch_assoc($emp_query)){
                                                                    $team=$row['team'];
                                                                    $leader="SELECT * FROM team WHERE name ='$team'";
                                                                    $leader_query=mysqli_query($conn,$leader) or die(mysqli_error($conn));
                                                                    $fetch=mysqli_fetch_assoc($leader_query);
                                                                    $id=$fetch['leader'];
                                                                    $fetch_name="SELECT * FROM employee WHERE id='$id'";
                                                                    $fetch_query=mysqli_query($conn,$fetch_name) or  die(mysqli_error($conn));
                                                                    $leader_name=mysqli_fetch_assoc($fetch_query);
																	echo'<tbody>
																		<tr>
																			<td>
																				<a href="employment.html" class="avatar"><img alt="'.$row['name'].'" src="images/'.$row['file_name'].'" class="img-fluid"></a>
																				<h2><a href="php.php">'.$row['name'].'</a></h2>
																			</td>
												<td><a class="btn btn-outline-success btn-sm">'.$leader_name['name'].'</a></td>
																			<td><a class="btn btn-outline-warning btn-sm">'.$row['team'].'</a></td>
																			<td>EMPOPS Technologies</td>
																			<td>'.$row['team'].'</td>
														<td><form method=post action=process.php>
                                                        <input type=hidden name="id" value="'.$row['id'].'">';
														if($row['status']==1){
														echo'<button type="submit" class="dropdown-item" name="inactive"> Inactive</button>';
													}elseif ($row['status']==2) {
														echo'<button type="submit" class="dropdown-item" name="active"> Active</a>';
													}
														echo'</form></td>
													</tr>';
																	}
																	echo'</tbody>
																</table>
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
		
		<!--  add office The Modal -->
		<div class="modal fade" id="addOffice">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Create a New Office</h4>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Name">
						</div>
						<button type="button" class="btn btn-danger float-right ctm-border-radius ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme ctm-border-radius text-white float-right button-1">Add</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="editOffice">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Edit Office</h4>
						<div class="form-group">
						<form method="post" action="process.php">
							<input type="text" class="form-control" placeholder="Office Name" name="office" required>
						</div>
						<button type="button" class="btn btn-danger float-right ctm-border-radius ml-3" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-theme ctm-border-radius text-white float-right button-1" name="save_office">Save</button>
					</div></form>
				</div>
			</div>
		</div>
				
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