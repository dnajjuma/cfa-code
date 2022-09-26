<?php 
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php'); 


 ?>
<div class="container">
	<h3 align="center" style="padding-top:15px; padding-bottom:20px"> ADMINS </h3>
<?php
if(isset($_POST["deletebtn"])){
	$id = $_GET['id'];

	$query = "DELETE FROM admins WHERE id=".$id;
	$query_run = mysqli_query($connection,$query);

	if ($query_run) 
	{
		echo "<div class='alert alert-success'>Admin DELETED</div>";
	
	}else{
		echo "<div class='alert alert-danger'>Admin NOT deleted</div>";
	}
}
?>

<div class="table-responsive">
            
            <?php
                $query = "SELECT * FROM admins";
                $query_run = mysqli_query($connection, $query);
                $counter = 1;
            ?>
            <!-- <form action="register.php" method="POST" > -->
                 <a  href="register.php" class="btn btn-primary" style=" margin-bottom: 20px;" data-toggle="modal" data-target="#registerModal"> ADD </a>
                                
            <!-- </form> -->

            <table class="table table-bordered table-light table-stripped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> Firstname </th>
                        <th> Lastname </th>
                        <th> Email </th>
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
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <form action="register_edit.php" method="POST">                             
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">    
                            <button type="submit" name="editbtn" class="btn btn-link" > 
                            <i style="color: green !important; cursor:pointer !important;" class="fas fa-fw fa-pen"></i>
                        </button>
                                
                            </form>
                        </td>

                        <td>
                            <form action="viewadmins.php?id=<?php echo $row['id']; ?>" method="POST">
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
            <div class="modal fade" id="registerModal" role="dialog" aria-labelledby="exampleModalLabel" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> ADD NEW ADMIN </h5>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                        </div>
                        <div class="modal-body">
                        <form action="register.php" method="POST" autocomplete="off">

                            <div class="form-group">
                            <!-- <b> <label>Firstname</label></b> -->
                                <input type="text" autocomplete="off" name="firstname" class="form-control"placeholder="Enter Firstname">
                            </div>
                            <div class="form-group">
                                <!-- <b><label>Lastname</label></b> -->
                                <input type="text" autocomplete="off"  name="lastname" class="form-control"placeholder="Enter Lastname">
                            </div>
                            <div class="form-group">
                                <!-- <b><label>Email</label></b> -->
                                <input type="email" autocomplete="new-password" name="email" class="form-control"placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                            <!-- <b> <label>Password</label></b> -->
                                <input autocomplete="new-password" name="password" type="password" class="form-control" id="inlineFormInputGroup" placeholder="Enter Password">
                            </div>
                            <input type="submit" name="register" class="btn btn-primary" value="Register" style="float: right;">
                        </form>

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