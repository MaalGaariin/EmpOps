<?php
require 'assets/conn.php';
if(isset($_POST['inactive'])){
	$eid=$_POST['id'];
	$update="UPDATE employee SET status = '2' WHERE id='$eid'";
	mysqli_query($conn,$update) or die(mysqli_error($conn));
	if(isset($_SESSION['emp_id'])){
	header('location:employees-list.php');
}else{
		header('location:emp-list.php');
}
}
if(isset($_POST['active'])){
	$eid=$_POST['id'];
	$update="UPDATE employee SET status = '1' WHERE id='$eid'";
	mysqli_query($conn,$update) or die(mysqli_error($conn));
		if(isset($_SESSION['emp_id'])){
	header('location:employees-list.php');
}else{
	header('location:emp-list.php');
}
}
if(isset($_POST['edit-phone'])){
	$eid=$_POST['phone'];
	$update="UPDATE company SET phone = '$eid'";
	mysqli_query($conn,$update) or die(mysqli_error($conn));
	header('location:company-admin.php');
}
if(isset($_POST['edit-url'])){
	$eid=$_POST['url'];
	$update="UPDATE company SET web = '$eid'";
	mysqli_query($conn,$update) or die(mysqli_error($conn));
	header('location:company-admin.php');
}
if(isset($_POST['edit-email'])){
	$eid=$_POST['email'];
	$update="UPDATE company SET email = '$eid'";
	mysqli_query($conn,$update) or die(mysqli_error($conn));
	header('location:company-admin.php');
}
if(isset($_POST['add_company'])){
	$name=$_POST['company'];
	$r_n=$_POST['r_n'];
	$i_date=$_POST['i_date'];
	$vat=$_POST['vat'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$web=$_POST['web'];
$update="UPDATE company SET name='$name' , r_n = '$r_n' , i_date='$i_date' , vat='$vat' , address='$address' , phone='$phone' , email='$email' , web='$web'";
mysqli_query($conn,$update) or die(mysqli_error($conn));
header('location:company-admin.php');
}
if(isset($_POST['upload'])){
	$name=$_POST['name'];
	$size=$_POST['size'];
	$date=$_POST['date'];
	$url=$_POST['url'];
		$insert="INSERT INTO document(name,date,size,link) VALUES('$name','$date','$size','$url')";
		mysqli_query($conn,$insert) or die(mysqli_error($conn));
	header('location:company-admin.php');
}
if(isset($delete_announce)){
	$id_announce=$_POST['id-'];
	$delete="DELETE FROM announcement'";
	mysqli_query($conn,$delete);
	header('location:announce-admin.php');
}
if(isset($_POST['delete'])){
	$id=$_POST['id'];
	$delete="DELETE FROM document WHERE id ='$id'";
	mysqli_query($conn,$delete) or die(mysqli_error($conn));
	header('location:company-admin.php');
}
if(isset($_POST['apply'])){
	$id=$_POST['id'];
	$date=$_POST['date'];
	$reason=nl2br($_POST['reason']);
	/*$delete="DELETE FROM employee WHERE id = '$id'";
	mysqli_query($conn,$delete) or die(mysqli_error($conn));*/
	$select="SELECT * FROM employee WHERE id = '$id'";
	$sec=mysqli_query($conn,$select) or die(mysqli_error($conn));
	if(mysqli_num_rows($sec)>0){
		$insert="INSERT INTO le(id,date,reason) VALUES('$id','$date','$reason')";
	mysqli_query($conn,$insert);
}
	header('location:leave.php');
}
if(isset($_POST['changea'])){
								$current=$_POST['current'];
								$id=$_POST['id'];
								$password=$_POST['new'];
								$select="SELECT * FROM admin WHERE id ='$id' AND password='$current'";
								$id=$_SESSION['admin_id'];
								$query=mysqli_query($conn,$select);
								if(mysqli_num_rows($query)>0){
                                 $update="UPDATE admin SET password ='$password' WHERE id='$id'";
                                 mysqli_query($conn,$update);
                                 echo"<script>alert('Operation Successesful')</script>";
                                 header('location:setting-admin.php');
								}else{
                                 echo"<script>alert('Operation Failed')</script>";
                                 header('location:setting-admin.php');			
                                 					}}
if(isset($_POST['add_team'])){
	$team=$_POST['team'];
	$leader=$_POST['leader_id'];
	$id=$_POST['id'] + 1;
	$select="SELECT * FROM employee WHERE id='$leader'";
	$query=mysqli_query($conn,$select) or die(mysqli_error($conn));
    if(mysqli_num_rows($query) > 0){
	$insert="INSERT INTO team(name,leader,id) VALUES('$team','$leader','$id')";
	mysqli_query($conn,$insert) or die(mysqli_error($conn));
}
	header('location:team-admin.php');
}
if(isset($_POST['delete_team'])){
	$team=$_POST['id'];
	$delete="DELETE FROM team WHERE id ='$team'";
	$query=mysqli_query($conn,$delete) or die(mysqli_error($conn));
	 $select="SELECT * FROM team WHERE id > '$team'";
    	$team_query=mysqli_query($conn,$select) or die(mysqli_error($conn));
    	while($row=mysqli_fetch_assoc($team_query)){
    		$fetch=$row['id'];
    		$minus=$row['id'] - 1;
    		$update="UPDATE team SET id ='$minus' WHERE id = '$fetch'";
    		mysqli_query($conn,$update) or die(mysqli_error($conn));
    	}	
    	header('location:team-admin.php');
}
if (isset($_POST['edit'])) {
    $team = $_POST['team'];
    $id = $_POST['id'];
    $leader=$_POST['leader'];
    $update = "UPDATE team SET name = '$team' , leader='$leader' WHERE id='$id'";
    mysqli_query($conn, $update);
    header('location:team-admin.php');
}
if(isset($_POST['save'])){
	$team=$_POST['team'];
    $id=$_POST['id'];
	$leader=$_POST['leader'];
	$select="SELECT * FROM employee WHERE id='$leader'";
	$query_a=mysqli_query($conn,$select) or die(mysqli_error($conn));
    if(mysqli_num_rows($query_a) > 0){
	$update="UPDATE team SET name ='$team' , leader='$leader' WHERE id='$id'";
	$query=mysqli_query($conn,$update) or die(mysqli_error($conn));
}
    	header('location:team-admin.php');
}
if(isset($_POST['update_member'])){
	$id=$_POST['id'];
	$team=$_POST['team'];
	$select="SELECT * FROM employee WHERE id = '$id'";
	$query=mysqli_query($conn,$select) or die(mysqli_error($conn));
	if(mysqli_num_rows($query)>0){
		$update="UPDATE employee SET team ='$team' WHERE id='$id'";
		mysqli_query($conn,$update) or die(mysqli_error($conn));
	}
	header('location:team-admin.php');
}
if(isset($_POST['add'])){
	$team=$_POST['team'];
	$idno=$_POST['id'];
	$update="UPDATE employee SET team WHERE id='$idno'";
	mysqli_query($conn,$update) or die(mysqli_error($conn));
}
if (isset($_POST['add_teammember'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $id = $_POST['id'];
    $email = $_POST['email'];
$job = $_POST['job-title'];
$nation = $_POST['nationality'];
$birth = $_POST['birth-date'];
$gender = $_POST['gender'];
$amount = $_POST['amount'];
$blood = $_POST['blood'];
$password = $_POST['password'];
$phone = $_POST['phone1'];
$phone2 = $_POST['phone2'];
$linkedin = $_POST['linkedin'];
$web = $_POST['web'];
$start = $_POST['date'];
$visa = $_POST['visa'];
$team = $_POST['team'];
    // Retrieve uploaded image details
   $filename = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];
$folder = "images/" . $filename;
$file_name = basename($filename); // Retrieve the file name

// Move the uploaded image to the desired folder
if (move_uploaded_file($tempname, $folder)) {
    // Image move successful, proceed with database insertion

    // Create and execute the SQL query
    $sql = "INSERT INTO employee (name, id, email, job, birth, nationality, gender, salary, blood, password, phone, phone2, linkedin, web, start, visa, team, file_name)
            VALUES ('$name', '$id', '$email', '$job', '$birth', '$nation', '$gender', '$amount', '$blood', '$password', '$phone', '$phone2', '$linkedin', '$web', '$start', '$visa', '$team', '$file_name')";
    mysqli_query($conn, $sql);
} else {
    // Image move failed
    echo "Failed to upload the image.";
}
header('location:add-employee.php');
}
if(isset($_POST['attend'])){
	$emp_id=$_POST['employee-id'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$location=$_POST['location'];
	$status=$_POST['status'];
$insert="INSERT INTO attendance(employee_id,date,time,location,status) VALUES('$emp_id','$date','$time','$location','$status')";
mysqli_query($conn,$insert);
header('location:attendance.php');
}
if (isset($_POST['announce'])) {
    $title = $_POST['title'];
    $content = nl2br($_POST['content']);
    $image = $_FILES['file_image'];

    // Check if a file was uploaded
    if ($image['error'] === UPLOAD_ERR_OK) {
        // Define the directory where the file will be saved
        $target_dir = "images/";

        // Generate a unique filename for the image
        $filename = uniqid() . "." . pathinfo($image['name'], PATHINFO_EXTENSION);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($image['tmp_name'], $target_dir . $filename)) {
            // The file was uploaded successfully
            echo "File uploaded successfully.";
           
            // Insert the announcement into the database
            $insert="INSERT INTO announcement (title,content,file) VALUES('$title','$content','$filename')";
            mysqli_query($conn,$insert);

        } else {
            // There was an error uploading the file
            echo "Error uploading file.";
        }
    } else {
        // There was an error with the uploaded file
        echo "Error with file upload.";
    }
    header('location:admin-dashboard.php');
}
?>