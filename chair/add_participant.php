<?php 
include('security.php');
include('includes/header.php');
include('includes/navbar.php'); 
include('includes/topbar.php');

?>

    <div class="container">
        <h3 style="color:black !important;" align="center" class="mb-4">Add New Participant</h3>
 <?php 
    if (isset($_POST['add'])) {

    $participant = $_POST['participantName'];
    $parent = $_POST['parentName'];
    $contact = $_POST['contact'];
    $school = $_POST['school'];
    $age = $_POST['age'];
    $event = $_POST['event'];
   
    $query = "INSERT INTO participant_details (`participantName`,`parentName`,`school`,`age`,`contact`,`event`) VALUES ('$participant','$parent','$school','$age','$contact','$event')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
		$_SESSION['success'] = "<div class='alert alert-success'>Participant has been added successfully</div>";
		header('Location: viewparts.php');
	}else{
		$_SESSION['status'] = "<div class='alert alert-danger'>Sorry! Participant could NOT be added</div>";
		header('Location: viewparts.php');
	}

   
    }
    
?>
         
    </div>
    <script>
$( "select[name='category_item']" ).change(function () {
    var stateID = $(this).val();


    if(stateID) {


        $.ajax({
            url: "load_data.php",
            dataType: 'Json',
            data: {'id':stateID},
            success: function(data) {
                $('select[name="sub_category_item"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="sub_category_item"]').append('<option value="'+ key +'">'+ value +'</option>');
                });
            }
        });


    }else{
        $('select[name="sub_category_item"]').empty();
    }
});
</script>

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>    