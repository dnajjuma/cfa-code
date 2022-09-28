<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand mt-4 d-flex align-items-center justify-content-center" href="index.php">
    <div class="">
    <p style="font-size:15px;">Community Fund Advisor</p>  
    </div>
    

</a>


<!-- Heading -->
<div class="sidebar-heading light" style="color: white !important;">
   
    <p></p>
</div>
<hr class="sidebar-divider my-0">

<li class="nav-item">
    <a class="nav-link" href="viewadmins.php">
    <!-- <i class="fa-solid fa-user"></i> -->
        <i style="color: white !important;" class="fas fa-fw fa-user"></i>
        <span style="color: white !important;">Admin</span>
    </a>
    
</li>


<li class="nav-item">
    <a class="nav-link collapsed" href="viewvsla.php">
        <i style="color: white !important;" class="fas fa-fw fa-cog"></i>
        <span style="color: white !important;">VSLAs</span>
    </a>
    
</li>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="viewchair.php">
    <!-- <i class="fa-solid fa-user-group"></i> -->
        <i style="color: white !important;" class="fas fa-fw fa-child"></i>
        <span style="color: white !important;">Chairpersons</span>
    </a>
    
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="funds.php">
    <!-- <i class="fa-solid fa-calendar"></i> -->
        <i style="color: white !important;" class="fas fa-fw fa-calendar"></i>
        <span style="color: white !important;">Fund Advisory</span>
    </a>
    
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="viewbudgets.php">
    <!-- <i class="fa-solid fa-calendar"></i> -->
        <i style="color: white !important;" class="fas fa-fw fa-calendar"></i>
        <span style="color: white !important;">Manage KCCA budget</span>
    </a>
    
</li>

<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Loans</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Manage loans</h6> -->
                        <a class="collapse-item" href="viewloans.php">Manage loans</a>
                        <a class="collapse-item" href="viewplan.php">Loan plans</a>
                        <a class="collapse-item" href="viewtypes.php">Loan types</a>
                        <a class="collapse-item" href="viewborrowers.php">Borrowers</a>
                    </div>
                </div>
            </li>











<!-- Divider -->
<hr class="light">


<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" role="dialog" aria-labelledby="exampleModalLabel" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Are you sure you want to leave? </h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <!-- <div class="modal-body">
                    <p></p>
                </div> -->
                <div class="modal-footer">
                    <a href="index.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
                    
                    <form action="logout.php" method="POST">
                        <button type="submit"  name="logout_btn" class="btn btn-primary">Logout</button>
                    </form>

                    
                </div>
                </div>
            </div>
        </div>