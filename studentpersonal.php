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
			<b><h3>STUDENT DETAILS</h3></b>
			
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
if($dbsucess==1 && $user=="student"){
	$registration = $_GET['registration'];
	if(isset($registration)){
	    
		$studentdetails = "SELECT Uid_no,name,mobile_no,email,address,age,course_type,branch,school,cgpa,credits_completed FROM student WHERE Uid_no='".$registration."';";
	    $headings = array("Uid_no","name","age","address","mobile_no","email","course_type","cgpa","credits_completed","branch","school");
		$studentdetailsretrieved = mysqli_query($mysqlconnect,$studentdetails);
		echo('<table class="table">');
		$i=0;
		if($studentdetailsretrieved!==false){
		while($row = mysqli_fetch_array($studentdetailsretrieved,MYSQLI_ASSOC)){

			$i=$i+1;
		      $regno = $row['Uid_no'];
			  $name = $row['name'];
			  $mobile_no = $row['mobile_no'];
			  $email = $row['email'];
			  $address = $row['address'];
			  $age = $row['age'];
			  $course_type = $row['course_type'];
			  $branch = $row['branch'];
			  $school = $row['school'];
			  $cgpa = $row['cgpa'];
			  $credits_completed = $row['credits_completed'];
	
			  echo('<tbody>
        <tr>
            <th scope="row"><strong>UID. NO:</strong></th>
            <td>'.$regno.'</td>
        </tr>
		<tr>
            <th scope="row">NAME:</th>
            <td>'.$name.'</td>
        </tr>
		<tr>
            <th scope="row">MOBILE NO:</th>
            <td>'.$mobile_no.'</td>
        </tr>
		<tr>
            <th scope="row">EMAIL:</th>
            <td>'.$email.'</td>
        </tr>
		<tr>
            <th scope="row">ADDRESS:</th>
            <td>'.$address.'</td>
        </tr>
		<tr>
            <th scope="row">AGE:</th>
            <td>'.$age.'</td>
        </tr>
		<tr>
            <th scope="row">COURSE TYPE:</th>
            <td>'.$course_type.'</td>
        </tr>
		<tr>
            <th scope="row">BRANCH:</th>
            <td>'.$branch.'</td>
        </tr>
		<tr>
            <th scope="row">SCHOOL:</th>
            <td>'.$school.'</td>
        </tr>
		<tr>
            <th scope="row">CPGA:</th>
            <td>'.$cgpa.'</td>
        </tr>
		<tr>
            <th scope="row">CREDITS COMPLETED:</th>
            <td>'.$credits_completed.'</td>
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
}
if($dbsucess==1 && $user=="employee"){
	$registration = $_GET['registration'];
	if(isset($registration)){
	    
		$studentdetails = "SELECT user_id,name,mobile,email,address,department FROM placement_officer WHERE user_id='".$registration."';";
	    $headings = array("user_id","name","mobile","email","address","department");
		$studentdetailsretrieved = mysqli_query($mysqlconnect,$studentdetails);
		echo('<table class="table">');
		$i=0;
		if($studentdetailsretrieved!==false){
		while($row = mysqli_fetch_array($studentdetailsretrieved,MYSQLI_ASSOC)){

			$i=$i+1;
		      $userid = $row['user_id'];
			  $name = $row['name'];
			  $mobile_no = $row['mobile'];
			  $email = $row['email'];
			  $address = $row['address'];
			  $department = $row['department'];
			  echo('<tbody>
        <tr>
            <th scope="row"><strong>USER-ID:</strong></th>
            <td>'.$userid.'</td>
        </tr>
		<tr>
            <th scope="row">NAME:</th>
            <td>'.$name.'</td>
        </tr>
		<tr>
            <th scope="row">MOBILE NO:</th>
            <td>'.$mobile_no.'</td>
        </tr>
		<tr>
            <th scope="row">EMAIL:</th>
            <td>'.$email.'</td>
        </tr>
		<tr>
            <th scope="row">ADDRESS:</th>
            <td>'.$address.'</td>
        </tr>
		<tr>
            <th scope="row">DEPARTMENT:</th>
            <td>'.$department.'</td>
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
}
}
if($regno==0 && $user=="student"){
	$reg=$_COOKIE['usernamesaved'];
echo('
<div style="width: 50%; margin: 20px auto">
<form action = "navigation.php?page=studentpersonal&regno=1&login=1" method = "POST">
    <div class="form-group"><label style="font-weight:bold">ENTER STUDENT UNIQUE-ID NUMBER: </label><input type = "text" name = "registration" placeholder ="Uid number" class="form-control" value="'.$reg.'" readonly title="This is non-editable input"></div>
    <div class ="form-group"><Button class ="btn btn-large btn-primary btn-block">Submit</Button></div>
    </form>
	<div>
');
}
if($regno==0 && $user=="employee"){
	$reg=$_COOKIE['usernamesaved'];
echo('
<div style="width: 50%; margin: 20px auto">
<form action = "navigation.php?page=studentpersonal&regno=1&login=1" method = "POST">
    <div class="form-group"><label style="font-weight:bold">ENTER EMPLOYEE USER-ID NUMBER: </label><input type = "text" name = "registration" placeholder ="Uid number" class="form-control" value="'.$reg.'" readonly title="This is non-editable text"></div>
    <div class ="form-group"><Button class ="btn btn-large btn-primary btn-block">Submit</Button></div>
    </form>
	<div>
');
}
?>
</div>
</body>
</html>