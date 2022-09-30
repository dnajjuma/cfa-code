<?php
//session_start();
include('security.php');



$connection = mysqli_connect("localhost","root","","db_cfaax");

if (isset($_POST['registerbtn'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['confirmpassword'];

	if ($password === $cpassword) {
		$query = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
		$query_run = mysqli_query($connection,$query);

		if ($query_run) {
			//echo "saved";
			$_SESSION['success'] = "User profile added";
			header('location: register.php');	
		}else{
			//echo "not saved";
			$_SESSION['status'] = "User profile NOT added";
			header('location: register.php');
		}

	}else{
		$_SESSION['status'] = "Password and Confirm Password does not match";
		header('location: register.php');
	}

}



// if (isset($_POST['createbtn'])) {
// 	$productID = $_POST['pID'];
// 	$pdtname = $_POST['product'];
// 	$price = $_POST['price'];
// 	$cID = $_POST['cID'];
// 	$quantity = $_POST['quantity'];
// 	$images = $_FILES["image"]['name'];
	
// 	if (file_exists("upload/" . $_FILES["pdt_image"]['name']))
// 	{
// 		$store = $_FILES["pdt_name"]['name'];
// 		$_SESSION['status']="<div class='alert alert-danger'>Image already exists. '".$store."'</div>";
// 		header('Location: create_pdt.php');
// 	}else
// 	{

// 			$query = "INSERT INTO product_details (categoryID,ProductID,Product,Price,quantity,image) VALUES ('$cID,'$productID','$pdtname','$price',$quantity','$images')";
// 			$query_run = mysqli_query($connection,$query);

// 			if ($query_run) 
// 			{
// 				move_uploaded_file($_FILES["pdt_image"]['tmp_name'], "upload/".$_FILES["pdt_image"]['name']);
// 				$_SESSION['success'] = "<div class='alert alert-success'>Image added</div>";
// 				header('Location: create_pdt.php');	
// 			}else{
// 				$_SESSION['status'] = "<div class='alert alert-success'>Image NOT added</div>";
// 				header('Location: create_pdt.php');
// 			}
// 	}
	
// }


if (isset($_POST['updatebtn'])) {
	$id = $_POST['edit_id'];
	$fname = $_POST['edit_fname'];
	$lname = $_POST['edit_lname'];
	$email = $_POST['edit_email'];
	$password = $_POST['edit_password'];

	$query = "UPDATE admins SET firstname='$fname',lastname='$lname', email='$email', password='$password' WHERE id='$id' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] = "<div class='alert alert-success'>Your details have been updated</div>";
		header('Location: viewadmins.php');
	}else{
		$_SESSION['status'] = "<div class='alert alert-danger'>Your details have NOT been updated</div>";
		header('Location: viewadmins.php');
	}

}
if (isset($_POST['updatebtn2'])) {
	$id = $_POST['edit_id'];
	$memberName = $_POST['edit_memberName'];
	$age = $_POST['edit_age'];
	$contact = $_POST['edit_contact'];
	$address = $_POST['edit_address'];
	$nextOfKin = $_POST['edit_nextOfKin'];

	$query = "UPDATE tbl_member SET memberName='$memberName', age='$age', contact='$contact', address='$address', nextOfKin='$nextOfKin' WHERE id='$id' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] = "<div class='alert alert-success'>Your details have been updated</div>";
		header('Location: view_member.php');
	}else{
		$_SESSION['status'] = "<div class='alert alert-danger'>Your details have NOT been updated</div>";
		header('Location: view_member.php');
	}

}
if (isset($_POST['updatebtn8'])) {
	$id = $_POST['edit_id'];
	$rate = $_POST['edit_rate'];
	

	$query = "UPDATE tbl_interest SET rate='$rate' WHERE id='$id' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] = "<div class='alert alert-success'>Your details have been updated</div>";
		header('Location: view_interest.php');
	}else{
		$_SESSION['status'] = "<div class='alert alert-danger'>Your details have NOT been updated</div>";
		header('Location: view_interest.php');
	}

}


