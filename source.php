<?php 
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php'); 


 ?>


<?php
	include('conn.php');
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>Notification System in PHP</title>
	</head>
	<style>
		label{
			color: blue;
		}
	</style>
<body>
	<!-- <nav class="navbar navbar-default" style="background-color: black">
    <div class="container-fluid">
		<div class="navbar-header text-primary">
			<a class="navbar-brand glyphicon glyphicon-home" style="color: blue;" href="#">Notification System in PHP</a>
		</div>
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<span class="label label-pill label-danger count" style="border-radius:10px;"></span> 
				<span class="glyphicon glyphicon-globe" style="font-size:18px; color: blue;"></span></a>
				<ul class="dropdown-menu"></ul>
			</li>
		</ul>
    </div>
	</nav> -->
	<div style="height:5px;"></div>
	<div class="row">	
		<div class="col-md-3">
		</div>
		<div class="col-md-6 well" style="background-color: #fff; border-radius: 10%;">
			<div class="row">
                <div class="col-lg-12">
                    <center><h2 class="text-primary" style="padding: 20px;">Announce Beneficiaries</h2></center>
					<!-- <hr> -->
				<div>
					<form class="mb-4" method="POST" id="add_form">
						<div class="form-group">
							<label>Title:</label>
							<input type="text" name="title" id="title" class="form-control">
						</div><br>
						<div class="form-group">
							<label>Message:</label>
							<textarea type="text" name="msg" id="msg" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" name="addnew" id="addnew" class="btn btn-primary" value="Send">
						</div>
					</form>
				</div>
                </div>
            </div><br>
			<div class="row">
			<div id="userTable"></div>
			</div>
		</div>
		<div class = "col-md-3">
		</div>
	</div>
</body>

</html>

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>