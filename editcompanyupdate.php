<!DOCTYPE html>
<html>
<head>
	<title>CAMPUS RECRUITMENT</title>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="studentpersonal.css">
</head>
<body>
<div class ="pagecontent">
<div class="container dis">
	<div class="row">
		<div class="col-lg-12">
			<div id="content">
			<b><h3>EDIT COMPANY DETAILS</h3></b>
			
		</div>
		
		</div>
	</div>
</div>
</div>
<div class ="details">
<?php
$regno = $_GET['regno'];
if($regno==1){
$host ="localhost";
$dbusername ="root";
$dbpassword ="";
$databasename ="campus_recruitments";
$mysqlconnect = mysqli_connect($host,$dbusername,$dbpassword);
$dbselect = mysqli_select_db($mysqlconnect,$databasename);

if($mysqlconnect){
	if($dbselect){
		$dbsucess = 1;
	}
	else{
		$dbsucess =0;
	}
}
else{
	$dbsucess = 0;
}
if($dbsucess==1){
	$compid = $_GET['compid'];
	if(isset($compid)){
	$name = $_GET['name'];
	$address = $_GET['address'];
	$contact = $_GET['contact'];
	$email = $_GET['email'];
	$month = $_GET['month'];
	$age = $_GET['age'];
	$cgpa = $_GET['cgpa'];
	    
		$studentdetails = "UPDATE company SET name = '".$name."' , address= '".$address."', contact_no= ".$contact.", email_id = '".$email."', month_of_visiting= '".$month."', age_criteria= ".$age.", cgpa_criteria = ".$cgpa." where comp_id ='".$compid."';";
			
	    //$headings = array("reg_no","name","age","address","mobile_no","email","course_type","cgpa","credits_completed","branch","school");
		$studentdetailsretrieved = mysqli_query($mysqlconnect,$studentdetails);
		if($studentdetailsretrieved){
			echo('<p align="center" style="font-size:1.2em">Details Updated</p>');
		}
		else{
			echo('<p align="center" style="font-size:1.2em">Some error occured</p>');
		}
		/*echo('<table class="table table-striped table-responsive w-auto aligncenter">');
		$i=0;
		if($studentdetailsretrieved!==false){
		while($row = mysqli_fetch_array($studentdetailsretrieved,MYSQLI_ASSOC)){

			$i=$i+1;
			  $payment_id = $row['payment_id'];
		      $regno = $row['reg_no'];
			  $amt_paid = $row['amt_paid'];
			  $amt_balance = $row['amt_balance'];
	
			  echo('<tbody>
			  <tr>
            <th scope="row"><strong>PAYMENT ID:</strong></th>
            <td>'.$payment_id.'</td>
        </tr>
        <tr>
            <th scope="row"><strong>REG. NO:</strong></th>
            <td>'.$regno.'</td>
        </tr>
		<tr>
            <th scope="row"><strong>AMOUNT PAID:</strong></th>
            <td>'.$amt_paid.'</td>
        </tr>
		<tr>
            <th scope="row"><strong>AMOUNT BALANCE:</strong></th>
            <td>'.$amt_balance.'</td>
        </tr>
		</tbody>
');
			  	
		}
		mysqli_free_result($studentdetailsretrieved);
		}
		if($i==0){
			echo('No Match Found');
		}
		
		echo('</table>');
	}
}*/

}
}
}
?>
</div>
</body>
</html>