if (isset($_POST['updatebtn7'])) {
	$id = $_POST['edit_id'];
	$vsla = $_POST['edit_vslaName'];
	$capacity = $_POST['edit_capacity'];
	$location = $_POST['edit_location'];
	$chair = $_POST['edit_chairperson'];
	$status = $_POST['edit_status'];
	$meeting = $_POST['edit_meeting'];
	$activity = $_POST['edit_activity'];
	$males = $_POST['edit_males'];
	$females = $_POST['edit_females'];
	$savings = $_POST['edit_savings'];
	$averageage = $_POST['edit_averageage'];
	$year = $_POST['edit_year'];
	$shareouts = $_POST['edit_shareouts'];
	$loanstaken = $_POST['edit_loanstaken'];
	$loansreturned = $_POST['edit_loansreturned'];

	$query = "UPDATE tbl_groups SET vslaName='$vsla', capacity='$capacity', location='$location', chair='$chair', status='$status', meeting='$meeting', activity='$activity', males='$males', females='$females', savings='$savings', averageage='$averageage', creditunit='$creditunit', rateofLending='$rateofLending', year='$year', shareouts='$shareouts', loanstaken='$loanstaken', loansreturned='$loansreturned' WHERE id='$id' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] = "<div class='alert alert-success'>Your details have been updated</div>";
		header('Location: viewvsla.php');
	}else{
		$_SESSION['status'] = "<div class='alert alert-danger'>Your details have NOT been updated</div>";
		header('Location: viewvsla.php');
	}

}


if (isset($_POST['updatebtn3'])) {
	$id = $_POST['edit_id'];
	$event = $_POST['edit_event'];
	$venue = $_POST['edit_venue'];
	$fee = $_POST['edit_fee'];
	$date = $_POST['edit_date'];
	$pnumber = $_POST['edit_pnumber'];

	$query = "UPDATE events SET event='$event',venue='$venue', fee='$fee', date='$date', pnumber='$pnumber' WHERE id='$id' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] = "<div class='alert alert-success'>Your details have been updated</div>";
		header('Location: view_events.php');
	}else{
		$_SESSION['status'] = "<div class='alert alert-danger'>Your details have NOT been updated</div>";
		header('Location: view_events.php');
	}

}
if (isset($_POST['updatebtn6'])) {
	$id = $_POST['edit_id'];
	$fullname = $_POST['edit_name'];
	$contact = $_POST['edit_contact'];
	$address = $_POST['edit_address'];
	

	$query = "UPDATE tbl_chairperson SET name='$fullname', contact='$contact', address='$address' WHERE id='$id' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] = "<div class='alert alert-success'>Your details have been updated</div>";
		header('Location: view_chair.php');
	}else{
		$_SESSION['status'] = "<div class='alert alert-danger'>Your details have NOT been updated</div>";
		header('Location: view_chair.php');
	}

}
if (isset($_POST['updatebtn9'])) {
	$id = $_POST['edit_id'];
	$fName = $_POST['edit_fName'];
	$lName = $_POST['edit_lName'];
	$contact = $_POST['edit_contact'];
	$address = $_POST['edit_address'];

	$query = "UPDATE tbl_borrower SET fName='$fName', lName='$lName', contact='$contact', address='$address' WHERE id='$id' ";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) {
		$_SESSION['success'] = "<div class='alert alert-success'>Your details have been updated</div>";
		header('Location: view_borrower.php');
	}else{
		$_SESSION['status'] = "<div class='alert alert-danger'>Your details have NOT been updated</div>";
		header('Location: view_borrower.php');
	}

}

if (isset($_POST['deletebtn'])) {
	$id = $_GET['id'];

	$query = "DELETE * FROM user WHERE id='$id'";
	$query_run = mysqli_query($connection,$query);

	if ($query_run) 
	{
		$_SESSION['success'] = "<div class='alert alert-success'>User DELETED</div>";
		header('Location: viewadmins.php?id='.$id);
	}else{
		$_SESSION['status'] = "<div class='alert alert-danger'>User NOT deleted</div>";
		header('Location: viewadmins.php?id='.$id);
	}
}






?>