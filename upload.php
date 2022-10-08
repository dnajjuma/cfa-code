<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'db_cfaax');

$sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    $vslaName = $_POST['vslaName'];
    // name of the uploaded file
    // $filename = $_FILES['myfile']['name'];

    // Count total files
 $countfiles = count($_FILES['myfile']['name']);

 

 // Looping all files
 for($i=0;$i<$countfiles;$i++){
  $filename = $_FILES['myfile']['name'][$i];
 
  // Upload file
  move_uploaded_file($_FILES['myfile']['tmp_name'][$i],'uploads/'.$filename);
    
}
 
    print_r($countfiles);
    // destination of the file on the server
    $destination = 'uploads/' . $filename;
    

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
 
    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
    


    if (!in_array($extension, ['csv', 'xls', 'xlsx', 'pdf'])) {
        echo "You file extension must be .csv, .xls or .pdf";
    } elseif ($_FILES['myfile']['size'][0] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($_FILES['myfile']['tmp_name'][$i],'uploads/'.$filename)) {
            $sql = "INSERT INTO files (name, vslaName, size, downloads, ) VALUES ('$filename', $vslaName, $size, 0)";
            if (mysqli_query($conn, $sql)) {
                // echo "File uploaded successfully";
                header('Location: apply.php');
            }
        } else {
            echo "Failed to upload file.";
        }
        
    }
}
?>