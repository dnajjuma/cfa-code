<?php 
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php'); 


 ?>
 	<div class="container">
        <h2 align="center" class="mb-4" style="padding-bottom:15px; padding-bottom:20px"> EVENTS </h2>
 	<?php	 
 	if (isset($_POST['deletebtn'])) {
	$id = $_POST['delete_id'];

	$query = "DELETE FROM events WHERE id=".$id;
	$result = mysqli_query($connection,$query);

	if ($result) 
	{
		echo "<div class='alert alert-success'>Event DELETED</div>";

	}else{
		echo "<div class='alert alert-danger'>Event NOT deleted</div>";

	}
}

?>
 		<div class="table-responsive">
            
            <?php
               
                $query = "SELECT * FROM events";
                $query_run = mysqli_query($connection, $query);
                $counter = 1;
            ?>
            <a  href="new_event.php" class="btn btn-primary" style=" margin-bottom: 20px;" data-toggle="modal" data-target="#eventModal"> ADD </a>

            <table class="table table-bordered table-light table-stripped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        
                        <th> Event </th>
                        <!-- <th> Event2 </th> -->
                        <th> Venue </th>
                        <th> Fee </th>
                        <th> Date </th>
                        <th> No. of Participants</th>
                        <th> EDIT </th>
                        <th> DELETE </th>
                        
                        <!-- <th> ACTION </th> -->
                        <!-- <th> ACTION </th> -->
                    </tr>
                </thead>
                <tbody>

                <?php
                    if(mysqli_num_rows($query_run) > 0) 
                    {
                        while ($row = mysqli_fetch_assoc($query_run))
                        {
                            ?>
                    <tr>
                        <td><?php echo $counter ?></td>
                        <td><?php echo $row['event'];?></td>
                        <td><?php echo $row['venue']; ?></td>
                        <td><?php echo $row['fee']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['pnumber']; ?></td>
                        
                        <td>
                            <form action="event_edit.php" method="POST">                             
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">    
                            <button type="submit" name="editbtn" class="btn btn-link" > 
                            <i style="color: green !important; cursor:pointer !important;" class="fas fa-fw fa-pen"></i>
                        </button>
                                
                            </form>
                        </td>
                        <td>
                            <form action="view_events.php" method="POST">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="deletebtn" class="btn btn-link">
                                    <i style="color: maroon !important; cursor:pointer !important;" type="submit" name="deletebtn" class="fas fa-fw fa-trash"></i>
                                    </button>
                            </form>
                        </td>
                    </tr>

                    <?php
                        $counter++;}

                    }
                    else{
                        echo "no record found";
                    }                                                                                          
                    ?>
                </tbody>
            </table>
            <div class="modal fade" id="eventModal" role="dialog" aria-labelledby="exampleModalLabel" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> ADD NEW EVENT </h5>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                    <form style="color:black !important;" action="new_event.php" class="mb-4" method="POST" enctype="multipart/form-data">
            <div class="form-group">
               
                <input type="text" name="event" class="form-control" placeholder="Event" required>
            </div>
            <div class="form-group">
                
                <input type="text" name="venue" class="form-control" placeholder="Venue" required>
            </div>
            <div class="form-group">
                
                <input type="number" name="fee" class="form-control" placeholder="Fee" required>
            </div>
            <div class="form-group">
                
                <input type="date" name="date" class="form-control" placeholder="Date" required>
            </div>
            <div class="form-group">
   
                <input type="number" name="pnumber" class="form-control" placeholder="Number of participants" required>
            </div>

            <input type="submit" name="add_event" class="btn btn-primary" value="Add" style="float: right;width: 100px;">
        </form>
                    </div>
                </div>
            </div>    
        </div>
 	</div>
        </div>
 	</div>

 


 <?php 
include('includes/scripts.php');
include('includes/footer.php');
?>