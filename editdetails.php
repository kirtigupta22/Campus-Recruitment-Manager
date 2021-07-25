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
			<b><h3>EDIT PERSONAL DETAILS</h3></b>
			
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
	$username = $_COOKIE['usernamesaved'];
	if(isset($username)){
		$name = $_GET['name'];
		$mobile = $_GET['mobile'];
		$email = $_GET['email'];
		$address = $_GET['address'];
		$age = $_GET['age'];
		$course = $_GET['course'];
		$branch = $_GET['branch'];
		$school	= $_GET['school'];
		$cgpa = $_GET['cgpa'];
		$credits = $_GET['credits'];
	    
		$studentdetails = "UPDATE student SET name = '".$name."',mobile_no = '".$mobile."' ,email = '".$email."',address = '".$address."', age = ".$age." , branch = '".$branch."' , school = '".$school."', credits_completed = ".$credits.", course_type = '".$course."' where Uid_no='".$username."';";
			//		$studentdetails="update student set name = 'ambika',age = 19,address ='delhi', mobile_no='9988776655',email = 'ambika@gmail.com',course_type='BTECH',cgpa = 9.85,credits_completed = 70,branch ='CSE', school = 'SCOPE' where reg_no = '17BCE0795';";
	    //$headings = array("reg_no","name","age","address","mobile_no","email","course_type","cgpa","credits_completed","branch","school");
		$studentdetailsretrieved = mysqli_query($mysqlconnect,$studentdetails);
		if($studentdetailsretrieved){
			echo('<p>Details Updated</p>');
		}
		else{
			echo('<p>Some error occured</p>');
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
		$studentdetails = "SELECT Uid_no,name,mobile_no,email,address,age,course_type,branch,school,cgpa,credits_completed FROM student WHERE Uid_no='".$username."';";
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
echo('
<div style="width: 50%; margin: 20px auto">
<form action = "navigation.php?page=editdetails&regno=1&login=1" method = "POST" >
    <div class="form-group"><label style="text-shadow:2px 2px 2px #000">NAME: </label><input type = "text" name = "name" value ="'.$name.'" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">MOBILE_NO: </label><input type = "text" name = "mobile" pattern="[0-9]{10}" value ="'.$mobile_no.'" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">EMAIL: </label><input type = "text" name = "email" pattern="[a-z]{3,10}.[a-z]{3,15}@xaviers.edu$" title="enter xaviers email-id" value ="'.$email.'" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">ADDRESS: </label><input type = "text" name = "address" value = "'.$address.'" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">AGE: </label><input type = "text" name = "age" value ="'.$age.'" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">COURSE TYPE: </label><input type = "text" name = "course" value ="'.$course_type.'" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">BRANCH: </label><input type = "text" name = "branch" value ="'.$branch.'" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">SCHOOL: </label><input type = "text" name = "school" value ="'.$school.'" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">CGPA: </label><input type = "text" name = "cgpa" value ="'.$cgpa.'" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">CREDITS COMPLETED: </label><input type = "text" name = "credits" value ="'.$credits_completed.'" class="form-control"></div>
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