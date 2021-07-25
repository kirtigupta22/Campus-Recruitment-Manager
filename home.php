<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CAMPUS RECRUITMENT</title>
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="homestyle.css">
	</head>
	<body>
		<nav>
			<ul>
				<li><a href="#">Campus Recruitment</a></li>
				<li><a href="#">Home</a></li>
			</ul>
		</nav>
		<section>
			<div>
				<h1 id="headline">CAMPUS RECRUITMENT MANAGER</h1>
				<h2 id="subline">ST . XAVIER'S  COLLEGE , MUMBAI</h2>
			</div>
		</section>
		<footer>
			<?php
			echo ('<form action ="login.php?login=0" method="POST"><button type="submit" class="btn btn-primary active btn-large btn1 but" name="user" value="student" style="margin:5%;border-radius:10px;font-size:1.1em;box-shadow:2px 2px 2px #000">Login As Student</button>
			      <button type="submit" class="btn btn-primary active btn-large btn2 but" name="user" value="employee" style="border-radius:10px;font-size:1.1em;box-shadow:2px 2px 2px #000">Login As Employee</button></form>');
			?>
		</footer>
	</body>
</html>