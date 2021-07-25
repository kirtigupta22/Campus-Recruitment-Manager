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
			<b><h3>STUDENT PAYMENTS</h3></b>
			
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
	$registration = $_GET['registration'];
	if(isset($registration)){
	    
		$studentdetails = "SELECT payment_id,uid_no,amt_paid,amt_balance FROM student_payment WHERE uid_no='".$registration."';";
	    //$headings = array("reg_no","name","age","address","mobile_no","email","course_type","cgpa","credits_completed","branch","school");
		$studentdetailsretrieved = mysqli_query($mysqlconnect,$studentdetails);
		echo('<table class="table">');
		$i=0;
		if($studentdetailsretrieved!=false){
			/*if(($row = mysqli_fetch_array($studentdetailsretrieved,MYSQLI_ASSOC))==null)
			{
				echo('<p align="center" style="font-size:1.2em">Record does not exist.</p>');
				die();
			}*/
		while($row = mysqli_fetch_array($studentdetailsretrieved,MYSQLI_ASSOC)){

			$i=$i+1;
			  $payment_id = $row['payment_id'];
		      $uidno = $row['uid_no'];
			  $amt_paid = $row['amt_paid'];
			  $amt_balance = $row['amt_balance'];
			  echo('
<div style="width: 50%; margin: 20px auto">
<form action = "navigation.php?page=editpaymentsupdate&regno=1&login=1" method = "POST">
 
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">UNIQUE-ID NUMBER: </label><input type = "text" name = "registration" value ="'.$registration.'" class="form-control" readonly title="read-only parameter cannot be edited."></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">AMOUNT PAID: </label><input type = "text" name = "paid" value ="'.$amt_paid.'" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">AMOUNT BALANCE: </label><input type = "text" name = "balance" value ="'.$amt_balance.'" class="form-control"></div>
    <div class ="form-group"><Button class ="btn btn-large btn-primary btn-block">Submit</Button></div>
    </form>
	<div>
');
	
	}		  

if($amt_balance==0){
	echo('<div class ="pagecontent">
<div class="container dis">
	<div class="row">
		<div class="col-lg-12">
			<div id="content">
			<b><h3>Status Successfull</h3></b>
			
		</div>
		
		</div>
	</div>
</div>
</div>');
}
else{
	echo('
	<div class ="pagecontent">
<div class="container dis">
	<div class="row">
		<div class="col-lg-12">
			<div id="content">
			<b><h3>Status Pending</h3></b>
			
		</div>
		
		</div>
	</div>
</div>
</div>');
}
}
	}
}
}
if($regno==0){
echo('
<div style="width: 50%; margin: 20px auto">
<form action = "navigation.php?page=editpayments&regno=1&login=1" method = "POST">
    <div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER STUDENT UNIQUE-ID NUMBER: </label><input type = "text" name = "registration" placeholder ="unique-id number" class="form-control" required pattern="19+[0-9]{4}" title="unique id should start with 19,having maximum 6 digits"></div>
    <div class ="form-group"><Button class ="btn btn-large btn-primary btn-block">Submit</Button></div>
    </form>
	<div>
');
}
?>
</div>
</body>
</html>