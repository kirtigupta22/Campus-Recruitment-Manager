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
			<u><b><h3>COMPANY DETAILS</h3></b></u>
			
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
	$month = $_GET['month'];
	if(isset($month)){
		$companydetails = "SELECT comp_id,name FROM company where month_of_visiting = '".$month."'";
		$companydetailsretrieved = mysqli_query($mysqlconnect,$companydetails);
		echo('<table class="table">');
		$i=0;
		if($companydetailsretrieved!==false){
		while($row = mysqli_fetch_array($companydetailsretrieved,MYSQLI_ASSOC)){

			$i=$i+1;
		      $comp_id = $row['comp_id'];
			  $name = $row['name'];
			  echo('<tbody>
			  <tr>
            <th scope="row"><strong>COMPANY ID</strong></th>
			<th scope="row"><strong>NAME</strong></th>
			<th scope="row"><strong>REG. NO:</strong></th>
			</tr>
        <tr>
            <td>'.$comp_id.'</td>
			<td>'.$name.'</td>
			<td><a href="navigation.php?page=companycompletedetails&regno=1&login=1&company='.$comp_id.'">Show Details</a></td>
        </tr>
		</tbody>
');
			  	
		}
		mysqli_free_result($companydetailsretrieved);
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
<form action = "navigation.php?page=companydetails&regno=1&login=1" method = "POST">
    <div class="form-group"><label style="text-shadow:2px 2px 2px #000">SELECT MONTH OF VISITING:&nbsp;&nbsp;&nbsp;&nbsp;</label><t><select name="month" class="selectpicker show-tick"><option value = "July">July</option>
	<option value = "august">August</option><option value = "september">September</option>
	<option value = "october">October</option><option value = "november">Novemmber</option>
	<option value = "decmeber">December</option><option value = "january">January</option>
	<option value = "february">Februray</option><option value = "march">March</option></select></div>
    <div class ="form-group"><Button class ="btn btn-large btn-primary btn-block">Submit</Button></div>
    </form>
	<div>
');
}
?>
</div>
</body>
</html>