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
				<b><h3>COMPANY DETAILS</h3></b>
			
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
	$user = $_COOKIE['usersaved'];
	$company_id = $_GET['company'];
	if(isset($company_id)){
		$studentdetails = "SELECT comp_id,name,address,contact_no,email_id,month_of_visiting,age_criteria,cgpa_criteria FROM company WHERE comp_id='".$company_id."';";
	    //$headings = array("reg_no","name","age","address","mobile_no","email","course_type","cgpa","credits_completed","branch","school");
		$studentdetailsretrieved = mysqli_query($mysqlconnect,$studentdetails);
		echo('<table class="table">');
		$i=0;
		if($studentdetailsretrieved!==false){
		while($row = mysqli_fetch_array($studentdetailsretrieved,MYSQLI_ASSOC)){

			  $i=$i+1;
		      $comp_id = $row['comp_id'];
			  $name = $row['name'];
			  $address = $row['address'];
			  $contact_no = $row['contact_no'];
			  $email_id = $row['email_id'];
			  $month_of_visiting = $row['month_of_visiting'];
			  $age_criteria = $row['age_criteria'];
			  $cgpa_criteria = $row['cgpa_criteria'];
			  
	
			  echo('<tbody>
        <tr>
            <th scope="row"><strong>COMPANY ID:</strong></th>
            <td>'.$comp_id.'</td>
        </tr>
		<tr>
            <th scope="row">NAME:</th>
            <td>'.$name.'</td>
        </tr>
		<tr>
            <th scope="row">ADDRESS:</th>
            <td>'.$address.'</td>
        </tr>
		<tr>
            <th scope="row">CONTACT_NO:</th>
            <td>'.$contact_no.'</td>
        </tr>
		<tr>
            <th scope="row">EMAIL ID:</th>
            <td>'.$email_id.'</td>
        </tr>
		<tr>
            <th scope="row">MONTH OF VISITING:</th>
            <td>'.$month_of_visiting.'</td>
        </tr>
		<tr>
            <th scope="row">AGE CRITERIA:</th>
            <td>'.$age_criteria.'</td>
        </tr>
		<tr>
            <th scope="row">CGPA CRITERIA:</th>
            <td>'.$cgpa_criteria.'</td>
        </tr>
		</tbody>
');
			  	
		}
		}
		mysqli_free_result($studentdetailsretrieved);
		}
		if($i==0){
			echo('No Match Found');
		}
		
		echo('</table>');
	}
}

if($regno==0){
echo('
<div style="width: 50%; margin: 20px auto">
<form action = "navigation.php?page=studentpersonal&regno=1&login=1" method = "POST">
    <div class="form-group"><label>ENTER STUDENT REGISTRATION NUMBER: </label><input type = "text" name = "registration" placeholder ="registration number" class="form-control" required></div>
    <div class ="form-group"><Button class ="btn btn-large btn-primary btn-block">Submit</Button></div>
    </form>
	<div>
');
}
?>
</div>
</body>
</html>