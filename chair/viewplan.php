<?php 
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php'); 
 ?>
 	<div class="container">
        <h2 align="center" class="mb-4" style="padding-bottom:15px; padding-bottom:20px"> Loan Plans </h2>
 	<?php	 
 	if (isset($_POST['deletebtn'])) {
	$id = $_POST['delete_id'];

	$query = "DELETE FROM tbl_plan WHERE id=".$id;
	$result = mysqli_query($connection,$query);

	if ($result) 
	{
		echo "<div class='alert alert-success'>Plan DELETED</div>";

	}else{
		echo "<div class='alert alert-danger'>Plan NOT deleted</div>";

	}
}

?>
 		<div class="table-responsive">
            
            <?php
               
                $query = "SELECT * FROM tbl_plan";
                $query_run = mysqli_query($connection, $query);
                $counter = 1;
            ?>
           

           <a href="newplan.php" class="btn btn-primary" style=" float: right; margin-bottom: 20px;" data-toggle="modal" data-target="#planModal"> ADD </a>
        <!-- <a href="viewdata.php" target="_blank" class="btn btn-dark" style="margin-bottom: 20px; border-radius: 25%;"> Print Report </a> -->
        <div class="container-fluid">
                        <table class="table table-bordered table-light table-stripped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                        <th>#</th>
                        <th> Plan (months) </th>
                        <th> Interest (%) </th>
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
                        <td><?php echo $row['plan'];?></td>
                        <td><?php echo $row['rate'];?></td>
                        
                        <td>
                            <form action="editplan.php" method="POST">                             
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">    
                            <i style="color: green !important; cursor:pointer !important;" class="fas fa-fw fa-pen"></i>
                            <i class="m-r-10 mdi mdi-border-color"></i>
                        </button>
                                
                            </form>
                        </td>
                        <td>
                            <form action="viewplan.php" method="POST">
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
            <div class="modal fade" id="planModal" role="dialog" aria-labelledby="exampleModalLabel" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> ADD NEW PLAN </h5>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                    <form style="color:black !important;" action="newplan.php" class="mb-4" method="POST" enctype="multipart/form-data">
            <div class="form-group">
            <label><b>No. of months</b></label>
                <input type="number" name="plan" class="form-control" placeholder="Plan (months)" required>
            </div>
            <div class="form-group">
            <label><b>Interest rate</b></label>
                        <select name="rate" placeholder="Interest " class="form-control" required>
                                <option value="">Interest (%)</option>
                                <?php 
                                $query ="SELECT rate FROM tbl_interest";
                                $query_run = $connection->query($query);
                                if($query_run->num_rows> 0){
                                    while($optionData=$query_run->fetch_assoc()){
                                    $option =$optionData['rate'];
                                ?>
                                <?php
                                //selected option
                                if(!empty($name) && $name== $option){
                                // selected option
                                ?>
                                <option value="<?php echo $option; ?>" selected><?php echo $option; ?> </option>
                                <?php 
                            continue;
                            }?>
                                <option value="<?php echo $option; ?>" ><?php echo $option; ?> </option>
                            <?php
                                }}
                                ?>
                            </select>
                        
                        </div>
           
            <input type="submit" name="add_plan" class="btn btn-success" value="Add" style="float: right;width: 100px;">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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