<?php
require 'side.php';
$slug=$_GET['id'];
$emp="SELECT * FROM employee WHERE id='$slug'";
$emp_query=mysqli_query($conn,$emp) or die(mysqli_error($conn));
$emp_row=mysqli_fetch_assoc($emp_query);
echo'					<div class="col-xl-9 col-lg-8  col-md-12">
						<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white p-4 mb-4 card">
							<ul class="list-group list-group-horizontal-lg">
								<li class="list-group-item text-center active button-5"><a href="employment.php?id='.$slug.'"
										class="text-white">Employement</a></li>
								<li class="list-group-item text-center button-6"><a href="details-admin.php?id='.$slug.'"
										class="text-dark">Detail</a></li>
								<li class="list-group-item text-center button-6"><a class="text-dark"
										href="profile-settings.php?id='.$slug.'">Settings</a></li>
							</ul>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12 d-flex">
								<div class="card add-team flex-fill ctm-border-radius shadow-sm grow">
									<div class="card-header">
										<h4 class="card-title mb-0">Add '.$emp_row['name'].' to Another Team</h4>
									</div>';
									if(isset($_POST['update_team_submit'])){
	$team=$_POST['update_team'];
	$idno=$_POST['idno'];
	$update="UPDATE employee SET team ='$team' WHERE id='$idno'";
  mysqli_query($conn,$update) or die(mysqli_error($conn));
}
									$team="SELECT * FROM team";
									$query=mysqli_query($conn,$team) or die(mysqli_num_rows($conn));
									$leader="SELECT * FROM team WHERE name='".$emp_row['team']."'";
									$leader_query=mysqli_query($conn,$leader) or die(mysqli_error($conn));
									$row_leader=mysqli_fetch_assoc($leader_query);
									$select="SELECT * FROM employee WHERE id ='".$row_leader['leader']."'";
									$select_query=mysqli_query($conn,$select) or die(mysqli_error($conn));
									$row_select=mysqli_fetch_assoc($select_query);
									$tmembers="SELECT * FROM employee WHERE team='".$row_select['team']."'";
									$tmembers_query=mysqli_query($conn,$tmembers) or die(mysqli_error($conn));
									if(isset($_POST['adda'])){
	                                 $teamb=$_POST['teama'];
	                                 $idno=$_POST['ida'];
                                     $update="UPDATE employee SET team='".$teamb."' WHERE id='".$idno."'";
                                    	mysqli_query($conn,$update) or die(mysqli_error($conn));
                                      }
									echo'<div class="card-body">';
                                            echo'<div class="form-group mb-3">
                                            <form method="post" action="employment.php?id='.$slug.'">
                                            <input type="hidden" name="idno" value="'.$slug.'">
											<select class="form-control select" name="update_team">';
							                  echo'<option>Member Of'.$emp_row['team'].'</option>';									
							                  if(mysqli_num_rows($query)>0){
                                              	while($row=mysqli_fetch_assoc($query)) {
												echo'<option value="'.$row['name'].'">'.$row['name'].'</option>';
											}}
											echo'</select>
										</div>
					<button type="submit" class="btn btn-theme text-white ctm-border-radius float-right button-1" name="update_team_submit">Add</button><br></form>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 d-flex">
								<div class="card office-card flex-fill ctm-border-radius shadow-sm grow">
									<div class="card-header d-flex justify-content-between align-items-center">
										<h4 class="d-inline-block card-title mb-0">'.$emp_row['team'].' Team</h4>
										<div class="team-action-icon float-right">
												<a href="team-admin.php"
													class="btn btn-theme ctm-border-radius text-white"
													data-toggle="tooltip" data-placement="bottom" title="Edit"><i
														class="fa fa-pencil"></i></a>
												<a href="team-admin.php"
													class="btn btn-theme ctm-border-radius text-white"
													data-toggle="tooltip" data-placement="bottom" title="Delete"><i
														class="fa fa-trash"></i></a>
										</div>
									</div>
									<div class="card-body">
										<p class="d-inline-block mb-0">
											<a href="employment.php?id='.$row_select['id'].'" class="avatar d-inline-block"><img
													src="images/'.$row_select['file_name'].'" alt="'.$row_select['name'].'"
													class="img-fluid"></a>
											<a href="employment.php?id='.$row_select['id'].'" class="d-inline-block ml-4 text-primary">'.$row_select['name'].'
												</a>
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12 d-flex">
								<div class="card flex-fill ctm-border-radius shadow-sm grow">
									<div class="card-header">
										<h4 class="card-title mb-0">'.$row_select['name'].' Manager</h4>
									</div>
									<div class="card-body">
										<div class="media mb-4">
											<img class="rounded mr-3 img-fluid" src="images/'.$row_select['file_name'].'"
												alt="avatar image" width="50" height="50">
											<div class="media-body">
												<a href="employment.php?id='.$row_select['id'].'" class="text-dark text-ellipsis">'.$row_select['name'].'
													</a>
												<p class="ctm-text-sm mb-0 text-ellipsis"><a
														class="__cf_email__"
														data-cfemail="7b091218131a091f0c12170814153b1e031a160b171e55181416">['.$row_select['email'].']</a>
												</p>
											</div>
										</div>
										<div class="text-center">
											<a href="team-admin.php"
												class=" button-1 btn btn-theme ctm-border-radius text-white">Change Manager</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 d-flex">
								<div class="card add-team flex-fill ctm-border-radius shadow-sm grow">
									<div class="card-header">
										<h4 class="card-title mb-0">Who Reports to '.$row_select['name'].'</h4>
									</div>
									<div class="card-body">';
									if(mysqli_num_rows($tmembers_query)>0){
										while($row=mysqli_fetch_assoc($tmembers_query)){
										echo'<a href="employment.php?id='.$row['id'].'"><span class="avatar" data-toggle="tooltip"
												data-placement="top" title="'.$row['name'].'"><img class="img-fluid"
													alt="avatar image" src="images/'.$row['file_name'].'"></span></a>';
												}}
										echo'<div class="text-center">
											<a href="javascript:void(0)"
												class=" button-1 btn btn-theme ctm-border-radius text-white mt-4"
												data-toggle="modal" data-target="#addPeople">Add People</a>
										</div>
									</div>
								</div>
							</div>
						</div>
							<div class="col-md-6 col-sm-12 d-flex">
								<div class="card flex-fill office-card-last ctm-border-radius shadow-sm grow">
									<div class="card-header ">
										<h4 class="card-title mb-0">Working Week 
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-12">
												<span class="badge custom-badge badge-primary">Mon</span>
												<span class="badge custom-badge badge-primary">Tue</span>
												<span class="badge custom-badge badge-primary">Wed</span>
												<span class="badge custom-badge badge-primary">Thu</span>
												<span class="badge custom-badge badge-primary">Fri</span>
												<span class="badge custom-badge">Sat</span>
												<span class="badge custom-badge">Sun</span>
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

	<!-- Edit Working week The Modal -->
	<div class="modal fade" id="edit_week">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<!-- Modal body -->
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title mb-3">Edit Working Week</h4>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Mon" class="custom-control-input" checked>
						<label class="mb-0 custom-control-label" for="Mon">Mon</label>
					</div>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Tue" class="custom-control-input" checked>
						<label class="mb-0 custom-control-label" for="Tue">Tue</label>
					</div>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Wed" class="custom-control-input" checked>
						<label class="mb-0 custom-control-label" for="Wed">Wed</label>
					</div>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Thu" class="custom-control-input" checked>
						<label class="mb-0 custom-control-label" for="Thu">Thu
						</label>
					</div>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Fri" class="custom-control-input" checked>
						<label class="mb-0 custom-control-label" for="Fri">Fri</label>
					</div>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Sat" class="custom-control-input">
						<label class="mb-0 custom-control-label" for="Sat">Sat</label>
					</div>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Sun" class="custom-control-input">
						<label class="mb-0 custom-control-label" for="Sun">Sun</label>
					</div>
					<br>
					<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3"
						data-dismiss="modal">Cancel</button>
					<button type="button"
						class="btn btn-theme text-white ctm-border-radius float-right button-1">Add</button>
				</div>
			</div>
		</div>
	</div>

	<!--Delete The Modal -->
	<div class="modal fade" id="delete">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<!-- Modal body -->
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title mb-4">Are You Sure Want to Delete?</h4>
					<button type="button" class="btn btn-danger text-white ctm-border-radius text-center mb-2 mr-3"
						data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-theme text-white ctm-border-radius text-center mb-2 button-1"
						data-dismiss="modal">Delete</button>
				</div>
			</div>
		</div>
	</div>

	<!-- change office The Modal -->
	<div class="modal fade" id="changeOffice">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<!-- Modal body -->
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title mb-3">Change Office</h4>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Name">
					</div>
					<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3"
						data-dismiss="modal">Cancel</button>
					<button type="button"
						class="btn btn-theme text-white ctm-border-radius float-right button-1">Add</button>
				</div>
			</div>
		</div>
	</div>

	<!-- change Manger The Modal -->
	<div class="modal fade" id="changeManger">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<!-- Modal body -->
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title mb-3">Change Manager</h4>
					<div class="form-group">
						<select class="select form-control">
							<option selected>Select</option>
							<option value="1">ermiyas abera</option>
							<option value="2">gemechis</option>
							<option value="3">kidest</option>
							<option value="4">biruk aklilu</option>
							<option value="5">habtamu</option>
						</select>
					</div>
					<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3"
						data-dismiss="modal">Cancel</button>
					<button type="button"
						class="btn btn-theme text-white ctm-border-radius float-right button-1">Add</button>
				</div>
			</div>
		</div>
	</div>

	<!-- change Manger The Modal -->
	<div class="modal fade" id="addPeople">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<!-- Modal body -->
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title mb-3">Add People</h4>
					<div class="form-group">
					<form method="post" action="employment.php?id='.$slug.'">
						<input type="text" class="form-control" placeholder="Name" name="ida" required>
					</div>
					<input type="hidden" name="teama" value="'.$row_select['team'].'">
					<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3"
						data-dismiss="modal">Cancel</button>
					<button type="submit"
						class="btn btn-theme text-white ctm-border-radius float-right button-1" name="adda">Add</button></form>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery -->
	<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="assets/js/jquery-3.2.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Select2 JS -->
	<script src="assets/plugins/select2/select2.min.js"></script>

	<!-- Sticky sidebar JS -->
	<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
	<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

	<!-- Custom Js -->
	<script src="assets/js/script.js"></script>

</body>
</html>';
?>