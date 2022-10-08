<?php
//insert.php
if(isset($_POST["title"]))
{
	include('conn.php');
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$msg = mysqli_real_escape_string($conn, $_POST['msg']);
  

	mysqli_query($conn,"insert into `user` (title, msg) values ('$title', '$msg')");
}


?>