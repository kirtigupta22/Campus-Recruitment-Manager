

<?php
$host ="localhost";
$dbusername ="root";
$dbpassword ="";
$databasename ="campus_recruitments";
$mysqlconnect =mysqli_connect($host,$dbusername,$dbpassword);
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
	die('could not connect:'.mysqli_connect_error());
}
if($dbsucess==1){
	
	$login = $_GET['login'];
	if($login==0){
		$user = $_GET['user'];
		setcookie('usersaved',$user,time()+7200);
		$username = $_POST['username'];
		$password = $_POST['password'];
		setcookie('usernamesaved',$username,time()+7200);
		setcookie('passwordsaved',$password,time()+7200);
	}
	if($login==1){
		$username = $_COOKIE['usernamesaved'];
	    $password = $_COOKIE['passwordsaved'];
		$user = $_COOKIE['usersaved'];
	}
	if(isset($username)){
		if($user=="student"){
	    $retrievedpassword = "SELECT password FROM student_login WHERE uid_no ='".$username."'";
		}
		elseif($user=="employee"){
			$retrievedpassword = "SELECT password FROM login WHERE user_id ='".$username."'";
			
		}
		$dbretrieveaccount = mysqli_query($mysqlconnect,$retrievedpassword);
		while($row = mysqli_fetch_array($dbretrieveaccount,MYSQLI_ASSOC)){
			$rpassword = $row['password'];
			
		}
		//add this code here and check what's displaying on the browser.
		mysqli_free_result($dbretrieveaccount);
		if(!empty($rpassword)&&($rpassword==$password)){
			echo('<!DOCTYPE html>
			<html>
			<head>
			<title>CAMPUS RECRUITMENT</title>
			<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
			<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
			rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="navigation.css">

			</head>
			<body>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark nb fixed-top">
			<div class="container">
			<div class ="toggle-btn">
			<span></span>
			<span></span>
			<span></span>
		</div>
  <a class="navbar-brand" href="#">CAMPUS RECRUITMENT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    	<li class="nav-item active">
        <a class="nav-link" href="home.php">HOME</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
				<li class="nav-item">
        <a class="nav-link" href="home.php">Logout</a>
      </li>
				</ul>
  </div>
</div>
</nav>
<div id="navigation">

<div id ="sidebar">

<ul>
<a href = "login.php?login=1&page=studentpersonal"><li><i class="material-icons">
person
</i>Personal Details</li></a>
<a href = "login.php?login=1&page=studentpayment"><li><i class="material-icons">
payment
</i>Student Payment Details</li></a>
<a href = "login.php?login=1&page=companydetails"><li><i class="material-icons">
assignment
</i>Company Details</li></a>
<a href = "login.php?login=1&page=offers"><li><i class="material-icons">
work
</i>Placement Offers</li></a>
<a href = "login.php?login=1&page=ioffers"><li><i class="material-icons">
work
</i>Internship Offers</li></a>
<a href = "login.php?login=1&page=messages"><li><i class="material-icons">
message
</i>Notification Messages</li></a>
<a href = "login.php?login=1&page=changepassword"><li><i class="material-icons">
security
</i>Change Password</li></a>
<a href = "login.php?login=1&page=editdetails"><li><i class="material-icons">
border_color
</i>Edit Personal Details</li></a>
<a href = "login.php?login=1&page=interview"><li><i class="material-icons">
people
</i>Interview Details</li></a>');

if($user=='employee'){
	echo('
	<a href = "login.php?login=1&page=newstudent"><li><i class="material-icons">
person_add
</i>Enter new student</li></a>
	<a href = "login.php?login=1&page=newcompany"><li><i class="material-icons">
note_add
</i>Enter new company</li></a>
	<a href = "login.php?login=1&page=addnotification"><li><i class="material-icons">
add_comment
</i>Add Notification</li></a>
	<a href = "login.php?login=1&page=deletestudent"><li><i class="material-icons">
person_add_disabled
</i>Delete Student</li></a>
	<a href = "login.php?login=1&page=deletecompany"><li><i class="material-icons">
delete_sweep
</i>Delete Company</li></a>
	<a href = "login.php?login=1&page=addinterview"><li><i class="material-icons">
add
</i>Add Interview</li></a>
	<a href = "login.php?login=1&page=editcompany"><li><i class="material-icons">
border_color
</i>Edit Company Details</li></a>
	<a href = "login.php?login=1&page=editpayments"><li><i class="material-icons">
border_color
</i>Edit Payment Details</li></a>
	
	');
}
echo('
</ul>
</div>
</div>
<div id ="pagebody">');

$page = $_GET['page'];
if($page=="first"){
include('loginhome.php');
}
elseif($page=="studentpersonal"){
	$regno = $_GET['regno'];
	if($regno==1){
	$registration = $_POST['registration'];
	$_GET['regno']=$regno;
	$_GET['registration']=$registration;
	include('studentpersonal.php');
	}
	else{
		include('studentpersonal.php');
	}
		
}
elseif($page=="editpayments"){
	$regno = $_GET['regno'];
	if($regno==1){
	$registration = $_POST['registration'];
	$_GET['regno']=$regno;
	$_GET['registration']=$registration;
	include('editpayments.php');
	}
	else{
		include('editpayments.php');
	}
		
}
elseif($page=="editpaymentsupdate"){
	$regno = $_GET['regno'];
	if($regno==1){
	$registration = $_POST['registration'];
	$payment_id = $_POST['payment_id'];
	$paid = $_POST['paid'];
	$balance = $_POST['balance'];
	$_GET['regno']=$regno;
	$_GET['registration']=$registration;
	$_GET['payment_id']=$payment_id;
	$_GET['paid']=$paid;
	$_GET['balance']=$balance;
	include('editpaymentsupdate.php');
	}
	else{
		include('editpayments.php');
	}
		
}
elseif($page=="editcompany"){
	$regno = $_GET['regno'];
	if($regno==1){
	$compid = $_POST['compid'];
	$_GET['regno']=$regno;
	$_GET['compid']=$compid;
	include('editcompany.php');
	}
	else{
		include('editcompany.php');
	}
		
}
elseif($page=="editcompanyupdate"){
	$regno = $_GET['regno'];
	if($regno==1){
	$compid = $_POST['compid'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$month = $_POST['month'];
	$age = $_POST['age'];
	$cgpa = $_POST['cgpa'];
	$_GET['compid'] = $compid;
	$_GET['name'] = $name;
	$_GET['address'] = $address;
	$_GET['contact'] = $contact;
	$_GET['email'] = $email;
	$_GET['month'] = $month;
	$_GET['age'] = $age;
	$_GET['cgpa'] = $cgpa;
	include('editcompanyupdate.php');
	}
	else{
		include('editcompany.php');
	}
		
}
elseif($page=="offers"){
	$regno = $_GET['regno'];
	if($regno==1){
	$registration = $_POST['registration'];
	$_GET['regno']=$regno;
	$_GET['registration']=$registration;
	include('offers.php');
	}
	else{
		include('offers.php');
	}
}
elseif($page=="deletestudent"){
	$regno = $_GET['regno'];
	if($regno==1){
	$registration = $_POST['registration'];
	$_GET['regno']=$regno;
	$_GET['registration']=$registration;
	include('deletestudent.php');
	}
	else{
		include('deletestudent.php');
	}
}
elseif($page=="deletecompany"){
	$regno = $_GET['regno'];
	if($regno==1){
	$compid = $_POST['compid'];
	$_GET['regno']=$regno;
	$_GET['compid']=$compid;
	include('deletecompany.php');
	}
	else{
		include('deletecompany.php');
	}
}
elseif($page=="interview"){
	$regno = $_GET['regno'];
	if($regno==1){
	$compid = $_POST['compid'];
	$_GET['regno']=$regno;
	$_GET['compid']=$compid;
	include('interview.php');
	}
	else{
		include('interview.php');
	}
}
elseif($page=="ioffers"){
	$regno = $_GET['regno'];
	if($regno==1){
	$registration = $_POST['registration'];
	$_GET['regno']=$regno;
	$_GET['registration']=$registration;
	include('ioffers.php');
	}
	else{
		include('ioffers.php');
	}
		
}
elseif($page=="messages"){
	$regno = $_GET['regno'];
	if($regno==1){
	$registration = $_POST['registration'];
	$_GET['regno']=$regno;
	$_GET['registration']=$registration;
	include('messages.php');
	}
	else{
		include('messages.php');
	}
		
}
elseif($page=="studentpayment"){
	$regno = $_GET['regno'];
	if($regno==1){
	$registration = $_POST['registration'];
	$_GET['regno']=$regno;
	$_GET['registration']=$registration;
	include('studentpayment.php');
	}
	else{
		include('studentpayment.php');
	}
		
}
elseif($page=="companydetails"){
	$regno = $_GET['regno'];
	if($regno==1){
	$month = $_POST['month'];
	$_GET['regno']=$regno;
	$_GET['month']=$month;
	include('companydetails.php');
	}
	else{
		include('companydetails.php');
	}
}
elseif($page=="companycompletedetails"){
	$reg_no = $_GET['regno'];
	if($reg_no==1){
		$company = $_GET['company'];
		$_GET['regno']=$reg_no;
	   $_GET['company']=$company;
	include('companycompletedetails.php');
	}
	else{
		include('companycompletedetails.php');
	}
	}

elseif($page=="changepassword"){
	$regno = $_GET['regno'];
	
	if($regno==1){
		$changed = $_GET['changed'];
	$newpassword = $_POST['password'];
	$newrepassword = $_POST['repassword'];
	$_GET['regno']=$regno;
	$_GET['changed']=$changed;
	$_GET['newpassword']=$newpassword;
	$_GET['newrepassword']=$newrepassword;
	include('changepassword.php');
	}
	else{
		include('changepassword.php');
	}
}
elseif($page == 'newstudent'){
	$regno = $_GET['regno'];
	if($regno==1){
	$registration = $_POST['registration'];
	$_GET['registration']=$registration;
	include('newstudent.php');
	}
	else{
		include('newstudent.php');
	}
	
}
elseif($page == 'addnotification'){
	$regno = $_GET['regno'];
	if($regno==1){
	$message = $_POST['message'];
	$date = $_POST['date'];
	//$month	= $_POST['month'];
	//$year	= $_POST['year'];
	$_GET['message']=$message;
	$_GET['date']=$date;
	$_GET['month']=$month;
	$_GET['year']=$year;
	include('addnotification.php');
	}
	else{
		include('addnotification.php');
	}
	
}
elseif($page == 'addinterview'){
	$regno = $_GET['regno'];
	if($regno==1){
	$compid = $_POST['compid'];
	$date = $_POST['date'];
	$time	= $_POST['time'];
	$venue	= $_POST['venue'];
	$name	= $_POST['name'];
	$_GET['compid']=$compid;
	$_GET['date']=$date;
	$_GET['time']=$time;
	$_GET['venue']=$venue;
	$_GET['name']=$name;
	include('addinterview.php');
	}
	else{
		include('addinterview.php');
	}
	
}
elseif($page == 'newcompany'){
	$regno = $_GET['regno'];
	if($regno==1){
	$compid = $_POST['compid'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$month = $_POST['month'];
	$age = $_POST['age'];
	$cgpa = $_POST['cgpa'];
	$_GET['compid'] = $compid;
	$_GET['name'] = $name;
	$_GET['address'] = $address;
	$_GET['contact'] = $contact;
	$_GET['email'] = $email;
	$_GET['month'] = $month;
	$_GET['age'] = $age;
	$_GET['cgpa'] = $cgpa;
	
	include('newcompany.php');
	}
	else{
		include('newcompany.php');
	}
	
}
elseif($page=="editdetails"){
	if($user=='student'){
	$reg_no = $_GET['regno'];
	if($reg_no==1){
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$age = $_POST['age'];
		$course = $_POST['course'];
		$branch = $_POST['branch'];
		$school	= $_POST['school'];
		$cgpa = $_POST['cgpa'];
		$credits = $_POST['credits'];
		$_GET['regno']=$reg_no;
	   $_GET['name']=$name;
	   $_GET['mobile']=$mobile;
	   $_GET['email']=$email;
	   $_GET['address']=$address;
	   $_GET['age']=$age;
	   $_GET['course']=$course;
	   $_GET['branch']=$branch;
	   $_GET['school']=$school;
	   $_GET['cgpa']=$cgpa;
	   $_GET['credits']=$credits;
	include('editdetails.php');
	}
	else{
		include('editdetails.php');
	}
	}
	elseif($user=='employee'){
		$reg_no = $_GET['regno'];
	if($reg_no==1){
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$department = $_POST['department'];
		$_GET['regno']=$reg_no;
	   $_GET['name']=$name;
	   $_GET['mobile']=$mobile;
	   $_GET['email']=$email;
	   $_GET['address']=$address;
	   $_GET['department']=$department;
	include('editofficerdetails.php');
	}
	else{
		include('editofficerdetails.php');
	}
		
	}
}


echo('
<script type="text/javascript" src="navigation.js"></script>
</body>
</html>');
			
		}
		else{
			header('LOCATION: home.php?login=unsuccesful&p=1');
		}
		
	
	}
	else{   
			header('LOCATION: home.php?login=unsucessful&p=2');

}
}
else{
	header('LOCATION: home.php?login=unsuccesful&p=3');
}
?>