<?php 

if(isset($_POST['allocate'])){
    $total = $_POST['total'];
  $approved = $_POST['approved'];
  $amount = $_POST['amount'];
  

  $given = $total / $approved;
  echo $given;

  $surplus = $amount - $given;

  
  echo $surplus;

  
}
  

  ?>