<?php
//include('security.php');
// session_start();
include('includes/header.php');
require("database/dbconfig.php");
?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-header text-center">
                    <!-- <img src="img/cfalogo.png" alt="cfalogo.png" style="height: 60px;"> -->
                    <h1 style="color:black !important; padding-top: 10px">Welcome to CFA</h1>

                </div>
                <div class="card-body p-0">

                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h3 class="h4 text-gray-900 mb-4">Login As</h3>


                                </div>

                                <form class="user" method="POST">
                                   
                                    <div class="form-group">
                                            <label><b>Select User</b></label>
                                            <select name="user_type" class="form-control" required>
                                                <option> -- </option>
                                                <option> TRO </option>
                                                <option> Chairperson </option>
                                                <option> Member </option>

                                               
                                                        
                                            </select>
                                        </div>
                                    

                                    <a href="login.php" type="submit" class="btn btn-link">Continue</a>
                                    <hr>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>


<?php

include('includes/scripts.php');

?>