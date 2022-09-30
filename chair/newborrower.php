<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php'); 
include('includes/topbar.php');

?>

    <div class="container">
        <h3 style="color:black !important;" align="center" class="mb-4">Add New Borrower</h3>
 <?php 
    if (isset($_POST['addbtn'])) {

    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    
    $query = "INSERT INTO tbl_borrower (`fName`,`lName`,`contact`,`address`) VALUES ('$fName','$lName','$contact','$address')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
		$_SESSION['success'] = "<div class='alert alert-success'>Borrower has been registered successfully</div>";
		header('Location: viewborrowers.php');
	}else{
		$_SESSION['status'] = "<div class='alert alert-danger'>Sorry! Borrower could NOT be added</div>";
		header('Location: viewborrowers.php');
	}

   
    }
    
?>
        
    </div>
    

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>    