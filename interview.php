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
			<b><h3>INTERVIEW DETAILS</h3></b>
			
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
	    
		$studentdetails = "SELECT interview_id , date,time,venue,round_name FROM interveiws WHERE comp_id='".$compid."';";
	    //$headings = array("reg_no","name","age","address","mobile_no","email","course_type","cgpa","credits_completed","branch","school");
		$studentdetailsretrieved = mysqli_query($mysqlconnect,$studentdetails);
		echo('<table class="table">');
		$i=0;
		if($studentdetailsretrieved!==false){
		while($row = mysqli_fetch_array($studentdetailsretrieved,MYSQLI_ASSOC)){

			$i=$i+1;
		      $interview_id = $row['interview_id'];
			  $date = $row['date'];
			  $time = $row['time'];
			  $venue = $row['venue'];
			  $round_name = $row['round_name'];
	
			  echo('<tbody>
        <tr>
            <th scope="row"><strong>INTERVIEW ID:</strong></th>
            <td>'.$interview_id.'</td>
        </tr>
		<tr>
            <th scope="row">DATE:</th>
            <td>'.$date.'</td>
        </tr>
		<tr>
            <th scope="row">TIME:</th>
            <td>'.$time.'</td>
        </tr>
		<tr>
            <th scope="row">VENUE:</th>
            <td>'.$venue.'</td>
        </tr>
		<tr>
            <th scope="row">ROUND NAME:</th>
            <td>'.$round_name.'</td>
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
if($regno==0){
echo('
<div style="width: 50%; margin: 20px auto">
<form action = "navigation.php?page=interview&regno=1&login=1" method = "POST">
    <div class="form-group"><label style="text-shadow:2px 2px 2px #000">ENTER COMPANY ID: </label><input type = "text" name = "compid" placeholder ="Company ID" class="form-control" required pattern="100[0-9]{1}"></div>
    <div class ="form-group"><Button class ="btn btn-large btn-primary btn-block">Submit</Button></div>
    </form>
	<div>
');
}
?>
</div>
</body>
</html>