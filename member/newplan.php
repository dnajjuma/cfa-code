<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php'); 
include('includes/topbar.php');

?>
    <div class="container">
        <h3 style="color:black !important;" align="center" class="mb-4">Add New Plan</h3>
 <?php 
    if (isset($_POST['add_plan'])) {
        $plan = $_POST['plan'];
        $rate = $_POST['rate'];

    $query = "INSERT INTO tbl_plan (`plan`,`rate`) VALUES ('$plan','$rate')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
		$_SESSION['success'] = "<div class='alert alert-success'>Plan has been added</div>";
		header('Location: viewplan.php');
	}else{
		$_SESSION['status'] = "<div class='alert alert-danger'>Plan has NOT been added</div>";
		header('Location: viewplan.php');
	}
    }
    

 ?>
         <!-- form goes here -->
    </div>
<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>    