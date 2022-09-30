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
				$query = "SELECT * FROM events WHERE id='$id' ";
				$query_run = mysqli_query($connection, $query);

				foreach ($query_run as $row){
					?>
					<form action="code.php" method="POST">
					<input type="hidden" name="edit_id" value="<?php echo $row['id']?>">

<div class="form-group">
               
               <input type="text" name="edit_event" value="<?php echo $row['event']; ?>"  class="form-control" placeholder="Event" required>
           </div>
           <div class="form-group">
               
               <input type="text" name="edit_venue" value="<?php echo $row['venue']; ?>" class="form-control" placeholder="Venue" required>
           </div>
           <div class="form-group">
               
               <input type="number" name="edit_fee" value="<?php echo $row['fee']; ?>" class="form-control" placeholder="Fee" required>
           </div>
           <div class="form-group">
               
               <input type="date" name="edit_date" value="<?php echo $row['date']; ?>" class="form-control" placeholder="Date" required>
           </div>
           <div class="form-group">
  
               <input type="number" name="edit_pnumber" value="<?php echo $row['pnumber']; ?>" class="form-control" placeholder="Number of participants" required>
           </div>

                            

                            <a href="view_events.php" class="btn btn-danger"> CANCEL </a>
							<button type="submit" name="updatebtn3" class="btn btn-primary"> Update </button>
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