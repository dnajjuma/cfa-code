<?php
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');


?>
<div class="container">
    <h2 align="center" class="mb-4" style="padding-bottom:15px; padding-bottom:20px"> Village Savings and Loan Associations </h2>
    <?php
    if (isset($_POST['deletebtn'])) {
        $id = $_POST['delete_id'];

        $query = "DELETE FROM tbl_groups WHERE id=" . $id;
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "<div class='alert alert-success'>VSLA DELETED</div>";
        } else {
            echo "<div class='alert alert-danger'>VSLA NOT deleted</div>";
        }
    }

    ?>
    <div class="table-responsive">

        <?php

        $query = "SELECT * FROM tbl_groups";
        $query_run = mysqli_query($connection, $query);
        $counter = 1;
        ?>


        <a href="newvslaa.php" class="btn btn-primary" style=" margin-bottom: 20px;" data-toggle="modal" data-target="#vslaModal"> ADD </a>
        <a href="viewdata.php" target="_blank" class="btn btn-dark" style="margin-bottom: 20px; border-radius: 25%;"> Print Report </a>
        <div class="container-fluid">

            <table class="table table-bordered table-light table-stripped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <!-- <th> Image </th> -->
                        <th> VSLA </th>
                        <!-- <th> Chairperson </th> -->
                        <th> Details </th>
                        <!-- <th> Capacity </th>
                        <th> Location </th>
                        <th> Status </th>
                       
                        
                        <!-- <th> Activity </th> -->
                        <th> Gender </th>
                        <!-- <th> Males </th> -->
                        <!-- <th> Females </th> -->
                        <th> Stats </th>
                        <!-- <th> Savings </th> -->
                        <!-- <th> Average age </th> -->
                        <!-- <th> Credit Unit </th> -->
                        <!-- <th> Rate of Lending </th> -->
                        <th> Year </th>
                        <th> Shareouts </th>
                        
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
                                <td><p style="font-size: 13px;"><?php echo $counter ?></p></td>
                                <td>
                                    <p style="font-size: 14px;">
                                    <?php echo $row['vslaName']; ?>
                                    </p>
                                </td>
                             
                                <td>
                                <p style="font-size: 14px;">
                                    No. of members: <?php echo $row['capacity']; ?><br>
                                    Location: <?php echo $row['location']; ?><br>
                                Status: <button class="btn-success" style="border-radius: 10%; height: 25px; font-size: 12px">
                                        <?php echo $row['status']; ?></button> <br>
                               
                                Activity: <?php echo $row['activity']; ?><br>
                                Division: <?php echo $row['division']; ?>
                            </p>
                                
                                </td>
                                <td>
                                <p style="font-size: 14px;">
                                    M: <?php echo $row['males']; ?><br/>
                                    F: <?php echo $row['females']; ?>
                                    </td>
                        </p>
                                <td>
                                   <p style="font-size: 14px;">
                                        Savings: <?php echo $row['savings']; ?><br>
                                Average age: <?php echo $row['averageage']; ?><br>
                           
                                   </p> 
                                </td>
                                <td><p style="font-size: 14px;"><?php echo $row['year']; ?></p></td>
                                <td><p style="font-size: 13px;">
                                    Shareouts:  <?php echo $row['shareouts']; ?><br>
                                    Loans taken: <?php echo $row['loanstaken']; ?><br>
                                    Loans returned: <?php echo $row['loansreturned']; ?><br>
                                </p>
                                </td>

                                <td>
                                    <form action="editvsla.php" method="POST">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="editbtn" class="btn btn-link">
                                        <i style="color: green !important; cursor:pointer !important;" class="fas fa-fw fa-pen"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="viewvsla.php" method="POST">
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
            <div class="modal fade" id="vslaModal" role="dialog" aria-labelledby="exampleModalLabel" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 700px !important;">
                        <div class="modal-header">
                            <h5 class="modal-title"> ADD NEW VSLA </h5>

                        </div>
                        <div class="modal-body">
                            <form style="color:black !important;" action="newvslaa.php" class="mb-4" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label><b>VSLA</b></label>
                                            <input type="text" name="vslaName" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Number of members</b></label>
                                            <input type="number" name="capacity" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Location</b></label>
                                            <input type="text" name="location" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Chairperson</b></label>
                                            <select name="chairperson" class="form-control" required>
                                                <option value="">Select Chairperson</option>
                                                <?php
                                                $query = "SELECT name FROM tbl_chairperson";
                                                $query_run = $connection->query($query);
                                                if ($query_run->num_rows > 0) {
                                                    while ($optionData = $query_run->fetch_assoc()) {
                                                        $option = $optionData['name'];
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
                                            <label><b>Status</b></label>
                                            <select name="status" class="form-control" required>
                                                <option>--select--</option>
                                                <option>ACTIVE</option>
                                                <option style="color: red;">INACTIVE</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label><b>Activity</b></label>
                                            <input type="text" name="activity" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label><b>No. of males</b></label>
                                            <input type="number" name="males" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label><b>Division</b></label>
                                            <select name="division" class="form-control" required>
                                                <option value="">Select Division</option>
                                                <?php
                                                $query = "SELECT division FROM tbl_division";
                                                $query_run = $connection->query($query);
                                                if ($query_run->num_rows > 0) {
                                                    while ($optionData = $query_run->fetch_assoc()) {
                                                        $option = $optionData['division'];
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
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label><b>No. of females</b></label>
                                            <input type="number" name="females" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Savings</b></label>
                                            <input type="number" name="savings" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Average age</b></label>
                                            <input type="number" name="averageage" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Credit unit</b></label>
                                            <input type="number" name="creditunit" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Rate of Lending</b></label>
                                            <input type="text" name="rateofLending" class="form-control" placeholder="Rate of Lending" required>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Year</b></label>
                                            <input type="text" name="year" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Shareouts</b></label>
                                            <input type="number" name="shareouts" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Loans taken</b></label>
                                            <input type="number" name="loanstaken" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Loans returned</b></label>
                                            <input type="number" name="loansreturned" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <input type="submit" name="add" class="btn btn-success" value="Add" style="float: right; width: 100px;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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