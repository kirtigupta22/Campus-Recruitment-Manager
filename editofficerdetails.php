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
		$department = $_GET['department'];
	    
		$studentdetails = "UPDATE placement_officer SET name = '".$name."' , mobile= '".$mobile."',email ='".$email."' , address ='".$address."',department = '".$department."' where user_id ='".$username."';";
	    //$headings = array("reg_no","name","age","address","mobile_no","email","course_type","cgpa","credits_completed","branch","school");
		$studentdetailsretrieved = mysqli_query($mysqlconnect,$studentdetails);
		if($studentdetailsretrieved){
			echo('<p align="center" style="font-size:1.2em">Details Updated</p>');
		}
		else{
			echo('<p align="center" style="font-size:1.2em">Some error occured</p>');
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
		mysql_free_result($studentdetailsretrieved);
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
	if(isset($username))
	{
		$studentdetails = "SELECT user_id,name,mobile,email,address,department FROM placement_officer WHERE user_id='".$username."';";
	    $headings = array("reg_no","name","age","address","mobile_no","email","course_type","cgpa","credits_completed","branch","school");
		$studentdetailsretrieved = mysqli_query($mysqlconnect,$studentdetails);
		echo('<table class="table">');
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
<form action = "navigation.php?page=editdetails&regno=1&login=1" method = "POST">
    <div class="form-group"><label style="text-shadow:2px 2px 2px #000">NAME: </label><input type = "text" name = "name" value ="'.$name.'" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">MOBILE_NO: </label><input type = "text" name = "mobile" pattern="[0-9]{10}" value ="'.$mobile.'" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">EMAIL: </label><input type = "text" name = "email" pattern="[a-z]{3,10}.[a-z]{3,15}@xaviers.edu$" title="enter xaviers email-id" value ="'.$email.'" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">ADDRESS: </label><input type = "text" name = "address" value = "'.$address.'" class="form-control"></div>
	<div class="form-group"><label style="text-shadow:2px 2px 2px #000">DEPARTMENT: </label><input type = "text" name = "department" value ="'.$department.'" class="form-control"></div>
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