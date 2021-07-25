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
			<b><h3>NOTIFICATION MESSAGE</h3></b>
			
		</div>
		
		</div>
	</div>
</div>
</div>
<div class ="details">
<?php
$regno = $_GET['regno'];
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
	{
	    $date = date("Y-m-d");
		$sql = "call deleteoldnotifications('".$date."');";
		$result = mysqli_query($mysqlconnect,$sql);
		$notificationdetails = "SELECT message_id,message_content,post_date,expiry_date FROM notification_messages";
	    //$headings = array("reg_no","name","age","address","mobile_no","email","course_type","cgpa","credits_completed","branch","school");
		$notificationdetailsretrieved = mysqli_query($mysqlconnect,$notificationdetails);
		echo('<table class="table">');
		$i=0;
		if($notificationdetailsretrieved!==false){
		while($row = mysqli_fetch_array($notificationdetailsretrieved,MYSQLI_ASSOC)){
            echo('');
			$i=$i+1;
			  $message_id = $row['message_id'];
		      $message_content = $row['message_content'];
			  $post_date = $row['post_date'];
			  $expiry_date = $row['expiry_date'];
	
			  echo('<tbody>
			  <tr>
            <th scope="row"><strong>MESSAGE ID:</strong></th>
            <td>'.$message_id.'</td>
        </tr>
        <tr>
            <th scope="row"><strong>MESSAGE CONTENT:</strong></th>
            <td>'.$message_content.'</td>
        </tr>
		<tr>
            <th scope="row"><strong>POST DATE:</strong></th>
            <td>'.$post_date.'</td>
        </tr>
		<tr>
            <th scope="row"><strong>EXPIRY DATE:</strong></th>
            <td>'.$expiry_date.'</td>
        </tr>
		</tbody>
');
			  	
		}
		mysqli_free_result($notificationdetailsretrieved);
		}
		if($i==0){
			echo('No Updates');
		}
		
		echo('</table>');
	}
}
}
?>
</div>
</body>
</html>