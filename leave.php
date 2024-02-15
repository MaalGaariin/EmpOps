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
    
    <title>Leave</title>

    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>';
require 'side.php';
echo'<div class="card ctm-border-radius shadow-sm grow">
									<div class="card-header">
										<div class="d-inline-block">
											<h4 class="card-title mb-0">'.$row_com['name'].'</h4>
											<p class="mb-0 ctm-text-sm">Head Office</p>
										</div>
						<div class="col-xl-9 col-lg-8 col-md-12">
							
							<div class="row">
								<div class="col-md-12">
									<div class="card ctm-border-radius shadow-sm grow">
										<div class="card-header">
											<h4 class="card-title mb-0">Apply Leaves</h4>
										</div>
										<div class="card-body">
													<form method="post" action="process.php">
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label>
															id
															<span class="text-danger">*</span>
															</label>
															<div class="col-12 form-group">
																<input type="id" name="id" class="form-control" placeholder="id">
															</div>
														</div>
													</div>
													
												
													<div class="col-sm-6 leave-col">
														<div class="form-group">
															<label>Date</label>
															<input type="text" class="form-control" name="date">
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group mb-0">
															<label>Reason</label>
															<textarea class="form-control" cos="40" rows=4 name="reason"></textarea>
														</div>
													</div>
												</div>
												<div class="text-center">
													<button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" name="apply">Apply</button>
												</div>
										</div>
									</div>
											</form>
								</div>
								<div class="col-md-12">
									<div class="card ctm-border-radius shadow-sm grow">
										<div class="card-header">
											<h4 class="card-title mb-0">Leave Details</h4>
										</div>
										<div class="card-body">
											<div class="employee-office-table">
												<div class="table-responsive">
													<table class="table custom-table mb-0">
														<thead>
															<tr>
																<th>Date</th>
																<th>Id</th>
																<th>Reason</th>
																
															</tr>
														</thead>
														<tbody>';
                                                    $select="SELECT * FROM le";
                                                    $query=mysqli_query($conn,$select) or die(mysqli_error($conn));
                                                    if(mysqli_num_rows($query)>0){
                                                    	while ($row=mysqli_fetch_assoc($query)) {
															echo'<tr>
																<td>'.$row['date'].'</td>
																<td>'.$row['id'].'</td>
																<td>'.nl2br($row['reason']).'</td>
															</tr>';
														}}
														echo'</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
								
																
			<!--/Content-->
			
		</div>
		<!-- Inner Wrapper -->
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
		<!--Delete The Modal -->
		<div class="modal fade" id="delete">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Are You Sure Want to Delete?</h4>
						<button type="button" class="btn btn-danger ctm-border-radius text-white text-center mb-2 mr-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme ctm-border-radius text-white text-center mb-2 button-1" data-dismiss="modal">Delete</button>
					</div>
				</div>
			</div>
		</div>
				
		<!-- jQuery -->
		<script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/plugins/select2/select2.min.js"></script>
		
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