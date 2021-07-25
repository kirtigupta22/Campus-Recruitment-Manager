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
			<b><h3>DELETE COMPANY</h3></b>
			
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
			/*$deletepoffer = "DELETE from placement_offers where comp_id = '".$compid."';";
		     $deletedpoffer = mysqli_query($mysqlconnect,$deletepoffer);
			 $deleteioffer = "DELETE from internship_offers where comp_id = '".$compid."';";
		     $deletedioffer = mysqli_query($mysqlconnect,$deleteioffer);
			 $deletestudent = "DELETE from company where comp_id = '".$compid."';";
		     $deletedstudent = mysqli_query($mysqlconnect,$deletestudent);*/
			 $sql = "call deletecompany('".$compid."');";
			 $result = mysqli_query($mysqlconnect,$sql);
			 /*if($deletedpoffer&&$deletedioffer&&$deletedstudent)*/
			 if($result)
			 {
				 echo('<p align="center" style="font-size:1.2em">Company details deleted succesfully</p>');
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
<form action = "navigation.php?page=deletecompany&regno=1&login=1&changed=1" method = "POST">
    <div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER COMPANY ID TO BE REMOVED:&nbsp;&nbsp;&nbsp;&nbsp;</label><input type = "text" name = "compid" placeholder ="Company ID" class="form-control" required></div>
    <div class ="form-group"><Button class ="btn btn-large btn-primary btn-block">Submit</Button></div>
    </form>
	<div>
');
}
?>
</div>
</body>
</html>