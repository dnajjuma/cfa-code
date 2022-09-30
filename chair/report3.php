<?php
// require_once ('database/dbconfig.php');
$conn = mysqli_connect("localhost", "root", "", "db_cfaax");
$sql = "SELECT * FROM tbl_vsla ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
$output ='<table>
<tr>
        <th align = "center"><b>Id</b></th>  
           <th align = "center"><b>VSLA</b></th> 
           <th align = "center"><b>CAPACITY</b></th>  
           <th align = "center"><b>LOCATION</b></th> 
           <th align = "center"><b>Activity</b></th> 
           <th align = "center"><b>Males</b></th> 
           <th align = "center"><b>Females</b></th> 
           <th align = "center"><b>Savings</b></th> 
           <th align = "center"><b>Average age</b></th> 
           <th align = "center"><b>Credit Unit</b></th> 
           <th align = "center"><b>Rate of Lending</b></th> 
           <th align = "center"><b>Year</b></th>
           <th align = "center"><b>Shareouts</b></th>
</tr>';
while ($excel = mysqli_fetch_assoc($result)) 
{
    $output.='<tr>
    <th align = "center">'.$excel['id'].'</th>
    <th align = "center">'.$excel['vslaName'].'</th>
    <th align = "center">'.$excel['capacity'].'</th>
    <th align = "center">'.$excel['location'].'</th>
    <th align = "center">'.$excel['activity'].'</th>
    <th align = "center">'.$excel['males'].'</th>
    <th align = "center">'.$excel['females'].'</th>
    <th align = "center">'.$excel['savings'].'</th>
    <th align = "center">'.$excel['averageage'].'</th>
    <th align = "center">'.$excel['creditunit'].'</th>
    <th align = "center">'.$excel['rateofLending'].'</th>
    <th align = "center">'.$excel['year'].'</th>
    <th align = "center">'.$excel['shareouts'].'</th>
    </tr>';
}
$output.='</table>';
header('Content-Type:aplication/xls');
header('Content-Disposition:attachment;filename=excel.xls');
echo $output;
?>

