<?php
require_once ('database/dbconfig.php');
$conn = mysqli_connect("localhost", "root", "", "db_cfaax");
$sql = "SELECT * FROM tbl_vsla ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
$counter = 1;
?>

<!DOCTYPE html>
<html>
<head>
<title>Report</title>
<style>
input[type='submit'],input[type='reset']{padding: 10px 25px 8px; color: #000;background-color: #0067ab;}
table{
    width: 50%;
    margin: 30px auto;
    border-collapse: collapse;
    text-align: left;
}
</style>
</head>
<center>
<h1>Records</h1>
<table border="2" cellspacing="5" cellpadding="10">
    <tr>
                        <th>ID</th>
                        <th> VSLA </th>
                        <th> Capacity </th>
                        <th> Location </th>
                        <!-- <th> Chairperson </th> -->
                        <!-- <th> Status </th> -->
                        <!-- <th> Meeting </th> -->
                        <th> Activity </th>
                        <th> Males </th>
                        <th> Females </th>
                        <th> Savings </th>
                        <th> Average age </th>
                        <th> Credit Unit </th>
                        <th> Rate of Lending </th>
                        <th> Year </th>
                        <th> Shareouts </th>
    </tr>  
    
        <?php
                    if(mysqli_num_rows($result) > 0) 
                    {
                        while ($row = mysqli_fetch_assoc($result))
                        {
                            ?>
    <tr>
                        <td><?php echo $counter ?></td>
                        <td><?php echo $row['vslaName']; ?></td>
                        <td><?php echo $row['capacity']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td><?php echo $row['activity']; ?></td>
                        <td><?php echo $row['males']; ?></td>
                        <td><?php echo $row['females']; ?></td>
                        <td><?php echo $row['savings']; ?></td>
                        <td><?php echo $row['averageage']; ?></td>
                        <td><?php echo $row['creditunit']; ?></td>
                        <td><?php echo $row['rateofLending']; ?></td>
                        <td><?php echo $row['year']; ?></td>
                        <td><?php echo $row['shareouts']; ?></td>
    </tr>
    <?php
                        $counter++;}

                    }
                    else{
                        echo "no record found";
                    }                                                                                          
                    ?>
</table>
<a href="report3.php"><input type="submit" name="excel" value="Download Excel"></a>

<a href="report2.php"><input type="submit" name="excel" value="Download PDF"></a>
</center>
</body>
</html>