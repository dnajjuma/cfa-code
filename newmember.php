<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php'); 
include('includes/topbar.php');

?>

    <div class="container">
        <h3 style="color:black !important;" align="center" class="mb-4">Add New Member</h3>
 <?php 
    if (isset($_POST['addbtn'])) {

    $member = $_POST['memberName'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $nextOfKin = $_POST['nextOfKin'];

    
    $query = "INSERT INTO tbl_member (`memberName`,`age`,`contact`,`address`,`nextOfKin`) VALUES ('$member','$age','$contact','$address','$nextOfKin')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
		$_SESSION['success'] = "<div class='alert alert-success'>Member has been registered successfully</div>";
		header('Location: viewmembers.php');
	}else{
		$_SESSION['status'] = "<div class='alert alert-danger'>Sorry! Member could NOT be added</div>";
		header('Location: viewmembers.php');
	}

   
    }
    
?>
        
    </div>
    

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>    