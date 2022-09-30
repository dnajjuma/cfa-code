<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php'); 
include('includes/topbar.php');

?>

    <div class="container">
        <h3 style="color:black !important;" align="center" class="mb-4">Add New Loan</h3>
 <?php 
    if (isset($_POST['add_btn'])) {

    $amount = $_POST['amount'];
    $borrower = $_POST['borrower'];
    $collector = $_POST['collector'];
    $plan = $_POST['plan'];
    // $tamount = $_POST['tamount'];
    // $start_date = $_POST['start_date'];
    // $end_date = $_POST['end_date'];
    $loan_type = $_POST['loan_type'];


    $query = "INSERT INTO tbl_loan (`amount`,`borrower`,`collector`,`plan`,`loan_type`) VALUES ('$amount','$borrower','$collector','$plan','$loan_type')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
		$_SESSION['success'] = "<div class='alert alert-success'>Loan has been registered successfully</div>";
		header('Location: viewloans.php');
	}else{
		$_SESSION['status'] = "<div class='alert alert-danger'>Sorry! Loan could NOT be added</div>";
		header('Location: viewloans.php');
	}

   
    }
    
?>
        
    </div>
    

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>    