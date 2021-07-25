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
			<b><h3>ENTER NEW MESSAGE</h3></b>
			
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
	$message = $_GET['message'];
	$date = $_GET['date'];
	$month = $_GET['month'];
	$year = $_GET['year'];
	$username = $_COOKIE['usernamesaved'];
	
	if(isset($username)){
		$message_details = "SELECT message_id from notification_messages;";
		$message_details_retrieved = mysqli_query($mysqlconnect,$message_details);
	    $i=0;
		if($message_details_retrieved!==false){
		while($row = mysqli_fetch_array($message_details_retrieved,MYSQLI_ASSOC)){

			$i=$i+1;
		}
			$i = $i+1;
		$studentdetails = "INSERT INTO notification_messages values('M00".$i."','".$username."','".$message."',sysdate(),'".$year."-".$month."-".$date."');";
		$studentdetailsretrieved = mysqli_query($mysqlconnect,$studentdetails);
		//$student_personal_details_retrieved = mysqli_query($mysqlconnect,$student_personal_details);
		if($studentdetailsretrieved){
			echo('<p align="center" style="font-size:1.2em">New Notification Posted</p>');
		}
		else{
			echo('<p align="center" style="font-size:1.2em">Some error occured</p>');
		}

}
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
	    $headings = array("reg_no","name","age","address","mobile_no","email","course_type","cgpa","credits_completed","branch","school");
		$studentdetailsretrieved = mysqli_query($mysqlconnect,$studentdetails);
		echo('<table class="table table-striped table-responsive w-auto aligncenter">');
		$i=0;
		if($studentdetailsretrieved!==false){
			//echo('hi');
		    //$row = mysql_fetch_array($studentdetailsretrieved,MYSQL_ASSOC);
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
<form action = "navigation.php?page=addnotification&regno=1&login=1" method = "POST">
    <div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER MESSAGE: </label><input type = "text" name = "message" placeholder ="Message" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER EXPIRY DATE: </label><input type = "date" name = "date" placeholder ="expiry date" class="form-control"></div>
	<div class ="form-group"><Button class ="btn btn-large btn-primary btn-block">Submit</Button></div>
    </form>
	<div>
');
	}
}

	}
}
}
?>
</div>
</body>
</html>