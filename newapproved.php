<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php'); 
include('includes/topbar.php');

?>
    <div class="container">
        <!-- <h3 style="color:black !important;" align="center" class="mb-4">Add New Plan</h3> -->
 <?php 
    if (isset($_POST['newapproved'])) {
        $vslaName = $_POST['vslaName'];
        $amount = $_POST['amount'];

        

    $query = "INSERT INTO tbl_approved (`vslaName`,`amount`) VALUES ('$vslaName','$amount')";
    $query_run = mysqli_query($connection, $query);


    if ($query_run) {
        //delete from myfiles tables where file_name starts with vslaName
        $query = "DELETE FROM myfiles WHERE file_name LIKE '$vslaName%'";
        $query_run = mysqli_query($connection, $query);
        
		$_SESSION['success'] = "<div class='alert alert-success'>Approved applicant has been added</div>";
		header('Location: applications.php');
	}else{
		$_SESSION['status'] = "<div class='alert alert-danger'>Approved applicant has NOT been added</div>";
		header('Location: applications.php');
	}
    }

    
    

 ?>
         <!-- form goes here -->
    </div>
<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>    