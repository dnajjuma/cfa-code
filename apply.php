<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
?>



<div class="container">
    <!-- <p style="text-align: center;"> Simply enter the chairperson(VSLA representative)'s phone number to send a direct message to them.</p> -->

    <div class="row">
        <div class="col">

            <h4 style="color: blue; margin-top: 10px; margin-bottom: 40px;">View Available Funds</h4>
           <p>All new available funds wil appear here.</p>
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
                                <th> Call </th>
                                <th> View </th>
                                <th> Download </th>

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
        <div class="col">

            <h3 style="text-align: center; color: green; padding-bottom: 40px;" class="mb-0 fw-bold">Apply for funding</h3>
            <div class="table-responsive">
                <div class="page-wrapper">
                    <div class="card">
                        <div class="card-title">
                            <h4 style="padding-left: 30px; padding-top: 20px;">Draft application letter</h4>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid" style="width: 500px; padding: 10px;">
                                <form style="color:black !important;" action="upload.php" class="mb-4" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <a href="newvslaa.php" data-toggle="modal" data-target="#vslaModal">Click here to fill application form >> </a>
                                    </div>

                                    <div class="form-group" style="margin-bottom: 50px;">

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
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="vslaModal" role="dialog" aria-labelledby="exampleModalLabel" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 700px !important;">
                        <div class="modal-header">
                            <h5 class="modal-title"> FILL IN YOUR VSLA DETAILS</h5>

                        </div>
                        <div class="modal-body">
                            <form style="color:black !important;" action="newvslaaform.php" class="mb-4" method="POST" enctype="multipart/form-data">
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

                                <input type="submit" name="add" class="btn btn-success" value="Submit" style="float: right; width: 100px;">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        include('includes/scripts.php');
        include('includes/footer.php');
        ?>


    </div>
</div>

</div>








<?php
include('includes/scripts.php');
include('includes/footer.php');
?>