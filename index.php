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
        <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- Content Row -->
    <div class="container">
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
                                    Total VSLA Records</div>
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
                                    $query = "SELECT id FROM chairperson ORDER BY id";
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
        </div>
    </div>

    <!-- Content Row -->
    <!-- Content Row -->
    <div class="row">
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'db_cfaax');
        ?>



        <!DOCTYPE HTML>



        <!-- <div class="row"> -->
        <!-- <div class="col-md-6"> -->
        <!-- <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center"> -->

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

                        ['VSLA', 'No. of Members'],
                        <?php
                        $query = "SELECT * from tbl_groups WHERE year='2016'";
                        $exec = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($exec)) {
                            echo "['" . $row['vslaName'] . "'," . $row['capacity'] . "],";
                        }
                        ?>

                    ]);

                    var options = {
                        // title: 'EVENT SUMMARY',
                        pieHole: 0.3,
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
                google.load("visualization", "1", {
                    packages: ["corechart"]
                });
                google.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([

                        ['Year', 'No. of VSLAs'],
                        <?php
                        $query = "SELECT * from tbl_groups";
                        $exec = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($exec)) {
                            echo "['" . $row['year'] . "'," . $row['id'] . "],";
                        }
                        ?>
                        

                    ]);
                    

                    var options = {

                        pieHole: 0.3,
                        pieSliceTextStyle: {
                            color: 'black',
                        },
                        legend: 'none'
                    };
                    var chart = new google.visualization.PieChart(document.getElementById("year_div"));
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
                        ['VSLA', 'Members'],
                        <?php
                        $chartQuery = "SELECT * FROM tbl_groups WHERE year='2017'";
                        $chartQueryRecords = mysqli_query($con, $chartQuery);
                        while ($row = mysqli_fetch_assoc($chartQueryRecords)) {
                            echo "['" . $row['vslaName'] . "'," . $row['capacity'] . "],";
                        }
                        ?>
                    ]);

                    var options = {

                    };

                    var chart = new google.visualization.ImageBarChart(document.getElementById('regions_div'));

                    chart.draw(data, options);
                }
            </script>

            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['corechart', 'line'],
                    'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
                });
                google.charts.setOnLoadCallback(drawBasic);

                function drawBasic() {
                    var data = google.visualization.arrayToDataTable([
                        ['VSLA', 'Savings'],
                        <?php
                        $chartQuery = "SELECT * FROM tbl_groups WHERE year='2016'";
                        $chartQueryRecords = mysqli_query($con, $chartQuery);
                        while ($row = mysqli_fetch_assoc($chartQueryRecords)) {
                            echo "['" . $row['vslaName'] . "'," . $row['savings'] . "],";
                        }
                        ?>
                    ]);

                    var options = {
                        hAxis: {
                            title: 'VSLA'
                        },
                        vAxis: {
                            title: 'Savings'
                        }
                    };


                    var chart = new google.visualization.LineChart(document.getElementById('line_div'));

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
                        ['VSLA', 'Savings'],
                        <?php
                        $chartQuery = "SELECT * FROM tbl_groups WHERE year='2017'";
                        $chartQueryRecords = mysqli_query($con, $chartQuery);
                        while ($row = mysqli_fetch_assoc($chartQueryRecords)) {
                            echo "['" . $row['vslaName'] . "'," . $row['savings'] . "],";
                        }
                        ?>
                    ]);

                    var options = {

                    };

                    var chart = new google.visualization.ImageBarChart(document.getElementById('savings_div'));

                    chart.draw(data, options);
                }
            </script>
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['Bar'],
                    // 'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Year', 'Male', 'Female'],
                        <?php
                        $chartQuery = "SELECT * FROM tbl_groups";
                        $chartQueryRecords = mysqli_query($con, $chartQuery);
                        while ($row = mysqli_fetch_assoc($chartQueryRecords)) {
                            echo "['" . $row['year'] . "'," . $row['males'] .  "'," . $row['females'] . "],";
                        }
                        ?>
                    ]);

                    var options = {
                        chart: {
                            title: 'Company Performance',
                            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                        },
                        bars: 'horizontal' // Required for Material Bar Charts.
                    };

                    var chart = new google.visualization.Bar(document.getElementById('gender_div'));

                    chart.draw(data, options);
                }
            </script>
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['corechart', 'line'],
                    'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
                });
                google.charts.setOnLoadCallback(drawBasic);

                function drawBasic() {
                    var data = google.visualization.arrayToDataTable([
                        ['VSLA', 'Savings'],
                        <?php
                        $chartQuery = "SELECT * FROM tbl_groups WHERE vslaName='Muno'";
                        $chartQueryRecords = mysqli_query($con, $chartQuery);
                        while ($row = mysqli_fetch_assoc($chartQueryRecords)) {
                            echo "['" . $row['vslaName'] . "'," . $row['savings'] . "],";
                        }
                        ?>
                    ]);

                    var options = {
                        hAxis: {
                            title: 'VSLA'
                        },
                        vAxis: {
                            title: 'Savings'
                        }
                    };


                    var chart = new google.visualization.LineChart(document.getElementById('muno_div'));

                    chart.draw(data, options);
                }
            </script>




        </head>

        <body>
            <div>
                <h4 class="card-title"> 2021</h4>
                <!-- <h6>2021</h6> -->
                <!-- <h6 class="card-subtitle">VSLA Vs Capacity</h6> -->
            </div>
            <div class="container">

            </div>
            <!-- <div class="row"> -->
            <!-- <div class="col-lg-4"> -->
            <div class="card">
                <div class="card-body">
                    <h6 class="card-subtitle">Members per VSLA</h6>
                    <div id="columnchart12" style="width: 500px; height: 400px; ">

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                <div class="form-group">
                        <label><b>VSLA performance</b></label>
                        <select name="vslaName" class="form-control" required>
                            <option value="">Select VSLA</option>
                            <?php
                            $query = "SELECT * FROM tbl_groups";
                            $query_run = $connection->query($query);
                            if ($query_run->num_rows > 0) {
                                while ($optionData = $query_run->fetch_assoc()) {
                                    $option = $optionData['vslaName'];
                            ?>
                                    <?php
                                    //selected option
                                    if (!empty($name) && $name == $option) {
                                        // selected option
                                    ?>
                                        <option value="<?php echo $option; ?>" selected><?php echo $option; ?> </option>
                                    <?php
                                        continue;
                                    } ?>
                                    <option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <h5 class="card-subtitle">Muno</h5>
                    <div id="muno_div" style="width: 500px; height: 350px; ">

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-subtitle">2016</h5>
                    <select name="year" class="form-control" required>
                            <option value="">Select Year</option>
                            <?php
                            $query = "SELECT year FROM tbl_groups GROUP BY year DESC";
                            $query_run = $connection->query($query);
                            if ($query_run->num_rows > 0) {
                                while ($optionData = $query_run->fetch_assoc()) {
                                    $option = $optionData['year'];
                            ?>
                                    <?php
                                    //selected option
                                    if (!empty($name) && $name == $option) {
                                        // selected option
                                    ?>
                                        <option value="<?php echo $option; ?>" selected><?php echo $option; ?> </option>
                                    <?php
                                        continue;
                                    } ?>
                                    <option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    <div id="line_div" style="width: 990px; height: 500px">

                    </div>
                </div>
            </div>
            


            

            
            <!-- <div class="card">
                <div class="card-body">
                    <h5 class="card-subtitle">Year</h5>
                    <div id="year_div" style="width: 600px; height: 350px; ">

                    </div>
                </div>
            </div> -->

            <div class="card">
                <div class="card-body">

                    <h6 class="card-subtitle">VSLA Vs Capacity</h6>
                    <div id="savings_div" style="width: 800px; height: 500px; ">

                    </div>


                </div>
            </div>


    </div>




</div>











<?php
include('includes/scripts.php');
include('includes/footer.php');
?>