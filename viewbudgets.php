<?php require_once 'process.php'; ?>
<?php $con = new mysqli("localhost","root","","db_cfaax"); ?>

<?php
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');


?>

<?php	 
 	if (isset($_POST['deletebtn'])) {
	$id = $_POST['delete_id'];

	$query = "DELETE FROM budgets WHERE id=".$id;
	$result = mysqli_query($connection,$query);

	if ($result) 
	{
		echo "<div class='alert alert-success'>Budget DELETED</div>";

	}else{
		echo "<div class='alert alert-danger'>Budget NOT deleted</div>";

	}
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
   

</head>
<body>
    
    <br><br><br>
    <div class="container">
        
        
        <div class="container">
        <!-- <h2 style="text-align: center; margin-bottom: 40px;"><span style="background-color: lavender; border-radius: 10%;"> FUND  MANAGEMENT</span></h2> -->
            <div class="row">
                <div class="col">
                       
                    <div class="card" style="width: 400px;">
                        <div class="card-title">
                            <h4 style="padding-left: 30px; padding-top: 20px;">Manage Budgets</h4>
                            <p style="padding-left: 30px; padding-top: 20px;"> (Please upload excel sheet)</p>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid" style="width: 350px; padding: 10px;">
                                <form style="color:black !important;" style="width: 400px;" action="upload3.php" class="mb-4" method="POST" enctype="multipart/form-data">


                                    <div class="form-group">

                                        <!-- <textarea type="text" name="msg" style="height: 200px;" class="form-control" placeholder="Type message here" required></textarea> -->
                                        <input type="file" name="myfile" id="fileToUpload">

                                    </div>
                                    <div class="form-group">
                                        <label>Financial year: &nbsp;</label>
                                        <select name="finyear" class="form-control" required>
                                                <option>--select--</option>
                                                <option>2016</option>
                                                <option>2017</option>
                                                <option>2018</option>
                                                <option>2019</option>
                                                <option>2020</option>
                                                <option>2021</option>
                                                
                                            </select>
                                    </div>
                                    <input type="submit" name="save" class="btn btn-success" value="Send" style="float: right; width: 100px;">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>

        </div>
                
        <div class="col">

<h4 style="color: blue; margin-top: 10px; margin-bottom: 40px;">View Budgets</h4>

<div class="container">
    <?php
    $query = "SELECT * FROM budgets ORDER BY finyear DESC";
    $query_run = mysqli_query($connection, $query);
    $counter = 1;
    ?>
    <table class="table table-bordered table-light table-stripped" id="dataTable" width="100%" cellspacing="0">
        <div class="container-fluid">

            <thead>
                <tr>
                    <th>#</th>
                    <th> File </th>
                    <th> Financial Year </th>
                    <th> View </th>
                    <th> Download </th>
                    <th>  Delete </th>

                    <!-- <th> ACTION </th> -->
                    <!-- <th> ACTION </th> -->
                </tr>
            </thead>
            <tbody>


                <?php
                if (mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                        <tr>
                            <td><?php echo $counter ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['finyear']?></td>

                            <td><a href="uploads/<?php echo $row['name']; ?>" target="_blank">View</a></td>


                            <td><a href="uploads/<?php echo $row['name']; ?>" download>Download</td>

                            <td>
                            <form action="viewbudgets.php" method="POST">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="deletebtn" class="btn btn-link">
                                    <i style="color: maroon !important; cursor:pointer !important;" type="submit" name="deletebtn" class="fas fa-fw fa-trash"></i>
                                    </button>
                            </form>
                        </td>
                        </tr>

                <?php
                        $counter++;
                    }
                } else {
                    echo "no record found";
                }
                ?>
            </tbody>

        </div>
    </table>
</div>


</div>
                </div>
            </div>
        
           

<?php
        include('includes/scripts.php');
        include('includes/footer.php');
        ?>