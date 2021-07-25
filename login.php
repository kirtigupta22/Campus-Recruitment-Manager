<?php
$login = $_GET['login'];
if(isset($login)){
	if($login==1){
	$page = $_GET['page'];
	$user = $_COOKIE['usersaved'];
	header('LOCATION: navigation.php?regno=0&login=1&user='.$user.'&page='.$page);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>CAMPUS RECRUITMENT</title>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="login.css">
	<script>
			var uid_prefix = document.getElementById('uid').value;
			var patt = /^19[0-9]{4}$/;
			function validateusername()
				{
					if ((uid_prefix.match(patt))=="true") 
						{
						}
						else 
						{
							alert("Invalid username");
						}
				}
	</script>
</head>
<body>
	<nav>
			<ul>
				<li><a href="#">Campus Recruitment</a></li>
				<li><a href="home.php">Home</a></li>
				<li><a href="home.php">Logout</a></li>
			</ul>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div id="content">
					<h1 style ="text-align : center;margin:0 auto; color:#fff;">Login</h1>
						<div style ="margin: 40px auto; width: 30%;">
							<?php
							$user = $_POST['user'];
							if($user=="student"){
								echo('
								<form action = "navigation.php?user=student&login=0&page=first" method = "POST">
							<div class="form-group"><input type = "text" name = "username" placeholder ="Unique-ID" class="form-control" style="border-radius:10px;box-shadow:2px 2px 2px #000" required id="uid" onsubmit="return validateusername()" title="unique id should start with 19,having maximum 6 digits" pattern="19+[0-9]{4}"></div>
								<div class ="form-group"><input type ="password" placeholder ="password" name = "password" class="form-control" style="border-radius:10px;box-shadow:2px 2px 2px #000" required></div>
								<div class ="form-group"><Button class ="btn btn-large btn-primary btn-block" style="border-radius:10px;box-shadow:2px 2px 2px #000 ;text-shadow:2px 2px 2px #000; font-size:1.1em">Login</Button></div>
								</form>
							');
							}
							elseif($user=="employee"){
								echo('
								<form action = "navigation.php?user=employee&login=0&page=first" method = "POST">
								<div class="form-group"><input type = "text" name = "username" placeholder ="User-ID" class="form-control" style="border-radius:10px;box-shadow:2px 2px 2px #000" required pattern="1[0-9]{2}" title="Begin from 1, having maximum 3 digits"></div>
								<div class ="form-group"><input type ="password" placeholder ="password" name = "password" class="form-control" style="border-radius:10px;box-shadow:2px 2px 2px #000" required pattern="[a-zA-Z0-9]{4,20}" title="cannot have special characters,should have atleast 4 characters"></div>
								<div class ="form-group"><input type="submit" class ="btn btn-large btn-primary btn-block" style="border-radius:10px;box-shadow:2px 2px 2px #000;text-shadow:2px 2px 2px #000; font-size:1.1em " value="Login"></div>
								</form>
								
								');
	
							}

							?>
						<a href ="home.php" class= "btn btn-large btn-primary btn-block" role="button" style="border-radius:10px;box-shadow:2px 2px 2px #000">Go Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>