<?php
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');


?>

<div class="container">
    <h2 align="center" class="mb-4" style="padding-bottom:15px; padding-bottom:20px"> Review applications </h2>
    <?php

    $query = "SELECT * FROM myfiles";
    $query_run = mysqli_query($connection, $query);
    $counter = 1;
    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-bordered table-light table-stripped" id="dataTable" width="100%" cellspacing="0">


                    <div class="container-fluid">

                        <thead>
                            <tr>
                                <th>#</th>

                                <th> File Name </th>
                                <!-- <th> VSLA </th> -->

                                <th> View </th>
                                <th> Download </th>

                                <th> &#10004;</th>
                                <th style="color: red; font-size:1.5rem;"> &#120; </th>

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
                                        <td><?php echo $row['file_name']; ?></td>




                                        <td><a href="uploads/<?php echo $row['file_name']; ?>" target="_blank">View</a></td>


                                        <td><a href="uploads/<?php echo $row['file_name']; ?>" download>Download</td>

                                        <td>
                                            <a href="" class="btn btn-success" style=" margin-bottom: 20px;" data-toggle="modal" data-target="#approveModal"> APPROVE </a>
                                        </td>

                                        <td>
                                            <a href="" class="btn btn-danger" style=" margin-bottom: 20px;" data-toggle="modal" data-target="#rejectModal"> REJECT </a>
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
                </table>
            </div>
            <div class="col">
                <h4 style=" color: green; padding-bottom: 40px;" class="mb-0 fw-bold"> APPROVED VSLAs</h4>

                <?php

                $query = "SELECT * FROM tbl_approved";
                $query_run = mysqli_query($connection, $query);
                $counter = 1;



                ?>

                <?php
                if (isset($_POST['deletebtn'])) {
                    $id = $_POST['delete_id'];

                    $query = "DELETE FROM tbl_approved WHERE id=" . $id;
                    $result = mysqli_query($connection, $query);

                    if ($result) {
                        echo "<div class='alert alert-success'> VSLA DELETED</div>";
                    } else {
                        echo "<div class='alert alert-danger'> VSLA NOT deleted</div>";
                    }
                }

                ?>

                <table class="table table-bordered table-light table-stripped" id="dataTable" width="100%" cellspacing="0">


                    <div class="container-fluid">

                        <thead>
                            <tr>
                                <th>#</th>

                                <th> VSLA </th>
                                <th> AMOUNT </th>
                                <th> DELETE </th>


                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            if (mysqli_num_rows($query_run) > 0) {
                                while ($row = mysqli_fetch_assoc($query_run)) {
                            ?>
                                    <tr>
                                        <td><?php echo $counter ?></td>
                                        <td><?php echo $row['vslaName']; ?></td>
                                        <td><?php echo $row['amount']; ?></td>
                                        <td>
                                            <form action="applications.php" method="POST">
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
                </table>

            </div>
        </div>
    </div>

</div>


</div>

<div class="modal fade" id="rejectModal" role="dialog" aria-labelledby="exampleModalLabel" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> REJECT APPLICATION </h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <!-- <form style="color:black !important;" id="add_form2" action="newtypes.php" class="mb-4" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>VSLA</label>
                        <select name="vslaName" id="vslaName" class="form-control" required>
                            <option value=""> -- </option>
                            <?php
                            $query = "SELECT vslaName FROM tbl_groups";
                            $query_run = $connection->query($query);
                            if ($query_run->num_rows > 0) {
                                while ($optionData = $query_run->fetch_assoc()) {
                                    $option = $optionData['vslaName'];
                            ?>
                                    <?php
                                    //selected option
                                    if (!empty($name) && $name == $option) {
                                        // selected option
                                    ?>
                                        <option value="<?php echo $option; ?>" selected><?php echo $option; ?> </option>
                                    <?php
                                        continue;
                                    } ?>
                                    <option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Reason</label>
                        <textarea type="text" name="reason" id="reason" class="form-control" required></textarea>
                    </div>


                    <input type="submit" name="addnew2" id="addnew2" class="btn btn-danger" value="Send" style="float: right;width: 100px;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form> -->

                <form class="mb-4" method="POST" id="add_form">
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div><br>
                    <div class="form-group">
                        <label>Message:</label>
                        <textarea type="text" name="msg" id="msg" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" style="float: right;" name="addnew" id="addnew" class="btn btn-primary" value="Send">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="approveModal" role="dialog" aria-labelledby="exampleModalLabel" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> APPROVE APPLICATION </h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <form style="color:black !important;" action="newapproved.php" class="mb-4" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>VSLA</label>
                        <select name="vslaName" id="vslaName" class="form-control" required>
                            <option value=""> -- </option>
                            <?php
                            $query = "SELECT vslaName FROM tbl_groups";
                            $query_run = $connection->query($query);
                            if ($query_run->num_rows > 0) {
                                while ($optionData = $query_run->fetch_assoc()) {
                                    $option = $optionData['vslaName'];
                            ?>
                                    <?php
                                    //selected option
                                    if (!empty($name) && $name == $option) {
                                        // selected option
                                    ?>
                                        <option value="<?php echo $option; ?>" selected><?php echo $option; ?> </option>
                                    <?php
                                        continue;
                                    } ?>
                                    <option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Required amount</label>
                        <input type="number" name="amount" id="amount">
                        <!-- <textarea type="text" name="amount" id="reason" class="form-control" required></textarea> -->
                    </div>


                    <input type="submit" name="newapproved" class="btn btn-warning" value="Add" style="float: right;width: 100px;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>