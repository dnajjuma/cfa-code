<?php
include('security.php');
//session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total registered admins</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <?php
                                require 'database/dbconfig.php';
                                $query = "SELECT id FROM admins ORDER BY id";
                                $query_run = mysqli_query($connection, $query);

                                $row = mysqli_num_rows($query_run);
                                echo '<h4>' . $row . '</h4>';
                                ?>


                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-key fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total VSLAs</div>
                            <?php
                            require 'database/dbconfig.php';
                            $query = "SELECT id FROM tbl_groups ORDER BY id";
                            $query_run = mysqli_query($connection, $query);

                            $row = mysqli_num_rows($query_run);
                            echo '<div class="h5 mb-0 font-weight-bold text-gray-800"><h3>' . $row . '</h3></div>';
                            ?>

                        </div>
                        <div class="col-auto">

                            <i class="fas fa-users fa-2x text-gray-300"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Chairpersons</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <?php
                                require 'database/dbconfig.php';
                                $query = "SELECT id FROM tbl_chairperson ORDER BY id";
                                $query_run = mysqli_query($connection, $query);

                                $row = mysqli_num_rows($query_run);
                                echo '<h4> ' . $row . '</h4>';
                                ?>


                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->

        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Events </div>
                            <?php
                            require 'database/dbconfig.php';
                            $query = "SELECT id FROM events ORDER BY id";
                            $query_run = mysqli_query($connection, $query);

                            $row = mysqli_num_rows($query_run);
                            echo '<div class="h5 mb-0 font-weight-bold text-gray-800"><h3>' . $row . '</h3></div>';
                            ?>

                        </div>
                        <div class="col-auto">

                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div> -->


    </div>

    <!-- Content Row -->
    <!-- Content Row -->
    <div class="row">
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'amari');
        ?>


        <!DOCTYPE HTML>
        <html>

        <head>
            <meta charset="utf-8">
            <title>TechJunkGigs</title>
            <script type="text/javascript" src="https://www.google.com/jsapi"></script>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script type="text/javascript">
                google.load("visualization", "1", {
                    packages: ["corechart"]
                });
                google.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([

                        ['Event', 'No. of Participants'],
                        <?php
                        $query = "SELECT * from events";
                        $exec = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($exec)) {
                            echo "['" . $row['event'] . "'," . $row['pnumber'] . "],";
                        }
                        ?>

                    ]);

                    var options = {
                        title: 'EVENT SUMMARY',
                        pieHole: 0.5,
                        pieSliceTextStyle: {
                            color: 'black',
                        },
                        legend: 'none'
                    };
                    var chart = new google.visualization.PieChart(document.getElementById("columnchart12"));
                    chart.draw(data, options);
                }
            </script>

            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['imagebarchart'],
                    'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
                });
                google.charts.setOnLoadCallback(drawRegionsMap);

                function drawRegionsMap() {
                    var data = google.visualization.arrayToDataTable([
                        ['Event', 'Participants'],
                        <?php
                        $chartQuery = "SELECT * FROM events";
                        $chartQueryRecords = mysqli_query($con, $chartQuery);
                        while ($row = mysqli_fetch_assoc($chartQueryRecords)) {
                            echo "['" . $row['event'] . "'," . $row['pnumber'] . "],";
                        }
                        ?>
                    ]);

                    var options = {

                    };

                    var chart = new google.visualization.ImageBarChart(document.getElementById('regions_div'));

                    chart.draw(data, options);
                }
            </script>

        </head>

        <body>
            <!-- <div class="card shadow-lg p-3 mb-3 bg-white rounded">
  <div class="card-body"> -->
            <div class="container-fluid" style="align-self: center">
                <div id="columnchart12" style="width: 50%; height: 350px; ">

                </div>
            </div>
            <!-- </div>
</div> -->
            <!-- <div class="card shadow-lg p-3 mb-3 bg-white rounded" style="padding-left:10px; float: right;">
  <div class="card-body">
    <div class="container-fluid">
        <div id="regions_div" style="width: 100%; height: 350px;"></div>
        </div>
    </div>
   </div>
</div> -->


        </body>

        </html>





    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->






<?php
include('includes/scripts.php');
include('includes/footer.php');
?>