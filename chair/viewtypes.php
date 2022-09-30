<?php 
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php'); 


 ?>
 	<div class="container">
        <h2 align="center" class="mb-4" style="padding-bottom:15px; padding-bottom:20px"> Loan types </h2>
 	<?php	 
 	if (isset($_POST['deletebtn'])) {
	$id = $_POST['delete_id'];

	$query = "DELETE FROM tbl_loantypes WHERE id=".$id;
	$result = mysqli_query($connection,$query);

	if ($result) 
	{
		echo "<div class='alert alert-success'>Loan type DELETED</div>";

	}else{
		echo "<div class='alert alert-danger'>Loan type NOT deleted</div>";

	}
}

?>
 		<div class="table-responsive">
            
            <?php
               
                $query = "SELECT * FROM tbl_loantypes";
                $query_run = mysqli_query($connection, $query);
                $counter = 1;
            ?>
           

                    <a href="newplan.php" class="btn btn-primary" style=" float: right; margin-bottom: 20px;" data-toggle="modal" data-target="#typModal"> ADD </a>
        <!-- <a href="viewdata.php" target="_blank" class="btn btn-dark" style="margin-bottom: 20px; border-radius: 25%;"> Print Report </a> -->
        <div class="container-fluid">
                        <table class="table table-bordered table-light table-stripped" id="dataTable" width="100%" cellspacing="0">


        <div class="container-fluid">
        
                                <thead>
                                <tr>
                        <th>#</th>
                        
                        <th> Loan Type </th>
                        <th> Description </th>
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
                        <td><?php echo $row['loan_type'];?></td>
                        <td><?php echo $row['description'];?></td>
                        
                        <td>
                            <form action="edittypes.php" method="POST">                             
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">    
                            <i style="color: green !important; cursor:pointer !important;" type="submit" name="deletebtn" class="fas fa-fw fa-pen"></i>
                            <i class="m-r-10 mdi mdi-border-color"></i>
                        </button>
                                
                            </form>
                        </td>
                        <td>
                            <form action="viewtypes.php" method="POST">
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
            <div class="modal fade" id="typModal" role="dialog" aria-labelledby="exampleModalLabel" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> ADD NEW LOAN TYPE </h5>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                    <form style="color:black !important;" action="newtypes.php" class="mb-4" method="POST" enctype="multipart/form-data">
            <div class="form-group">
               
                <input type="text" name="loan_type" class="form-control" placeholder="Loan type" required>
            </div>
            <div class="form-group">
               
                <textarea type="text" name="description" class="form-control" placeholder="Description" required></textarea>
            </div>
           
           
            <input type="submit" name="add_loantype" class="btn btn-success" value="Add" style="float: right;width: 100px;">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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