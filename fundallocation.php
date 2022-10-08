
<?php $con = new mysqli("localhost", "root", "", "db_cfaax"); ?>

<?php
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');


?>
<?php

$query = "SELECT * FROM tbl_approved";
$query_run = mysqli_query($connection, $query);
$counter = 1;
?>
<div class="container">
    <h2 style="text-align: center; margin-top: 80px;">Fund Allocator</h2>
    <p style="text-align: center">NB: Only approved VSLAs will receive funds</p>

    <form action="handlepay.php" method="POST">
        <div class="form-group">
            <label> <b> Available total Amount : </b></label>

            <input type="number" name="total">
        </div>
        <!-- <div class="form-group">
            <label> <b> Approved : </b></label>

            <input type="number" name="approved">
        </div> -->
        <!-- <div class="form-group">
        <label> <b> Requested Amount : </b></label>
        <input type="number" name="amount"  >
        </div> -->

        <div class="form-group">
            <label for="">Approved VSLAs: </label>
            <!-- <input type="number" id="approved" name="approved" readonly value= -->
            <?php
            require 'database/dbconfig.php';
            $query = "SELECT id FROM tbl_approved ORDER BY id";
            $query_run = mysqli_query($connection, $query);

            $approved = mysqli_num_rows($query_run);
            echo '<div class="h5 mb-0 font-weight-bold text-gray-800"><h3>' . $approved . '</h3></div>';
            ?>

            
        </div>

        <button type="submit" name="allocate" class="btn btn-primary" > ALLOCATE</button>
    </form>
   
    

    
    <table class="table table-bordered table-light table-stripped" id="dataTable" width="100%" cellspacing="0">

        <div class="container-fluid">
            <thead>
                <tr>
                    <th>#</th>
                    <th> VSLA Name </th>
                    <th> Requested Amount </th>
                    <th> Given amount </th>
                    <th> Surplus </th>

                </tr>
            </thead>
            <tbody>
                <?php

                $query = "SELECT * FROM tbl_approved";
                $query_run = mysqli_query($connection, $query);
                $counter = 1;

              
                ?>

                <?php
                if (mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                        <tr>
                            <td><?php echo $counter ?></td>
                            <td><?php echo $row['vslaName']; ?></td>
                            <td><?php echo $row['amount']; ?></td>
                            <td><?php echo $row['given'] ?></td>
                            <td><?php echo $row['surplus'] ?></td>
                        </tr>
                
                <?php
                        $counter++;
                    }
                } else {
                    echo "no record found";
                }
                ?>
            </tbody>
    </table>

</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>