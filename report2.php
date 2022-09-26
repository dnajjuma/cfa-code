<?php  
 function fetch_data()  
 {  
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "db_cfaax");  
      $sql = "SELECT * FROM tbl_vsla ORDER BY id ASC";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["id"].'</td>  
                          <td>'.$row["vslaName"].'</td>  
                          <td>'.$row["capacity"].'</td>  
                          <td>'.$row["location"].'</td> 
                          <td>'.$row["chairperson"].'</td>
                          <td>'.$row["status"].'</td>
                          <td>'.$row["meeting"].'</td>
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["generate_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("PHP Report Generation");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '8', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <img src="/img/royal3.png" alt="logo"><br/>
      <h1 align="center" >COMMUNITY FUND ADVISOR</h1><br />
      <h4 align="center" padding-bottom="30" >Village Savings & Loan Associations Report 	</h4><br /> 
      <table border="1" cellspacing="0" cellpadding="5" style="padding-top: 20px;">  
           <tr>  
           <th width="5%"><b>Id</b></th>  
           <th width="15%"><b>VSLA</b></th> 
           <th width="5%"><b>CAPACITY</b></th>  
           <th width="15%"><b>LOCATION</b></th> 
           <th width="10%"><b>Activity</b></th> 
           <th width="5%"><b>Males</b></th> 
           <th width="5%"><b>Females</b></th> 
           <th width="10%"><b>Savings</b></th> 
           <th width="5%"><b>Average age</b></th> 
           <th width="5%"><b>Credit Unit</b></th> 
           <th width="5%"><b>Rate of Lending</b></th> 
           <th width="5%"><b>Year</b></th>
           <th width="10%"><b>Shareouts</b></th>
           
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>VSLA report</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br />
           <div class="container">  
                <h4 align="center"> REPORT PREVIEW</h4><br />  
                <div class="table-responsive">  
                	<div class="col-md-12" align="right">
                     <form method="post">  
                          <input type="submit" name="generate_pdf" class="btn btn-success" value="Get PDF" />  
                     </form>  
                     </div>
                     <br/>
                     <br/>
                     <table class="table table-bordered">  
                          <tr>  
                          <th width="5%"><b>Id</b></th>  
                        <th width="20%"><b>VSLA</b></th> 
                        <th width="3%"><b>CAPACITY</b></th>  
                        <th width="10%"><b>LOCATION</b></th>  
                        <!-- <th width="10%"><b>CHAIRPERSON</b></th>   -->
                        <!-- <th width="7%"><b>STATUS</b></th>   -->
                        <!-- <th width="7%"><b>MEETING</b></th>  -->
                        <th width="13%"><b>Activity</b></th> 
                         <th width="13%"><b>Males</b></th> 
                         <th width="13%"><b>Females</b></th> 
                         <th width="13%"><b>Savings</b></th> 
                         <th width="13%"><b>Average age</b></th> 
                         <th width="13%"><b>Credit Unit</b></th> 
                         <th width="13%"><b>Rate of Lending</b></th> 
                         <th width="13%"><b>Year</b></th>
                         <th width="13%"><b>Shareouts</b></th>
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  