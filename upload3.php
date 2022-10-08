<?php
require('php-excel-reader/excel_reader2.php');
require('spreadsheet-reader/SpreadsheetReader.php');
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'db_cfaax');

$sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];
    $finyear = $_POST['finyear'];
    
    echo $filename;
    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['csv', 'xls', 'xlsx'])) {
        echo "You file extension must be .xls, .xlsx or .csv";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            //read the xls file and print the rows
            $reader = new SpreadsheetReader($destination);
            $i = 0;
            $insert = false;
            foreach ($reader as $row) {
                if ($i == 0) {
                    $i++;
                    continue;
                }
                //check if $row[1] == Budget
                if($row[1] == "Budget") {
                    $insert = true;
                    continue;
                }
                if($insert) {
                    //insert activities and budget into tbl_funds
                    $sql = "INSERT INTO tbl_funds (`activity`, `amount`, `year`) VALUES ('$row[0]', $row[1], $finyear)";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo "New record created successfully !";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

                }

            }
            $sql = "INSERT INTO budgets (name, size, downloads, finyear) VALUES ('$filename', $size, 0, $finyear)";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
                header('Location: viewbudgets.php');
            }
        } else {
            echo "Failed to upload file.";
        }
        
    }
}


?>