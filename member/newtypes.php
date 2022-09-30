<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php'); 
include('includes/topbar.php');

?>
    <div class="container">
        <h3 style="color:black !important;" align="center" class="mb-4">Add New Loan type</h3>
 <?php 
    if (isset($_POST['add_loantype'])) {
        $loantype = $_POST['loan_type'];
        $description = $_POST['description'];

    $query = "INSERT INTO tbl_loantypes (`loan_type`,`description`) VALUES ('$loantype', '$description')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
		$_SESSION['success'] = "<div class='alert alert-success'>Loan type has been added</div>";
		header('Location: viewtypes.php');
	}else{
		$_SESSION['status'] = "<div class='alert alert-danger'>Loan type  has NOT been added</div>";
		header('Location: viewtypes.php');
	}
    }
    

 ?>
         <!-- form goes here -->
    </div>
<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>    