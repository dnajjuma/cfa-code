<?php
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');

?>

<?php include 'upload.php';?>

    <div class="container">
      <div class="row">
        <form action="upload.php" method="post" enctype="multipart/form-data" >
          <h3>Upload File</h3>
          <input type="file" name="myfile"> <br>
          <button type="submit" name="save">upload</button>
        </form>

        <!-- <form action="download.php" method="post" enctype="multipart/form-data" >
          <h3>Download File</h3>
          <input type="file" name="myfile"> <br>
          <button type="submit" name="save">down</button>
        </form> -->
      </div>
    </div>
  


    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>