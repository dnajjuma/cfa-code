<?php
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
use Twilio\Rest\Client;
// Required if your environment does not handle autoloading
require __DIR__ . '../twiliosms/vendor/autoload.php';

if(isset($_POST['mobile']) && isset($_POST['msg'])){
    // Use the REST API Client to make requests to the Twilio REST API


// Your Account SID and Auth Token from twilio.com/console
$sid = 'ACf71f444f2245d989036b1132064297a0';
$token = '10476857fc6bab4dfec209d5cd0d6d6a';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$message = $client->messages->create(
    // the number you'd like to send the message to
    $_POST['mobile'], array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+16822001785',
        // the body of the text message you'd like to send
        'body' => $_POST['msg']
    )
    
    
);

if($message->sid){
echo "Message sent!";
}



}


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
                <form style="color:black !important;" action="" class="mb-4" method="POST">

                    <div class="form-group">

                        <input type="text" name="mobile" class="form-control" placeholder="Enter phone number" required>
                    </div>
                    <div class="form-group">

                        <textarea type="text" name="msg" class="form-control" placeholder="Type message here" required></textarea>
                    </div>
                    <input type="submit" class="btn btn-success" value="Send" style="float: right; width: 100px;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    </div>





            <?php
            include('includes/scripts.php');
            include('includes/footer.php');
            ?>