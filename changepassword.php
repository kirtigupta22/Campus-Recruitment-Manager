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
				<b><h3 >CHANGE PASSWORD</h3></b>
			
		</div>
		
		</div>
	</div>
</div>
</div>
<div class ="details">
<?php
$regno = $_GET['regno'];
$user = $_COOKIE['usersaved'];
$username = $_COOKIE['usernamesaved'];
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
if($dbsucess==1)
{
	$changed = $_GET['changed'];
	if(isset($changed))
	{
		$newpassword = $_GET['newpassword'];
		$newrepasword = $_GET['newrepassword'];
		if($newpassword===$newrepasword)
		{
			if($user=='student')
			{
			$changepassword= "UPDATE student_login SET password = '".$newpassword."' where uid_no = '".$username."'";
			}
			if($user=='employee')
			{
			$changepassword= "UPDATE login SET password = '".$newpassword."' where user_id = '".$username."'";
			}
		     $passwordchanged = mysqli_query($mysqlconnect,$changepassword);
			 if($passwordchanged)
			 {
				 echo('<p>Password changed succesfully</p>');
			 }
			 else
			 {
				 echo('<p>Some error occured</p>');
			 }
		}
		else{
		echo('<div style="width: 50%; margin: 20px auto">
<form action = "navigation.php?page=changepassword&regno=1&login=1&changed=1" method = "POST">
    <div class="form-group"><label style="text-shadow:2x 2x 2x #000">ENTER NEW PASSWORD:&nbsp;&nbsp;&nbsp;&nbsp;</label><input type = "password" name = "password" placeholder ="password" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2x 2x 2x #000">RE-ENTER PASSWORD:&nbsp;&nbsp;&nbsp;&nbsp;</label><input type = "password" name = "repassword" placeholder ="re-type password" class="form-control"></div>
    <div class ="form-group"><Button class ="btn btn-large btn-primary btn-block">Submit</Button></div>
    </form>
	<p>Passswords donot match</p>
	<div>
	'
	);
		}
			  	
		}
	}
	
}

if($regno==0){
echo('
<div style="width: 50%; margin: 20px auto">
<form action = "navigation.php?page=changepassword&regno=1&login=1&changed=1" method = "POST">
    <div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER NEW PASSWORD:&nbsp;&nbsp;&nbsp;&nbsp;</label><input type = "password" name = "password" placeholder ="password" class="form-control"required></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">RE-ENTER ABOVE PASSWORD:&nbsp;&nbsp;&nbsp;&nbsp;</label><input type = "password" name = "repassword" placeholder ="re-type password" class="form-control" required></div>
    <div class ="form-group"><Button class ="btn btn-large btn-primary btn-block">Submit</Button></div>
    </form>
	<div>
');
}
?>
</div>
</body>
</html>