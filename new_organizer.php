<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php'); 
include('includes/topbar.php');

?>

    <div class="container">
        <h3 style="color:black !important;" align="center" class="mb-4">Add New Organizer</h3>
 <?php 
    if (isset($_POST['add'])) {

    $organizer = $_POST['organizer'];
    $role = $_POST['role'];
    $contact = $_POST['contact'];
    
    $query = "INSERT INTO organizers (`organizer`,`role`,`contact`) VALUES ('$organizer','$role','$contact')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
		$_SESSION['success'] = "<div class='alert alert-success'>Organizer has been registered successfully</div>";
		header('Location: view_organizer.php');
	}else{
		$_SESSION['status'] = "<div class='alert alert-danger'>Sorry! Organizer could NOT be added</div>";
		header('Location: view_organizer.php');
	}

   
    }
    
?>
        
    </div>
    

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>    