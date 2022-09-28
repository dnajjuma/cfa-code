<?php
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');


?>
<div class="container">
    <h2 align="center" class="mb-4" style="padding-top:15px; padding-bottom:20px"> Manage loans </h2>



    <?php
    if (isset($_POST['deletebtn'])) {
        $id = $_POST['delete_id'];

        $query = "DELETE FROM tbl_loan WHERE id=" . $id;
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "<div class='alert alert-success'>Loan DELETED</div>";
        } else {
            echo "<div class='alert alert-danger'>Loan NOT deleted</div>";
        }
    }

    ?>
    <div class="table-responsive">

        <?php

        $query = "SELECT * FROM tbl_loan";
        $query_run = mysqli_query($connection, $query);
        $counter = 1;
        ?>





        <div class="container-fluid">

            <a href="report.php" target="_blank" class="btn btn-dark" style=" float: right; margin-bottom: 20px;  border-radius: 25%;"> Print Report </a>
            <a href="newloans.php" class="btn btn-primary" style="float: right; margin-bottom: 20px; margin-right: 5px;" data-toggle="modal" data-target="#loanModal"> ADD </a>
            <a href="newloans.php" class="btn btn-success" style="float: left; margin-bottom: 20px; margin-left: 5px;" data-toggle="modal" data-target="#calcModal"> Loan Calculator </a>
            <table class="table table-bordered table-light table-stripped" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>#</th>
                        <!-- <th> Image </th> -->
                        <th> Amount </th>
                        <th>Loan Details</th>
                        <!-- <th> Total Payable amount</th> -->
                        <th> Participants </th>
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
                                <!-- <td><img src="../picture/ style="width: 200px; height: 200px;"></td> -->
                                <td><?php echo $row['amount']; ?></td>
                                <td>
                                    <p><b>Loan Type:</b> <?php echo $row['loan_type']; ?></p>
                                    <p><b>Plan:</b> <?php echo $row['plan']; ?></< /p>

                                </td>

                                <td>
                                    <p><b>Borrower: </b> <?php echo $row['borrower']; ?></p>
                                    <p><b>Collector: </b> <?php echo $row['collector']; ?></p>


                                </td>





                                <td>
                                    <form action="edit_loan.php" method="POST">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        <i style="color: green !important; cursor:pointer !important;" type="submit" name="deletebtn" class="fas fa-fw fa-pen"></i>
                                        <i class="m-r-10 mdi mdi-border-color"></i>

                                        <!-- <i style="color: green !important; cursor:pointer !important;" class="fas fa-fw fa-pen"></i> -->
                                        </button>



                                    </form>
                                </td>
                                <td>
                                    <form action="viewloans.php" method="POST">
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

            <div class="modal fade" id="loanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 700px;">
                        <div class="modal-header">
                            <h5 class="modal-title"> ADD NEW LOAN </h5>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                        </div>
                        <div class="modal-body">
                            <form style="color:black !important;" action="newloans.php" class="mb-4" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label><b>Amount</b></label>
                                            <input type="number" name="amount" id="amount" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Borrower</b></label>
                                            <select name="borrower" placeholder="Borrower" class="form-control" required>
                                                <option value="">Borrower</option>
                                                <?php
                                                $query = "SELECT fName FROM tbl_borrower";
                                                $query_run = $connection->query($query);
                                                if ($query_run->num_rows > 0) {
                                                    while ($optionData = $query_run->fetch_assoc()) {
                                                        $option = $optionData['fName'];
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
                                            <label><b>Collector</b></label>
                                            <select name="collector" class="form-control" required>
                                                <option value=""> -- </option>
                                                <?php
                                                $query = "SELECT memberName FROM tbl_member";
                                                $query_run = $connection->query($query);
                                                if ($query_run->num_rows > 0) {
                                                    while ($optionData = $query_run->fetch_assoc()) {
                                                        $option = $optionData['memberName'];
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
                                            <label><b>Loan plan (No.of months)</b></label>
                                            <select name="plan" id="plan" class="form-control" required>
                                                <option value=""> -- </option>
                                                <?php
                                                $query = "SELECT plan FROM tbl_plan";
                                                $query_run = $connection->query($query);
                                                if ($query_run->num_rows > 0) {
                                                    while ($optionData = $query_run->fetch_assoc()) {
                                                        $option = $optionData['plan'];
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

                                        <!-- <div class="form-group">
                        <label><b>Period</b></label>
                            <input type="number" name="period" class="form-control"  required>
                        </div> -->



                                        <div class="form-group">
                                            <label><b>Interest rate</b></label>
                                            <input type="number" id="interest" name="rate" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label><b>Type of loan</b></label>
                                            <select name="loan_type" class="form-control" required>
                                                <option value=""> -- </option>
                                                <?php
                                                $query = "SELECT loan_type FROM tbl_loantypes";
                                                $query_run = $connection->query($query);
                                                if ($query_run->num_rows > 0) {
                                                    while ($optionData = $query_run->fetch_assoc()) {
                                                        $option = $optionData['loan_type'];
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




                                        <!-- <div class="form-group">
              
                <input type="number" name="interest" id="irate" class="form-control" placeholder="Interest rate(%)" required>
            </div> -->
                                        <!-- <div class="form-group">
                    
                        <label> Total Payable Amount: </label>
                       
                        <p id="totalPayment">Ush</p>
                        <p id="weeklyPayment">Ush</p>
                        <p id="totalInterest">Ush</p>

                       <button type="submit" class="btn btn-warning" name="check">Check</button>
                        
                    
                    </div> -->


                                    </div>

                                </div>




                                <input type="submit" name="add_btn" class="btn btn-success" value="Add" style="float: right;width: 100px;">

                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="calcModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 700px;">
                        <div class="modal-header">
                            <h5 class="modal-title"> Calculate loans </h5>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                        </div>
                        <div class="modal-body">

                            <div>
                                <h2>CFA Loan Calculator</h2>
                                <form id="loan-form" class="loan-form">
                                    <label>Loan Amount</label>
                                    <input type="number" id="amount" placeholder="Ush">

                                    <label>Interest</label>
                                    <input type="number" id="interest" placeholder="%">

                                    <label>Number of Years</label>
                                    <input type="number" id="years">

                                    <!-- <button type="submit">Calculate</button> -->
                                    <input type="submit" class="btn btn-success" value="Submit" style="float: right;width: 100px;">
                                    <button type="submit"> <a href="viewloans.php">
                                            << Cancel </a> </button>
                                </form>
                            </div>

                            <h2>Calculated Results</h2>
                            <div class="results">
                                <div class="card-1">
                                        <p id="monthlyPayment">Ush</p>
                                        <p class="indicators">Monthly Payments</p>
                                    </div>

                                    <div class="card-2">
                                        <p id="totalInterest">%</p>
                                        <p class="indicators">Total Interest</p>

                                    </div>

                                <div class="card-3">
                                    <p id="totalPayment">Ush</p>
                                    <p class="indicators">Total Amount to be Paid</p>
                                </div>


                                <script>
                                    const loanForm = document.querySelector('#loan-form');
                                    loanForm.addEventListener('submit', (e) => {
                                        e.preventDefault();

                                        //Computing the results
                                        const amount = document.getElementById('amount').value;
                                        const interest = document.getElementById('interest').value;
                                        const years = document.getElementById('years').value;

                                        //Calculate
                                        const principal = parseFloat(amount);
                                        const calculatedInterest = parseFloat(interest) / 100 / 12;
                                        const calculatedPayments = parseFloat(years) * 12;

                                        //Calculating the monthly payment
                                        const x = Math.pow(1 + calculatedInterest, calculatedPayments);
                                        const monthly = (principal * x * calculatedInterest) / (x - 1);
                                        const monthlyPayment = monthly.toFixed(2);

                                        //calculating the total interest
                                        const totalInterest = (monthly * calculatedPayments - principal).toFixed(2);

                                        //calculating the total payment
                                        const totalPayment = (monthly * calculatedPayments).toFixed(2);

                                        //Display elements using DOM manipulation
                                        document.getElementById("monthlyPayment").innerHTML = "Ush " + monthlyPayment;

                                        document.getElementById("totalInterest").innerHTML = "% " + totalInterest;

                                        document.getElementById("totalPayment").innerHTML = "Ush " + totalPayment;
                                    })
                                </script>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php
        include('includes/scripts.php');
        include('includes/footer.php');
        ?>