<?php
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
include('fundadvisor/ml-requests.php');

?>
<div class="container-fluid">
  <h2 align="center" class="mb-4" style="padding-top:15px; padding-bottom:20px"> Fund Advisory </h2>
  <div class="container-fluid">
    <div class="row">
      <div class="card-deck" style="width: 60rem;">

        <div class="card">
          <!-- <img class="card-img-top" src="img/mane.jpg" alt="Card image cap"> -->
          <div class="card-body">
            <h5 class="card-title"> Savings</h5>
            <!-- <p class="card-text">Click button below, let CFA predict the vsla savings</p> -->
            <a href="newloans.php" class="btn btn-success" data-toggle="modal" data-target="#calcModal"> Predict </a>

          </div>
        </div>
        <div class="card">
          <!-- <img class="card-img-top" src="img/mane.jpg" alt="Card image cap"> -->
          <div class="card-body">
            <h5 class="card-title">Shareouts</h5>
            <!-- <p class="card-text">Click button below, let CFA predict the vsla shareouts.</p> -->
            <a href="newloans.php" class="btn btn-warning" data-toggle="modal" data-target="#calcModal"> Predict </a>

          </div>
        </div>

        <div class="card">
          <!-- <img class="card-img-top" src="img/mane.jpg" alt="Card image cap"> -->
          <div class="card-body">
            <h5 class="card-title"> Loans to be taken</h5>
            <!-- <p class="card-text">Click button below, let CFA predict the loans to be taken from the VSLAs so as to guide yor verdict</p> -->
            <a href="newloans.php" class="btn btn-danger" data-toggle="modal" data-target="#calcModal"> Predict </a>

          </div>
        </div>
        <div class="card">
          <!-- <img class="card-img-top" src="img/mane.jpg" alt="Card image cap"> -->
          <div class="card-body">
            <h5 class="card-title">Loan amount to be returned</h5>
            <!-- <p class="card-text">Click button below, let CFA predict the loans to be returned to the VSLAs so as to guide yor verdict</p> -->
            <a href="newloans.php" class="btn btn-dark" data-toggle="modal" data-target="#calcModal"> Predict </a>

          </div>
        </div>
      </div>

    </div>
    <br>
    <div class="row">
      <div class="card-deck" style="width: 20rem;">

        <div class="card" style="display: flex; justify-content: center; align-items: center;">
          <img class="card-img-top" src="img/mane.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Next beneficiary</h5>
            <!-- <p class="card-text">Pass the verdict</p> -->
            <!-- <a href="newloans.php" class="btn btn-primary" data-toggle="modal" data-target="#calcModal"> Decide </a> -->

            <form method="POST">
              <button type="submit" class="btn btn-primary" name="decidebtn">Decide</button>
            </form>

            <?php

            if (isset($_POST['decidebtn'])) {
              ml_beneficiary($vlsa, $division, $location, $capacity, $average_age, $status, $activity,$male, $female, $meeting, $year, $savings, $shareouts, $loan_taken, $loan_returned);
            }
            
            ?>

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