<?php 
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php'); 
include('includes/topbar.php');

?>

<div class="container">
    <h3 align="center" style="color:black !important; padding-bottom:20px; padding-bottom:20px">Register Admin</h3>
    <?php
//      $firstname = $lastname = $email = $pass = $location = $number = "";
      if(isset($_POST["register"])){
    
    $firstname = mysqli_real_escape_string($connection,$_POST["firstname"]);
    $lastname = mysqli_real_escape_string($connection,$_POST["lastname"]);
    $email = mysqli_real_escape_string($connection,$_POST["email"]);
    $pass = mysqli_real_escape_string($connection,$_POST["password"]);
    $password = password_hash($pass, PASSWORD_BCRYPT,["cost"=>10]);
    $query = "SELECT * FROM admins WHERE email = '$email' LIMIT 1 ";
    $result = mysqli_query($connection, $query) or exit(mysqli_errno($connection));

    

if(mysqli_num_rows($result) > 0){
    echo "<div class='alert alert-danger' role='alert'>
                <strong>Email already taken.</strong>
              </div>";
}
 else {
     $sql = "INSERT INTO admins(firstname,lastname,email,password,Date_time) "
             . "VALUES('$firstname','$lastname','$email','$password',NOW())";
//     $stmtinsert = 
     if(mysqli_query($connection, $sql)){
         echo "<div class='alert alert-success' role='alert'>
                Successfully Registered
              </div>";
              // header('Location: register.php');
     }
     
}
      }
?>
    
    
</div>
      



<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>    