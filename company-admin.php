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
    
    <title>Company</title>

    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>';
require 'side.php';
$company="SELECT * FROM company";
$query=mysqli_query($conn,$company) or die(mysqli_error($conn));
$team="SELECT * FROM team";
$team_query=mysqli_query($conn,$team) or die(mysqli_error($conn));
$total=mysqli_num_rows($team_query);
$emp="SELECT * FROM employee";
$emp_query=mysqli_query($conn,$emp) or die(mysqli_error($conn));
$total_employee=mysqli_num_rows($emp_query);
echo'						<div class="col-xl-9 col-lg-8 col-md-12">
							
							<div class="row">
								<div class="col-md-7 d-flex">
									<div class="card ctm-border-radius shadow-sm grow flex-fill">
										<div class="card-header">
											<h4 class="card-title mb-0">';
											if(mysqli_num_rows($query)>0){
												while($row_com=mysqli_fetch_assoc($query)){									
													echo $row_com['name'];
											
											echo'</h4>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-md-6">
													<p><span class="text-primary">Register Number : </span>'.$row_com['r_n'].'</p>
													<p><span class="text-primary">Incorporation Date : </span>'.$row_com['i_date'].'</p>
													<p><span class="text-primary">VAT Number : </span>'.$row_com['vat'].'</p>
												</div>
												<div class="col-md-6">
													<p>
														<span class="text-primary">Address:</span><br>
														'.nl2br($row_com['address']).'
													</p>
													
												</div>
											</div>
											<div class="text-center mt-3">
												<button class="btn btn-theme text-white ctm-border-radius button-1" data-toggle="modal" data-target="#add-information">Add Company Information</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-5 d-flex">
									<div class="card ctm-border-radius shadow-sm grow flex-fill">
										<div class="card-header">
											<h4 class="card-title mb-0">
												Contact
											</h4>
										</div>
										<div class="card-body">
											<form method=post action="process.php">
											<div class="input-group mb-3">
												<input type="text" name="phone" class="form-control" placeholder="0'.$row_com['phone'].'">
												<div class="input-group-append">
													<button type="submit" name="edit-phone" class="btn btn-theme text-white" type="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
												</div>
											</div>
											<div class="input-group mb-3">
												<input type="text" name="url" class="form-control" placeholder="'.$row_com['web'].'">
												<div class="input-group-append">
													<button type="submit" name="edit-url" class="btn btn-theme text-white" type="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
												</div>
											</div>
											<div class="input-group mb-0">
												<input type="email" name="email" class="form-control" placeholder="'.$row_com['email'].'">
												<div class="input-group-append">
													<button type="submit" name="edit-email" class="btn btn-theme text-white" type="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
												</div></form>
											</div>
										</div>
									</div>
								</div>';}}
								echo'<div class="col-md-12">
									<div class="company-doc">
										<div class="card ctm-border-radius shadow-sm grow">
											<div class="card-header">
												<h4 class="card-title d-inline-block mb-0">
													Documents
												</h4>
												<a href="javascript:void(0)" class="float-right add-doc text-primary" data-toggle="modal" data-target="#addDocument">Add Document
													</a>
											</div>
											<div class="card-body">
												<div class="employee-office-table">
													<div class="table-responsive">
														<table class="table custom-table">
															<thead>
																<tr>
																	<th>Name</th>
																	<th>Date</th>
																	<th>Size</th>
																	<th class="text-right">Action</th>
																</tr>
															</thead>
															<tbody>';
															$document="SELECT * FROM document";
															$doc_query=mysqli_query($conn,$document) or die(mysqli_error($conn));
															if(mysqli_num_rows($doc_query)>0){
																while($row=mysqli_fetch_assoc($doc_query)){
																		echo'<tr>
																	<td><a href="'.$row['link'].'" class="text-primary">'.$row['name'].'</a></td>
																	<td>'.$row['date'].'</td>
																	<td>'.$row['size'].'</td>
																	<td class="text-right text-danger">
																		<div class="table-action">
																		<form method="post" action="process.php">
																			<button type="submit" name="delete" class="btn btn-sm btn-outline-danger">
																			<input type="hidden" name="id" value="'.$row['id'].'">
																				<span class="lnr lnr-trash"></span> Delete
																			</button></form>
																		</div>
																	</td>
																</tr>';
															}}
															echo'</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 d-flex">
									<div class="card ctm-border-radius shadow-sm grow flex-fill">
										<div class="card-header">
											<div class="d-inline-block">';
											$select="SELECT * FROM company";
											$query=mysqli_query($conn,$select) or die(mysqli_error($conn));
											$fetch=mysqli_fetch_assoc($query);
												echo'<h4 class="card-title mb-0">'.$fetch['name'].'</h4>
												<p class="mb-0 ctm-text-sm">Head Office</p>
											</div>
										</div>
										<div class="card-body">
											<h4 class="card-title">Members</h4>';
											 $image="SELECT * FROM employee";
                                            $query=mysqli_query($conn,$image) or die(mysqli_error($conn));
                                            while($row=mysqli_fetch_assoc($query)){
						echo'<a href="employment.php?id='.$row['id'].'"><span class="avatar" data-toggle="tooltip" data-placement="top" title="'.$row['name'].'"><img class="img-fluid" alt="'.$row['name'].'" src="images/'.$row['file_name'].'"></span></a>';
                                                }
										echo'</div>
									</div>
								</div>
								<div class="col-md-6 d-flex">
									<div class="card shadow-sm grow ctm-border-radius flex-fill">
									<div class="card-header">
										<h4 class="card-title mb-0 d-inline-block">Overview </h4>
										<a href="team-admin.php" class="float-right text-primary">Manage Teams</a>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-6 col-6 text-center">
												<h5 class="btn btn-outline-primary mt-3"><b>'.$total.'</b></h5>
												<p class="mb-3">Teams</p>
											</div>
											<div class="col-md-6 col-6 text-center">
												<h5 class="btn btn-outline-primary mt-3"><b>'.$total_employee.'</b></h5>
												<p class="mb-3">People</p>
											</div>
										</div>
										<div class="text-center">
											<a href="employees.php" class="btn btn-theme text-white ctm-border-radius mt-2 button-1">People Directory</a>
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
						<p>Offices allow you to group people by location. Offices can subscribe to different public holidays, helping you to localize people\'s time off allowances.</p>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Name">
						</div>
						<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
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
							<input type="text" class="form-control" placeholder="Office Name">
						</div>
						<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme text-white ctm-border-radius float-right button-1">Save</button>
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
						<button type="button" class="btn btn-danger text-white text-center ctm-border-radius mb-2 mr-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme text-white text-center ctm-border-radius mb-2 button-1" data-dismiss="modal">Delete</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- New Team The Modal -->
		<div class="modal fade" id="add-information" role="document">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					<div class="modal-body style-add-modal">
						<button type="button" class="close" data-dismiss="modal">&times;</button>';
						$company_data="SELECT * FROM company";
                        $co_query=mysqli_query($conn,$company) or die(mysqli_error($conn));
						if(mysqli_num_rows($co_query)>0){
						$row_com=mysqli_fetch_assoc($co_query);}
						echo'<h4 class="modal-title mb-3">Add Company Information</h4>
						<form method="post" action="process.php">
						<div class="form-group">
							<div class="input-group mb-3">
								<input name="company" class="form-control" type="text" value="'.$row_com['name'].'">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input name="r_n" class="form-control" type="text" value="'.$row_com['r_n'].'">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input name="i_date" class="form-control" type="text" value="'.$row_com['i_date'].'">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input name="vat" class="form-control" type="text" value="'.$row_com['vat'].'">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<textarea name="address" rows="5" cols="40" value="'.$row_com['address'].'">'.$row_com['address'].'</textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input name="phone" minlength="10" maxlength="10" class="form-control" type="text" value="0'.$row_com['phone'].'">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input name="email" class="form-control" type="text" value="'.$row_com['email'].'">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input name="web" class="form-control" type="text" value="'.$row_com['web'].'">
							</div>
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="submit" name="add_company" class="btn btn-theme ctm-border-radius text-white float-right button-1">Add</button>
					</div></form>
				</div>
			</div>
		</div>
		<!-- New Folder The Modal -->
		<div class="modal fade" id="NewFolder">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Create New Folder</h4>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Name">
						</div>
						<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme ctm-border-radius text-white float-right button-1">Add</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- add document The Modal -->
		<div class="modal fade" id="addDocument">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Upload Document</h4>
						<form method="post" action="process.php">
						<div class="form-group">
							<input name="name" type="text" class="form-control" placeholder = "Enter Name" required>
						</div>
						<div class="form-group">
							                            <div class="cal-icon">
                              <input class="form-control datetimepicker cal-icon-input" name="date" type="text" placeholder="Date" required>
						</div>
                       <div class="form-group">
							<input name="url" type="text" class="form-control" placeholder="Enter Url" required>
						</div>
						<div class="form-group">
							<input name="size" type="text" class="form-control" placeholder="Enter Size" required>
													</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-theme ctm-border-radius text-white float-right button-1" name="upload">Upload</button></form>
					</div>
				</div>
			</div>
		</div>
		
		<!-- add office The Modal -->
		<div class="modal fade" id="addOffice1">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Add Office</h4>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Name">
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme ctm-border-radius text-white float-right button-1">Add</button>
					</div>
				</div>
			</div>
		</div>
				
		<!-- jQuery -->
		<script src="assets/js/jquery-3.2.1.min.js"></script>
		
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