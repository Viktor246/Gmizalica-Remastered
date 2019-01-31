<?php
	include "baza.php";
	$db = new mysqli($servername, $dbusername, $dbpass, $dbname);
	session_start();
	
	if (!isset($_SESSION["ID"])) {

	}else{
		$vrijeme = time();
   		$insert = "UPDATE login_log SET logout_time = '$vrijeme' WHERE loginID = '".$_SESSION["loginID"]."'";
   		mysqli_query($db, $insert);
   		session_destroy();
	}
	?>

<html>
<head>
	<title>Snake</title>

	<link rel="stylesheet" type="text/css" href="../CSS/pocetnastranica.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>



<body>
	<div class="header">

		<div class="side" align="right">
			<a class="login" href="Login_Register/login.php">Login</a>
			<a class="login" href="Login_Register/register.php">Register</a>
		</div>
		<div class="middle" align="center"><img src="../CSS/Pozadine/gmizalica.png" style="width: 100%;"></div>
		<div class="side"></div>

	</div>


	<div class="menu">
		<div class="side"></div>
		<div class="middle" align="center">
			<a class="gumb" href="">Play as guest</a >
			<a class="gumb" href="">Leaderboard</a>
			<a class="gumb" href="">Settings</a>
			<a class="gumb" href="">About</a>
		</div>
		<div class="side"></div>
	</div>

	<div class="footer">
		<p>Powered by: suze i znoj</p>
	</div>

</body>
</html>	