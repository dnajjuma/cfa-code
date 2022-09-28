<?php 
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php'); 


 ?>
 	<div class="container">
        <!-- <h2 align="center" class="mb-4" style="padding-bottom:15px; padding-bottom:20px"> FACILITATORS </h2> -->
 	
   
    
    
    <?php	 
 	if (isset($_POST['deletebtn'])) {
	$id = $_POST['delete_id'];

	$query = "DELETE FROM tbl_borrower WHERE id=".$id;
	$result = mysqli_query($connection,$query);

	if ($result) 
	{
		echo "<div class='alert alert-success'>Borrower DELETED</div>";

	}else{
		echo "<div class='alert alert-danger'>Borrower NOT deleted</div>";

	}
}

?>
 		<div class="table-responsive">
            
            <?php
               
                $query = "SELECT * FROM tbl_borrower";
                $query_run = mysqli_query($connection, $query);
                $counter = 1;
            ?>
 
                        
                       
            
        <div class="container-fluid">
                
           
        <a href="newborrowers.php" class="btn btn-primary" style=" float: right; margin-bottom: 20px;" data-toggle="modal" data-target="#borModal"> ADD </a>
        
        <div class="container-fluid">
                        <table class="table table-bordered table-light table-stripped" id="dataTable" width="100%" cellspacing="0">
                            <table class="table">
                                <thead>
                                <tr>
                        <th>#</th>
                        <!-- <th> Image </th> -->
                        <th> First Name </th>
                        <th> Last Name </th>
                        <th> Contact </th>
                        <th> Address </th>
                        <th> EDIT </th>
                        <th> DELETE </th>
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
                        <!-- <td><img src="../picture/ style="width: 200px; height: 200px;"></td> -->
                        <td><?php echo $row['fName']; ?></td>
                        <td><?php echo $row['lName']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td><?php echo $row['address']; ?></td>
       
                        <td>
                             <form action="edit_borrower.php" method="POST">                              
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">     
                            <i style="color: green !important; cursor:pointer !important;" type="submit" name="deletebtn" class="fas fa-fw fa-pen"></i>
                            <i class="m-r-10 mdi mdi-border-color"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="viewborrowers.php" method="POST">
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
            <div class="modal fade" id="borModal" role="dialog" aria-labelledby="exampleModalLabel" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> ADD NEW BORROWER </h5>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                        <form style="color:black !important;" action="newborrower.php" class="mb-4" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <!-- <label><b>Organizer</b></label> -->
                                <input type="text" name="fName" class="form-control" placeholder="First name" required>
                            </div>
                            <div class="form-group">
                                <!-- <label><b>Organizer</b></label> -->
                                <input type="text" name="lName" class="form-control" placeholder="Last name" required>
                            </div>
                            <div class="form-group">
                                <!-- <label><b>Role</b></label> -->
                                <input type="text" name="contact" class="form-control" placeholder="Contact" required>
                            </div>
                            <div class="form-group">
                                <!-- <labe><b>Contact</b></labe/l> -->
                                <input type="text" name="address" class="form-control" placeholder="Address" required>
                            </div>
                            <input type="submit" name="addbtn" class="btn btn-success" value="Add" style="float: right; width: 100px;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>    
        </div>
        
 	</div>

 


 <?php 
include('includes/scripts.php');
include('includes/footer.php');
?>