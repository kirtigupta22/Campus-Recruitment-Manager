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
			<b><h3>PLACEMENT OFFERS AVAILABLE</h3></b>
			
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
	    
		$studentdetails = "SELECT p_offer_id,uid_no,comp_id,offer_type,annual_package,internship_requirement FROM placement_offers WHERE uid_no='".$registration."';";
	    //$headings = array("reg_no","name","age","address","mobile_no","email","course_type","cgpa","credits_completed","branch","school");
		$studentdetailsretrieved = mysqli_query($mysqlconnect,$studentdetails);
		echo('<table class="table">');
		$i=0;
		if($studentdetailsretrieved!==false){
		while($row = mysqli_fetch_array($studentdetailsretrieved,MYSQLI_ASSOC)){

			$i=$i+1;
			  $p_offer_id = $row['p_offer_id'];
		      $regno = $row['uid_no'];
			  $comp_id = $row['comp_id'];
			  //$comp_name = $row['name'];
			  $offer_type = $row['offer_type'];
			  $annual_package = $row['annual_package'];
			  $internship_requirement = $row['internship_requirement'];
	
			  echo('<tbody>
			  <tr>
            <th scope="row"><strong>PLACEMENT ID:</strong></th>
            <td>'.$p_offer_id.'</td>
        </tr>
        <tr>
            <th scope="row"><strong>REG. NO:</strong></th>
            <td>'.$regno.'</td>
        </tr>
		<tr>
            <th scope="row"><strong>COMPANY ID:</strong></th>
            <td>'.$comp_id.'</td>
        </tr>
		<tr>
		<tr>
            <th scope="row"><strong>OFFER TYPE:</strong></th>
            <td>'.$offer_type.'</td>
        </tr>
		<tr>
            <th scope="row"><strong>ANNUAL PACKAGE:</strong></th>
            <td>'.$annual_package.'</td>
        </tr>
		<tr>
            <th scope="row"><strong>INTERNSHIP REQUIRED:</strong></th>
            <td>'.$internship_requirement.'</td>
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
	    
		$studentdetails = "SELECT p_offer_id,uid_no,comp_id,offer_type,annual_package,internship_requirement FROM placement_offers WHERE uid_no='".$registration."';";
	    //$headings = array("reg_no","name","age","address","mobile_no","email","course_type","cgpa","credits_completed","branch","school");
		$studentdetailsretrieved = mysqli_query($mysqlconnect,$studentdetails);
		echo('<table class="table">');
		$i=0;
		if($studentdetailsretrieved!==false){
		while($row = mysqli_fetch_array($studentdetailsretrieved,MYSQLI_ASSOC)){

			$i=$i+1;
			  $p_offer_id = $row['p_offer_id'];
		      $regno = $row['uid_no'];
			  $comp_id = $row['comp_id'];
			  //$comp_name = $row['name'];
			  $offer_type = $row['offer_type'];
			  $annual_package = $row['annual_package'];
			  $internship_requirement = $row['internship_requirement'];
	
			  echo('<tbody>
			  <tr>
            <th scope="row"><strong>PLACEMENT ID:</strong></th>
            <td>'.$p_offer_id.'</td>
        </tr>
        <tr>
            <th scope="row"><strong>REG. NO:</strong></th>
            <td>'.$regno.'</td>
        </tr>
		<tr>
            <th scope="row"><strong>COMPANY ID:</strong></th>
            <td>'.$comp_id.'</td>
        </tr>
		<tr>
		<tr>
            <th scope="row"><strong>OFFER TYPE:</strong></th>
            <td>'.$offer_type.'</td>
        </tr>
		<tr>
            <th scope="row"><strong>ANNUAL PACKAGE:</strong></th>
            <td>'.$annual_package.'</td>
        </tr>
		<tr>
            <th scope="row"><strong>INTERNSHIP REQUIRED:</strong></th>
            <td>'.$internship_requirement.'</td>
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
$reg = $_COOKIE['usernamesaved'];
if($regno==0 && $user=="student"){
echo('
<div style="width: 50%; margin: 20px auto">
<form action = "navigation.php?page=offers&regno=1&login=1" method = "POST">
    <div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER STUDENT UNIQUE-ID NUMBER: </label><input type = "text" name = "registration" placeholder ="unique-id number" class="form-control" value="'.$reg.'" readonly title="Non-editable text"></div>
    <div class ="form-group"><Button class ="btn btn-large btn-primary btn-block">Submit</Button></div>
    </form>
	<div>
');
}
if($regno==0 && $user=="employee"){
echo('
<div style="width: 50%; margin: 20px auto">
<form action = "navigation.php?page=offers&regno=1&login=1" method = "POST">
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