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
                            <h1 style="color:black !important;">REL ADMIN</h1>
                        </div>
                    <div class="card-body p-0">
                       
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h3 class="h4 text-gray-900 mb-4">Login Here!</h3>

                                        <?php
                                    // $connection = mysqli_connect("localhost","root","","amari");
                                        if (isset($_POST["loginbtn"])) {
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $stmt = $connection->prepare("SELECT id,firstname,lastname,email,password FROM admins WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($userID, $fn, $ln, $em, $pw);
    
        if ($stmt->num_rows > 0) {
            $row = $stmt->fetch();
        if (password_verify($pass, $pw)) {

            session_start();
            // $_SESSION["login"] = $l;
            $_SESSION["firstname"] = $fn;
            $_SESSION["lastname"] = $ln;
            $_SESSION["id"] = $userID;
            $_SESSION["email"] = $em;
            // echo $pw;
            header("Location: index.php");
        }
         else {
            echo "<div class='alert alert-danger' role='alert'>
                    <strong>Wrong email or password.</strong>
                 </div>";
        }
    }
}
                                    ?>

                                    </div>

                                    <form class="user" action="login.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                               	placeholder="Password">
                                        </div>
                                        
                                        <button type="submit" name="loginbtn" class="btn btn-primary btn-user btn-block">Login</button>
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