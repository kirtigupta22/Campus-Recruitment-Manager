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
	    
		$studentdetails = "SELECT name,address,contact_no,email_id,month_of_visiting,age_criteria,cgpa_criteria FROM company WHERE comp_id='".$compid."';";
	    //$headings = array("reg_no","name","age","address","mobile_no","email","course_type","cgpa","credits_completed","branch","school");
		$studentdetailsretrieved = mysqli_query($mysqlconnect,$studentdetails);
		echo('<table class="table">');
		$i=0;
		if($studentdetailsretrieved!=false){
			/*if($row = mysqli_fetch_array($studentdetailsretrieved,MYSQLI_ASSOC)==null)
			{
				echo('<p align="center" style="font-size:1.2em">Record does not exist.</p>');
			}*/
		while($row = mysqli_fetch_array($studentdetailsretrieved,MYSQLI_ASSOC)){

			$i=$i+1;
			  $name = $row['name'];
		      $address = $row['address'];
			  $contact = $row['contact_no'];
			  $email = $row['email_id'];
			  $month = $row['month_of_visiting'];
			  $age = $row['age_criteria'];
			  $cgpa = $row['cgpa_criteria'];
			  echo('
<div style="width: 50%; margin: 20px auto">
<form action = "navigation.php?page=editcompanyupdate&regno=1&login=1" method = "POST">
    <div class="form-group"><label style="text-shadow:2px 2px 2px #000">COMPANY ID: </label><input type = "text" name = "compid" value ="'.$compid.'" class="form-control" readonly></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">COMPANY NAME: </label><input type = "text" name = "name" value ="'.$name.'" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">ADDRESS: </label><input type = "text" name = "address" value ="'.$address.'" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">CONTACT NUMBER: </label><input type = "text" name = "contact" value ="'.$contact.'" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">EMAIL ID: </label><input type = "text" name = "email" value ="'.$email.'" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">MONTH OF VISTING: </label><input type = "text" name = "month" value ="'.$month.'" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">AGE CRITERIA: </label><input type = "text" name = "age" value ="'.$age.'" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">CGPA CRITERIA: </label><input type = "text" name = "cgpa" value ="'.$cgpa.'" class="form-control"></div>
    <div class ="form-group"><Button class ="btn btn-large btn-primary btn-block">Submit</Button></div>
    </form>
	<div>
');
	
			  
}

}
	
	}
}
}
if($regno==0){
echo('
<div style="width: 50%; margin: 20px auto">
<form action = "navigation.php?page=editcompany&regno=1&login=1" method = "POST">
    <div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER COMPANY ID: </label><input type = "text" name = "compid" placeholder ="Company ID" class="form-control"></div>
    <div class ="form-group"><Button class ="btn btn-large btn-primary btn-block">Submit</Button></div>
    </form>
	<div>
');
}
?>
</div>
</body>
</html>