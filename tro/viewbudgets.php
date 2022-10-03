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

	$query = "DELETE FROM kcca WHERE id=".$id;
	$result = mysqli_query($connection,$query);

	if ($result) 
	{
		echo "<div class='alert alert-success'>Fund DELETED</div>";

	}else{
		echo "<div class='alert alert-danger'>Fund NOT deleted</div>";

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
        <h2 style="text-align: center; margin-bottom: 40px;"><span style="background-color: lavender; border-radius: 10%;">KCCA FUND  MANAGEMENT</span></h2>
            <div class="row">
                <div class="col">
                       
                    <div class="card" style="width: 550px;">
                        <div class="card-title">
                            <h4 style="padding-left: 30px; padding-top: 20px;">Upload call for funding</h4>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid" style="width: 500px; padding: 10px;">
                                <form style="color:black !important;" style="width: 400px;" action="upload2.php" class="mb-4" method="POST" enctype="multipart/form-data">


                                    <div class="form-group">

                                        <!-- <textarea type="text" name="msg" style="height: 200px;" class="form-control" placeholder="Type message here" required></textarea> -->
                                        <input type="file" name="myfile" id="fileToUpload">

                                    </div>
                                    <input type="submit" name="save" class="btn btn-success" value="Send" style="float: right; width: 100px;">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>

        </div>
                
        <div class="col">

<h4 style="color: blue; margin-top: 10px; margin-bottom: 40px;">View Uploads</h4>

<div class="container">
    <?php
    $query = "SELECT * FROM kcca";
    $query_run = mysqli_query($connection, $query);
    $counter = 1;
    ?>
    <table class="table table-bordered table-light table-stripped" id="dataTable" width="100%" cellspacing="0">
        <div class="container-fluid">

            <thead>
                <tr>
                    <th>#</th>
                    <th> File </th>
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
        
            <h2 style="text-align: center; margin-top: 80px;">Budget Calculator</h2>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-4">
                <h4 class="text-center">Add VSLA Expense</h4>
                <hr><br>
                <form action="process.php" method="POST">
                    <div class="form-group">
                        <label for="budgetTitle">Budget Title</label>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="text" name="budget" class="form-control" id="budgetTitle" placeholder="Enter Budget Title" required autocomplete="off"  value="<?php echo $name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter Amount" required  value="<?php echo $amount; ?>">
                    </div>
                    <?php if($update == true): ?>
                    <button type="submit" name="update" class="btn btn-success btn-block">Update</button>
                    <?php else: ?>
                    <button type="submit" name="save" class="btn btn-primary btn-block">Save</button>
                    <?php endif; ?>
                </form>
            </div>
            <div class="col-md-8">
                <h4 class="text-center">Total Expenses :  <span style="color: black;">UGX <?php echo $total;?></span></h4>
                <hr>
                <br><br>

                <?php 

                    if(isset($_SESSION['massage'])){
                        echo    "<div class='alert alert-{$_SESSION['msg_type']} alert-dismissible fade show ' role='alert'>
                                    <strong> {$_SESSION['massage']} </storng>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                                ";
                    }

                ?>
                <h2>Expenses List</h2>

                <?php 
                    
                    $result = mysqli_query($con, "SELECT * FROM budget");
                ?>
                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Budget Name</th>
                                <th>Budget Amount</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <?php 
                            while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td> UGX <?php echo $row['amount']; ?></td>
                                <td>
                                    <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-success">Update</a>
                                    <a style="background-color: maroon;" href="process.php?delete=<?php echo $row['id']; ?>"   class="btn btn-danger" >Delete</a>
                                </td>
                            </tr>
                            

                        <?php endwhile ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<?php
        include('includes/scripts.php');
        include('includes/footer.php');
        ?>