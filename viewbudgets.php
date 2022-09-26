<?php require_once 'process.php'; ?>
<?php $con = new mysqli("localhost","root","","db_cfaax"); ?>

<?php
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Management System</title> -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->

</head>
<body>
    <!-- <nav class="navbar navbar-dark bg-dark text-center">
    <span class="navbar-brand mb-0 h1 text-center"> <img style="border-radius: 70%;" src="download.jpg" width="45" height="45"> Budget Management System</span>
    </nav> -->
    <br><br><br>
    <div class="container">
        <!-- <div style="background-color: white; width: 400px; position: fixed; top: 50%; left: 50% ; display: flex; align-items: center; justify-content: center;">
        
        </div> -->
        <h5 style="text-align: center; margin-bottom: 40px;">KCCA BUDGET MGT</h5>
        
        <div class="row">
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