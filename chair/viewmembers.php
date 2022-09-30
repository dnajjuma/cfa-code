<?php 
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php'); 


 ?>
 	<div class="container">
        <h2 align="center" class="mb-4" style="padding-top:15px; padding-bottom:20px"> MEMBERS </h2>
        
     
     
     <?php	 
 	if (isset($_POST['deletebtn'])) {
	$id = $_POST['delete_id'];

	$query = "DELETE FROM tbl_member WHERE id=".$id;
	$result = mysqli_query($connection,$query);

	if ($result) 
	{
		echo "<div class='alert alert-success'>Member DELETED</div>";

	}else{
		echo "<div class='alert alert-danger'>Member NOT deleted</div>";

	}
}


$searchErr = '';
$member_details='';
if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $con->prepare("select * from tbl_member where memberName like '%$search%' or age like '%$search%' or contact like '%$search%' or address like '%$search%' or nextOfKin like '%$search%'");
        $stmt->execute();
        $member_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
         
    }
    else
    {
        $searchErr = "Please enter the information";
    }
    
}
 


?>
 		<div class="table-responsive">
            
            <?php
               
                $query = "SELECT * FROM tbl_member";
                $query_run = mysqli_query($connection, $query);
                $counter = 1;
            ?>

<a href="newmember.php" class="btn btn-primary" style=" margin-bottom: 20px;" data-toggle="modal" data-target="#memberModal"> ADD </a>
        <a href="viewdata.php" target="_blank" class="btn btn-dark" style="margin-bottom: 20px; border-radius: 25%;"> Print Report </a>
        <div class="container-fluid">

            <table class="table table-bordered table-light table-stripped" id="dataTable" width="100%" cellspacing="0">

                    <div class="table-responsive">
                            <table class="table" id="table-data">
                                <thead>
                                <tr>
                        <th>#</th>
                        <!-- <th> Image </th> -->
                        <th> Member </th>
                        <th> Age </th>
                        <th> Contact </th>
                        <th> Address </th>
                        <th> Next Of Kin </th>
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
                        <td><?php echo $row['memberName']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['nextOfKin']; ?></td>
       
                        <td>
                            <form action="edit_member.php" method="POST">                             
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">    
                            <i style="color: green !important; cursor:pointer !important;" type="submit" name="editbtn" class="fas fa-fw fa-pen"></i>
                           <i class="m-r-10 mdi mdi-border-color"></i>
                    
                            <!-- <i style="color: green !important; cursor:pointer !important;" class="fas fa-fw fa-pen"></i> -->
                        </button>
                            
                           
                            
                            </form>
                        </td>
                        <td>
                            <form action="view_member.php" method="POST">
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
            
            <div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> ADD NEW MEMBER </h5>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
        <form style="color:black !important;" action="newmember.php" class="mb-4" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <!-- <label><b>Participant name</b></label> -->
                <input type="text" name="memberName" class="form-control" placeholder="Member name" required>
            </div>
            <div class="form-group">
                <!-- <label><b>Parent name</b></label> -->
                <input type="number" name="age" class="form-control" placeholder="Age" required>
            </div>
            <div class="form-group">
                <!-- <label><b>Contact</b></label> -->
                <input type="text" name="contact" class="form-control" placeholder="Contact" required>
            </div>
            <div class="form-group">
                <!-- <label><b>School</b></label> -->
                <input type="text" name="address" class="form-control" placeholder="Address/Location" required>
            </div>
            <div class="form-group">
                <!-- <label><b>Age</b></label> -->
                <input type="text" name="nextOfKin" class="form-control" placeholder="Next of kin" required>
            </div>
           
            
            <input type="submit" name="addbtn" class="btn btn-success" value="Add" style="float: right;width: 100px;">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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