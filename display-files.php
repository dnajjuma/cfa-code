<?php
include('upload-script.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            .files{
float: left;
  background: #efefef;
  width: 355px;
  height: 209px;
  text-align: center;
  position: relative;
  border: 5px solid #dbd6d6;
  margin: 0px 5px;
}
.files a{
color: black;
  font-size: 52px;
}
.files p{
  margin-top:38px;
}
.images img{
  width: 355px;
  height: 200px;
}
.images{
  float: left;
  border: 5px solid #dbd6d6;
  margin: 5px;
}
.upload-form{
  width: 40%;
  background: #dbd6d6;
  height: 150px;
  margin:20px;
  text-align: center;
  position: relative;
  left: 18%
}

.upload-form input[type="file"]{
border: 1px solid white;
  line-height: 20px;
  position: relative;
  top: 62px;
  padding: 6px;
}
.upload-form input[type="submit"]{
position: relative;
  top: 62px;
  background: #8f8d8d;
  border: 0px;
  padding: 10px;
  color: white;
  font-weight: bold;
}
        </style>
    </head>
<body>

<?php
if(!empty($fetchFiles)){
  
  foreach($fetchFiles as $fileData){
   
   $allowFileExt = array('jpg','png','jpeg','gif');
      $fileExt = pathinfo($fileData['file_name'], PATHINFO_EXTENSION); 
$fileURL='uploads/'.$fileData['file_name'];
 if(in_array($fileExt, $allowFileExt)){ 
    
    $imgURL='uploads/'.$fileData['file_name'];
    ?>
    <div class="images">
    <img src="<?php echo $fileURL ?>">
    </div>
    <?php
 
}else{
?>

      <div class="files">
        <p>Download Now</p>
       <a href='<?php echo $fileURL ?>'><?php echo $fileExt; ?></a>
   </div>
  
  <?php
}
 }


 }

?>
<!--display files from databse-->
</body>
</html>