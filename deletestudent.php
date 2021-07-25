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
			<b><h3>DELETE STUDENT</h3></b>
			
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
			/* $deletepoffer = "DELETE from placement_offers where uid_no = '".$registration."';";
		     $deletedpoffer = mysqli_query($mysqlconnect,$deletepoffer);
			 $deleteioffer = "DELETE from internship_offers where uid_no = '".$registration."';";
		     $deletedioffer = mysqli_query($mysqlconnect,$deleteioffer);
			 $deletestudentpay = "DELETE from student_payment where uid_no = '".$registration."';";
		     $deletedstudentpay = mysqli_query($mysqlconnect,$deletestudentpay);
			 $deletelogin = "DELETE from student_login where uid_no = '".$registration."';";
		     $deletedlogin = mysqli_query($mysqlconnect,$deletelogin);
			 $deletestudent = "DELETE from student where Uid_no = '".$registration."';";
		     $deletedstudent = mysqli_query($mysqlconnect,$deletestudent);*/
			 $sql = "call deletestudent('".$registration."');";
			 $result = mysqli_query($mysqlconnect,$sql);
			 //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			/* if($deletedpoffer&&$deletedioffer&&$deletedstudent&&$deletedlogin)*/ if($result){
				 echo('<p align="center" style="font-size:1.2em">Student details deleted succesfully</p>');
			 }
			 else{
				 echo('<p align="center" style="font-size:1.2em">Some error occured</p>');
			 }
		
			  	
		}
	}
}

if($regno==0){
echo('
<div style="width: 50%; margin: 20px auto">
<form action = "navigation.php?page=deletestudent&regno=1&login=1&changed=1" method = "POST">
    <div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER UNIQUE-ID NUMBER TO BE DELETED:&nbsp;&nbsp;&nbsp;&nbsp;</label><input type = "text" name = "registration" placeholder ="Unique-id Number" class="form-control" required pattern="19+[0-9]{4}" title="unique id should start with 19,having maximum 6 digits"></div>
    <div class ="form-group"><Button class ="btn btn-large btn-primary btn-block">Submit</Button></div>
    </form>
	<div>
');
}
?>
</div>
</body>
</html>