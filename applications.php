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

$query = "SELECT * FROM files";
$query_run = mysqli_query($connection, $query);
$counter = 1;
?>
<table class="table table-bordered table-light table-stripped" id="dataTable" width="100%" cellspacing="0">


    <div class="container-fluid">

        <thead>
            <tr>
                <th>#</th>

                <th> File Name </th>
                <th> Size </th>
                <th> Downloads</th>
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
                        <td><?php echo $row['size']; ?></td>
                        <td><?php echo $row['downloads']; ?></td>
                   
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
</table>
</div>


</div>

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>