<?php
// include('includes/header.php');
//fetch.php;
if(isset($_POST["view"])){
	
	include("conn.php");
	if($_POST["view"] != ''){
		mysqli_query($conn,"update `user` set seen_status='1' where seen_status='0'");
	}
	
	$query=mysqli_query($conn,"select * from `user` order by userid desc limit 10");
	$output = '';
 
	if(mysqli_num_rows($query) > 0){
	while($row = mysqli_fetch_array($query)){
	$output .= '
	
	<a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                 <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                               
                            </div>
                            <div class="font-weight-bold">
                            
                            <li style="padding: 15px">
								<a href="#">
								Title: <strong>'.$row['title'].'</strong><br />
								msg: <strong>'.$row['msg'].'</strong>
								</a>
							</li>
                            </div>
                        </a>
	
	
	';
	}
	}
	else{
	$output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
	}
	
	$query1=mysqli_query($conn,"select * from `user` where seen_status='0'");
	$count = mysqli_num_rows($query1);
	$data = array(
		'notification'   => $output,
		'unseen_notification' => $count
	);
	echo json_encode($data);
	
}
