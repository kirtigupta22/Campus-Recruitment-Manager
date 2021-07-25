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
			<b><h3>ENTER NEW COMPANY</h3></b>
			
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
	$name = $_GET['name'];
	$address = $_GET['address'];
	$contact = $_GET['contact'];
	$email = $_GET['email'];
	$month = $_GET['month'];
	$age = $_GET['age'];
	$cgpa = $_GET['cgpa'];
	
	if(isset($compid)){
	    
		$studentdetails = "INSERT INTO company values('".$compid."','".$name."','".$address."','".$contact."','".$email."','".$month."','".$age."','".$cgpa."');";
		//$student_personal_details = "INSERT INTO student (Uid_no) values('".$registration."');";		
	    //$headings = array("reg_no","name","age","address","mobile_no","email","course_type","cgpa","credits_completed","branch","school");
		$studentdetailsretrieved = mysqli_query($mysqlconnect,$studentdetails);
		//$student_personal_details_retrieved = mysqli_query($mysqlconnect,$student_personal_details);
		if($studentdetailsretrieved){
			echo('<p align="center" style="font-size:1em">New Company Added</p>');
		}
		else{
			echo('<p align="center" style="font-size:1em" >company already exists</p>');
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
if($regno==0){
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
	$username = $_COOKIE['usernamesaved'];
	if(isset($username)){
		//echo('hi');
		$studentdetails = "SELECT user_id,name,mobile,email,address,department FROM placement_officer WHERE user_id='".$username."';";
	    //$headings = array("reg_no","name","age","address","mobile_no","email","course_type","cgpa","credits_completed","branch","school");
		$studentdetailsretrieved = mysqli_query($mysqlconnect,$studentdetails);
		echo('<table class="table">');
		$i=0;
		if($studentdetailsretrieved!==false){
			//echo('hi');
		    //$row = mysqli_fetch_array($studentdetailsretrieved,MYSQLI_ASSOC);
			//echo('$row');
		while($row = mysqli_fetch_array($studentdetailsretrieved,MYSQLI_ASSOC)){
            
			$i=$i+1;
		      //$regno = $row['reg_no'];
			  $name = $row['name'];
			  $mobile = $row['mobile'];
			  $email = $row['email'];
			  $address = $row['address'];
			  $department = $row['department'];
echo('
<div style="width: 50%; margin: 20px auto">
<form action = "navigation.php?page=newcompany&regno=1&login=1" method = "POST">
    <div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER COMPANY ID: </label><input type = "text" name = "compid" placeholder ="Company ID" class="form-control" required></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER COMPANY NAME: </label><input type = "text" name = "name" placeholder ="Company Name" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER COMPANY ADDRESS: </label><input type = "text" name = "address" placeholder ="Company Address" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER CONTACT NO.: </label><input type = "text" name = "contact" placeholder ="Company Contact No" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER COMPANY EMAIL: </label><input type = "text" name = "email" placeholder ="Company Email" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER MONTH OF VISITING: </label><t><select name="month" class="selectpicker show-tick"><option value = "July">July</option>
	<option value = "august">August</option><option value = "september">September</option>
	<option value = "october">October</option><option value = "november">Novemmber</option>
	<option value = "decmeber">December</option><option value = "january">January</option>
	<option value = "february">Februray</option><option value = "march">March</option></select></div>
    <div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER AGE CRITERIA: </label><input type = "text" name = "age" placeholder ="Age Criteria" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER CGPA CRITERIA: </label><input type = "text" name = "cgpa" placeholder ="CGPA Criteria" class="form-control"></div>
	<div class ="form-group"><Button class ="btn btn-large btn-primary btn-block">Submit</Button></div>
    </form>
	<div>
');
	}
}
else{
	echo('hi');
}
	}
}
}
?>
</div>
</body>
</html>