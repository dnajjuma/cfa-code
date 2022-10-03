<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
?>


<h1 style="text-align: center;" class="mb-0 fw-bold">Apply for funding</h1>
    <div class="container">
    <p style="text-align: center;"> Simply enter the chairperson(VSLA representative)'s phone number to send a direct message to them.</p>
    <div class="table-responsive">
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">

                        <!-- <h1 class="mb-0 fw-bold">Announce beneficiaries</h1> -->

                    </div>
                    <div class="col-6">
                        <div class="text-end upgrade-btn">

                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid" style="width: 500px; padding: 20px;">
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