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
			<b><h3>ADD INTERVIEW</h3></b>
			
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
	$date = $_GET['date'];
	$time = $_GET['time'];
	$venue = $_GET['venue'];
	$name = $_GET['name'];
	
	if(isset($compid)){
		$message_details = "SELECT interview_id from interveiws;";
		$message_details_retrieved = mysqli_query($mysqlconnect,$message_details);
	    $i=0;
		if($message_details_retrieved!==false){
		while($row = mysqli_fetch_array($message_details_retrieved,MYSQLI_ASSOC)){

			$i=$i+1;
		}
			$i = $i+1;
		$studentdetails = "INSERT INTO interveiws values('IV0".$i."','".$compid."','".$date."','".$time."','".$venue."','".$name."');";
		$studentdetailsretrieved = mysqli_query($mysqlconnect,$studentdetails);
		//$student_personal_details_retrieved = mysqli_query($mysqlconnect,$student_personal_details);
		if($studentdetailsretrieved){
			echo('<p align="center" style="font-size:1.2em">New Interview Added</p>');
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
	    //$headings = array("reg_no","name","age","address","mobile_no","email","course_type","cgpa","credits_completed","branch","school");
		$studentdetailsretrieved = mysqli_query($mysqlconnect,$studentdetails);
		echo('<table class="table table-striped table-responsive w-auto aligncenter">');
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
<form action = "navigation.php?page=addinterview&regno=1&login=1" method = "POST">
    <div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER COMPANY ID: </label><input type = "text" name = "compid" placeholder ="Company ID" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER DATE: </label><input type = "date" name = "date" placeholder ="yyyy-mm-dd" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER TIME: </label><input type = "time" name = "time" placeholder ="hh:mm:ss" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER VENUE: </label><input type = "text" name = "venue" placeholder ="Venue" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER ROUND NAME: </label><input type = "text" name = "name" placeholder ="Round Name" class="form-control"></div>
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