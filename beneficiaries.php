<?php require_once 'process.php'; ?>
<?php $con = new mysqli("localhost", "root", "", "db_cfaax"); ?>

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

    $query = "DELETE FROM beneficiary WHERE id=" . $id;
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<div class='alert alert-success'>Budget DELETED</div>";
    } else {
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
           

                    <h4 style="color: blue; margin-top: 10px; margin-bottom: 40px;">Previous Beneficiaries</h4>

                    <div class="container">
                        <?php
                        $query = "SELECT * FROM beneficiary ORDER BY year DESC";
                        $query_run = mysqli_query($connection, $query);
                        $counter = 1;
                        ?>
                        <table class="table table-bordered table-light table-stripped" id="dataTable" width="100%" cellspacing="0">
                            <div class="container-fluid">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> VSLA </th>
                                        <th> Chairperson  </th>
                                        <th> Year </th>
                                        <th> Amount </th>
                                        <!-- <th> Download </th> -->
                                        <!-- <th> Delete </th> -->

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
                                                <td><?php echo $row['vsla']; ?></td>
                                                <td><?php echo $row['chairperson'] ?></td>
                                                <td><?php echo $row['year'] ?></td>
                                                <td><?php echo $row['fund'] ?></td>
                                                
                                                

                                                <!-- <td>
                                                    <form action="beneficiaries.php" method="POST">
                                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="deletebtn" class="btn btn-link">
                                                            <i style="color: maroon !important; cursor:pointer !important;" type="submit" name="deletebtn" class="fas fa-fw fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td> -->
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



        <?php
        include('includes/scripts.php');
        include('includes/footer.php');
        ?>