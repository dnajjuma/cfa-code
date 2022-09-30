<?php

// $connect = new PDO("mysql:host=remotemysql.com;dbname=EWJS22plyZ", "EWJS22plyZ", "WoMM7dkt1h");
// $connect = new PDO("mysql:host=remotemysql.com;dbname=EWJS22plyZ", "EWJS22plyZ", "WoMM7dkt1h");
// $server_name = "localhost";
// $db_username ="root";
// $db_password = "";
// $db_name = "amari";

$server_name = "sql3.freemysqlhosting.net";
$db_username ="sql3438600";
$db_password = "uF3DNjkaU4";
$db_name = "sql3438600";

$connect = mysqli_connect($server_name,$db_username,$db_password,$db_name);
// $dbconfig = mysqli_select_db($connect,$db_name);



   $sql = "SELECT * FROM products
         WHERE categoryid LIKE '%".$_GET['id']."%'"; 


   $result = $connect->query($sql);


   $json = [];
   while($row = $result->fetch_assoc()){
        $json[$row['ProductID']] = $row['Product'];
   }


   echo json_encode($json);

// if(isset($_POST["type"]))
// {
//  if($_POST["type"] == "category_data")
//  {
//   $query = "SELECT * FROM category ORDER BY category ASC";
//   $statement = $connect->prepare($query);
//   $statement->execute();
//   while( $row = $statement->fetch(PDO::FETCH_ASSOC)){
// //   foreach($data as $row)
// //   {
//    $output[] = array(
//     'id'  => $row["categoryid"],
//     'name'  => $row["category"]
//    );
//   }
//   echo json_encode($output);
//  }
//  else
//  {
//   $query = "SELECT * FROM products WHERE categoryid = '".$_POST["category_id"]."' ORDER BY Product ASC";
//   $statement = $connect->prepare($query);
//   $statement->execute();
//   while( $row = $statement->fetch(PDO::FETCH_ASSOC)){
//    $output[] = array(
//     'id'  => $row["ProductID"],
//     'name'  => $row["Product"]
//    );
//   }
//   echo json_encode($output);
//  }
// }

?>