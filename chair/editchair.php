<?php 
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php'); 
include('includes/topbar.php');

?>
    <!--table-->
    <div class="page-wrapper">
            <div class="page-breadcrumb">
<div class container-fluid>
    <div class="card shadow mb-4">
	    <div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary"> Make Changes </h6>
	    </div>

	    <div class="card-body">
	    	<?php
	    	$connection = mysqli_connect("localhost","root","","db_cfaax");
	    	if (isset($_POST['editbtn'])) {
				$id = $_POST['edit_id'];
				//echo $id;
				$query = "SELECT * FROM tbl_chairperson WHERE id='$id' ";
				$query_run = mysqli_query($connection, $query);

				foreach ($query_run as $row){
					?>
                    <div class="card">
                            <div class="card-body">
                            <h4 class="card-title m-t-10" style="text-align: center" >Edit Chairperson's details</h4>
                            <p></p>
                            <form action="code.php" method="POST" class="form-horizontal form-material mx-2"  >
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
              <div class="form-group">
                <!-- <label><b>Participant name</b></label> -->
                <input type="text" name="edit_name" value="<?php echo $row['name']?>" class="form-control"  required>
            </div>
            
            <div class="form-group">
                <!-- <label><b>Contact</b></label> -->
                <input type="text" name="edit_contact" value="<?php echo $row['contact']?>" class="form-control"  required>
            </div>
            <div class="form-group">
                <!-- <label><b>School</b></label> -->
                <input type="text" name="edit_address" value="<?php echo $row['address']?>" class="form-control"  required>
            </div>
            <div class="form-group">

               <input type="file" name="edit_my_image" value="<?php echo $row['image_url']?>" class="form-control"  required>
            </div>

            <a href="viewchair.php" class="btn btn-danger" style="float: right; margin-left:5px;"> CANCEL </a>
			<button type="submit" name="updatebtn6" class="btn btn-primary" style="float: right"> Update </button>
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