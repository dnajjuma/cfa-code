<?php
//insert.php


if(isset($_POST["vslaName"]))
{
	include('conn.php');
	
    $vslaName = mysqli_real_escape_string($conn, $_POST['vslaName']);
    $reason = mysqli_real_escape_string($conn, $_POST['reason']);

	mysqli_query($conn,"insert into `user` (vslaName, reason) values ('$vslaName', '$reason')");
}
?>