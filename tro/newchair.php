<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');

?>

<div class="container">
    <h3 style="color:black !important;" align="center" class="mb-4">Add New Chairperson</h3>
    <?php
    if (isset($_POST['addbtn']) && isset($_FILES['my_image'])) {

        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];

        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];

        if ($error === 0) {
            if ($img_size > 125000) {
                $em = "Sorry, your file is too large.";
                header("Location: viewchair.php?error=$em");
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png");

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'uploads/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    // Insert into Database
                    // $query = "INSERT INTO tbl_chairperson(image_url) 
				    //     VALUES('$new_img_name')";
                    // mysqli_query($connection, $query);
                    // header("Location: view_chair.php");
                } else {
                    $em = "You can't upload files of this type";
                    header("Location: viewchair.php?error=$em");
                }
            }
        } else {
            $em = "unknown error occurred!";
            header("Location: viewchair.php?error=$em");
        }
    } else {
        header("Location: viewchair.php");
    }



    $query = "INSERT INTO chairperson (`name`,`contact`,`address`,`image_url`) VALUES ('$name','$contact','$address','$new_img_name')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "<div class='alert alert-success'>Chairperson has been registered successfully</div>";
        header('Location: viewchair.php');
    } else {
        $_SESSION['status'] = "<div class='alert alert-danger'>Sorry! Chairperson could NOT be added</div>";
        header('Location: viewchair.php');
    }




    ?>
</div>









<?php
include('includes/scripts.php');
include('includes/footer.php');
?>