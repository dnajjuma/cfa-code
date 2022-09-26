<?php 
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php'); 
include('includes/topbar.php');

?>
    <!--table-->
<div class container-fluid>
    <div class="card shadow mb-4">
	    <div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary"> Change details </h6>
	    </div>

	    <div class="card-body">
	    	<?php
	    	$connection = mysqli_connect("localhost","root","","amari");
	    	if (isset($_POST['editbtn'])) {
				$id = $_POST['edit_id'];
				//echo $id;
				$query = "SELECT * FROM organizers WHERE id='$id' ";
				$query_run = mysqli_query($connection, $query);

				foreach ($query_run as $row){
					?>
					<form action="code.php" method="POST">
							<input type="hidden" name="edit_id" value="<?php echo $row['id']?>">

                            <div class="form-group">
                                
                                <input type="text" name="edit_organizer" value="<?php echo $row['organizer']?>" class="form-control" placeholder="Organizer" required>
                            </div>
                            <div class="form-group">
                               
                                <input type="text" name="edit_role" value="<?php echo $row['role']?>" class="form-control" placeholder="Role" required>
                            </div>
                            <div class="form-group">
                               
                                <input type="text" name="edit_contact" value="<?php echo $row['contact']?>" class="form-control" placeholder="Contact" required>
                            </div>

                            <a href="view_organizer.php" class="btn btn-danger"> CANCEL </a>
							<button type="submit" name="updatebtn1" class="btn btn-primary"> Update </button>
				</form>

	        <?php
				}

			}
			?>
	    </div>
    </div>
</div>





<?php 
include('includes/scripts.php');
include('includes/footer.php');
?> 