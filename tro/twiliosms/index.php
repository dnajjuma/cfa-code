<?php
include('../security.php');
include('../includes/header.php');
include('../includes/navbar.php');
include('../includes/topbar.php');

// Required if your environment does not handle autoloading
require __DIR__ . '/vendor/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC4d8c6f90acf9094e63f95d851afd373a';
$token = '110093fd7056206f79034848343c57f9';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$client->messages->create(
    // the number you'd like to send the message to
    '+256706235154',
    [
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+19403604016',
        // the body of the text message you'd like to send
        'body' => 'Hello welcome to CFA. Please contact your chairperson to have your details registerd with us.😍'
    ]
);

?>
<div class="container">  
    <div class="table-responsive">
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                                <li class="breadcrumb-item"><a href="index.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">TRO</li>
                            </ol>
                        </nav>
                        <h1 class="mb-0 fw-bold">MESSAGES</h1>

                    </div>
                    <div class="col-6">
                        <div class="text-end upgrade-btn">
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <form style="color:black !important;" action="" class="mb-4" method="POST" enctype="multipart/form-data">

                    <div class="form-group">

                        <input type="text" name="mobile" class="form-control" placeholder="Enter phone number" required>
                    </div>
                    <div class="form-group">

                        <textarea type="text" name="msg" class="form-control" placeholder="Type message here" required></textarea>
                    </div>
                    <input type="submit" name="addbtn" class="btn btn-success" value="Send" style="float: right; width: 100px;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
include('../includes/scripts.php');
include('../includes/footer.php');
?> 