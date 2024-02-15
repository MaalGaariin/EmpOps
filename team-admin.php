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
    
    <title>Teams</title>

    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>';
require 'side.php';
$select="SELECT * FROM team";
$query=mysqli_query($conn,$select) or die(mysqli_error($conn));
$total=mysqli_num_rows($query);
if($total == 0){
	$display="NO";
}else{
	$display=$total;
}
echo'

					<div class="col-xl-9 col-lg-8  col-md-12">
						<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white card">
							<div class="card-body">
								<ul class="list-group list-group-horizontal-lg">
									<li class="list-group-item text-center button-6"><a href="employees.php"
											class="text-dark">All</a></li>
									<li class="list-group-item text-center active button-5"><a class="text-white"
											href="team-admin.php">Teams</a></li>
									<li class="list-group-item text-center button-6"><a class="text-dark"
											href="office.php">Offices</a></li>
								</ul>
							</div>
						</div>
						<div class="card shadow-sm grow ctm-border-radius">
							<div class="card-body align-center">
								<h4 class="card-title float-left mb-0 mt-2">'.$display.' Teams</h4>
								<ul class="nav nav-tabs float-right border-0 tab-list-emp">
									<li class="nav-item pl-3">
										<a href="javascript:void(0)"
											class="btn btn-theme button-1 text-white ctm-border-radius p-2 add-person ctm-btn-padding"
											data-toggle="modal" data-target="#addTeam"><i class="fa fa-plus"></i> Add
											Team</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="row">';
						 for($i=1;$display>=$i;$i++){
                        if($i%2 != 1){
                      	$select="SELECT * FROM team WHERE id = '$i'";
                      	$select_query=mysqli_query($conn,$select) or die(mysqli_query($conn));
                      	$row=mysqli_fetch_assoc($select_query);
                      	$leader=$row['leader'];
                      	$image="SELECT * FROM employee WHERE id='$leader'";
                      	$image_query=mysqli_query($conn,$image) or die(mysqli_error($conn));
                      	$row_image=mysqli_fetch_assoc($image_query);
							echo'<div class="col-md-6">
								<div class="ctm-border-radius shadow-sm grow card">
									<div class="card-header">
					<h4 class="page-sub-title d-inline-block mb-0 mt-2">
                    <form method="post" action="process.php">
					<input type="text" class="form-control" value="'.$row['name'].'" name="team"></h4>
					<input type="hidden" value="'.$row['id'].'" name="id">

										<div class="team-action-icon float-right">
											
								<button type="sumbit" class="btn btn-theme text-white ctm-border-radius" title="Edit" name="edit"><i
														class="fa fa-pencil"></i></button>
											<span data-toggle="modal" data-target="#delete">
												<a href="javascript:void(0)"
													class="btn btn-theme text-white ctm-border-radius" title="Delete"><i
														class="fa fa-trash"></i></a>
											</span>
										</div>
									</div></form>
									<div class="card-body">
										<span class="avatar" data-toggle="tooltip" data-placement="top" title=""
											data-original-title="'.$row_image['name'].'"><img src="images/'.$row_image['file_name'].'"
												alt="'.$row['name'].'" class="img-fluid"></span>
<input type="text" name="leader" value="'.$row['leader'].'">
										<button type="button"
											class="btn btn-theme float-right ctm-border-radius text-white button-1"
											data-toggle="modal">'.$row_image['name'].'</button></form>
									</div>
								</div>
							</div>
				<div class="modal fade" id="delete">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<!-- Modal body -->
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title mb-4">Are You Sure Want to Delete?</h4>
                    <form method="post" action="process.php">
                    <input type="hidden" name="id" value="'.$row['id'].'">
					<button type="button" class="btn btn-danger ctm-border-radius text-center mb-2 mr-3"
						data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-theme ctm-border-radius text-white text-center mb-2 button-1"
						 name="delete_team">Delete</button></form>
				</div>
			</div>
		</div>
	</div>
';
						}if($i % 2 == 1){
                      	$select="SELECT * FROM team WHERE id = '$i'";
                      	$select_query=mysqli_query($conn,$select) or die(mysqli_query($conn));
                      	$row=mysqli_fetch_assoc($select_query);
                      	$leader=$row['leader'];
                      	$image="SELECT * FROM employee WHERE id='$leader'";
                      	$image_query=mysqli_query($conn,$image) or die(mysqli_error($conn));
                      	$row_image=mysqli_fetch_assoc($image_query);							
                      	echo'<div class="col-md-6">
								<div class="ctm-border-radius shadow-sm grow card">
									<div class="card-header">
					<h4 class="page-sub-title d-inline-block mb-0 mt-2">
                    <form method="post" action="process.php">
					<input type="text" class="form-control" value="'.$row['name'].'" name="team"></h4>
					<input type="hidden" value="'.$row['id'].'" name="id">

										<div class="team-action-icon float-right">								<button type="sumbit" class="btn btn-theme text-white ctm-border-radius" title="Edit" name="edit"><i
														class="fa fa-pencil"></i></button>
											<span data-toggle="modal" data-target="#delete">
												<a href="javascript:void(0)"
													class="btn btn-theme text-white ctm-border-radius" title="Delete"><i
														class="fa fa-trash"></i></a>
											</span>
										</div>
									</div>
									<div class="card-body">
										<span class="avatar" data-toggle="tooltip" data-placement="top" title=""
											data-original-title="'.$row_image['name'].'"><img src="images/'.$row_image['file_name'].'"
												alt="'.$row['name'].'" class="img-fluid"></span>
<input type="text" name="leader" value="'.$row['leader'].'">
										<button type="submit"
											class="btn btn-theme float-right ctm-border-radius text-white button-1"
											data-toggle="modal">'.$row_image['name'].'</button>
									</div></form>
								</div>
							</div>
														<div class="modal fade" id="delete">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<!-- Modal body -->
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title mb-4">Are You Sure Want to Delete?</h4>
                    <form method="post" action="process.php">
                    <input type="hidden" name="id" value="'.$row['id'].'">
					<button type="button" class="btn btn-danger ctm-border-radius text-center mb-2 mr-3"
						data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-theme ctm-border-radius text-white text-center mb-2 button-1"
						 name="delete_team">Delete</button></form>
				</div>
			</div>
		</div>
	</div>';
						}}

	echo'     <div class="sidebar-overlay" id="sidebar_overlay"></div>

	<!-- The Modal -->
	<div class="modal fade" id="addTeam">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<!-- Modal body -->
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title mb-3">Create New Team</h4>
					<form method="post" action="process.php">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Team Name" name="team">
					</div>
                    					<div class="form-group">
						<input type="text" class="form-control" placeholder="Leader Id" name="leader_id">
					</div>
						<input type="hidden" name="id" VALUE="'.$total.'">
					<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3"
						data-dismiss="modal">Cancel</button>
					<button type="sumbit"
						class="btn btn-theme button-1 ctm-border-radius text-white float-right" name="add_team">Add</button></form>
				</div>
			</div>
		</div>
	</div>
	<!-- Edit Modal -->
	<div class="modal fade" id="edit">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<!-- Modal body -->
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title mb-3">Edit Members</h4>
					<div class="form-group">
						
					</div>
					<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3"
						data-dismiss="modal">Cancel</button>
					<button type="button"
						class="btn btn-theme button-1 ctm-border-radius text-white float-right">Save</button>
				</div>
			</div>
		</div>
	</div>

	<!--Delete The Modal -->
<!-- jQuery -->
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