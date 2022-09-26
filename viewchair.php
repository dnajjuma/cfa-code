<?php
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');


?>
<div class="container">
    <h2 align="center" class="mb-4" style="padding-top:15px; padding-bottom:20px"> Chairpersons </h2>
    <?php
    if (isset($_POST['deletebtn'])) {
        $id = $_POST['delete_id'];

        $query = "DELETE FROM tbl_chairperson WHERE id=" . $id;
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "<div class='alert alert-success'>Chairperson DELETED</div>";
        } else {
            echo "<div class='alert alert-danger'>Chairperson NOT deleted</div>";
        }
    }

    ?>
    <div class="table-responsive">

        <?php

        $query = "SELECT * FROM tbl_chairperson";
        $query_run = mysqli_query($connection, $query);
        $counter = 1;
        ?>
        <a href="newchair.php" class="btn btn-primary" style=" margin-bottom: 20px;" data-toggle="modal" data-target="#chairModal"> ADD </a>
        <a href="report.php" target="_blank" class="btn btn-dark" style="margin-bottom: 20px; border-radius: 25%;"> Print Report </a>

        <table class="table table-bordered table-light table-stripped" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th> Chairperson </th>
                    <th> Contact </th>
                    <th> Address </th>
                    <th> Photo </th>
                    <th> EDIT </th>
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
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['contact']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><img width="50" src="uploads/<?= $row['image_url'] ?>"></td>

                            <td>
                                <form action="editchair.php" method="POST">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="editbtn" class="btn btn-link">
                                        <i style="color: green !important; cursor:pointer !important;" class="fas fa-fw fa-pen"></i>
                                    </button>



                                </form>
                            </td>
                            <td>
                                <form action="viewchair.php" method="POST">
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
        <div class="modal fade" id="chairModal" role="dialog" aria-labelledby="exampleModalLabel" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> ADD NEW CHAIRPERSON </h5>

                    </div>
                    <div class="modal-body">
                        <form style="color:black !important;" action="newchair.php" class="mb-4" method="POST" enctype="multipart/form-data">

                            <div class="form-group">

                                <input type="text" name="name" class="form-control" placeholder="Full name" required>
                            </div>
                            <div class="form-group">

                                <input type="text" name="contact" class="form-control" placeholder="Contact" required>
                            </div>
                            <div class="form-group">

                                <input type="text" name="address" class="form-control" placeholder="Address" required>
                            </div>
                            <div class="form-group">

                                <input type="file" name="my_image" alt="image" class="form-control" placeholder="Photo" required>
                            </div>
                            <!-- <input type="submit" name="submit" value="Upload"> -->



                            <input type="submit" name="addbtn" class="btn btn-success" value="Add" style="float: right; width: 100px;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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