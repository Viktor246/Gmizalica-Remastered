<?php
session_start();
if (!isset($_SESSION["ID"])) {
  header('Location: Login_Register/register.php');
}

?>
<html>
<head>

	<title>Settings</title>

	<link rel="stylesheet" type="text/css" href="../../CSS/settings.css">

	<?php
	include "baza.php";

	$db = new mysqli($servername, $dbusername, $dbpass, $dbname);
		if ($db->connect_error) {
			die("Ne radim");
		}
	$id = $_SESSION["ID"];
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$soundvalue =$_POST["sound"];
		$color = $_POST["color"];
		$bckg = $_POST ["bckg"];

		switch ($bckg) {
			case "white":
			$sql = "UPDATE player SET bckg_seting = '2' WHERE userID = '$id'";
			break;
			case ""
		}


	}


	?>
</head>
<body>


	<div class="topnav">
		<a class="active" href="settings.html">Settings</a>
		<a class="right" href="../pocetna.html">Return</a>
	</div>

<div class="header">
	<div class="rest">
		
	</div>
	<div class="mid">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="padding: 10px; text-align: center;" >
		  
			<label style="margin-right: 10px;" class = "sound">
			  <input type="radio" name="sound"  value="on" checked >
			  <img src="sound_on.png" style="width: 7%;">
			</label>

			<label class = "sound">
			  <input type="radio" name="sound" value="off" >
			  <img src="sound_off.png" style="width: 7%;">
			</label>
		  
		<br>
		<p style="text-align: center;"> SNAKE COLOR:</p>

			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="color" value="white" checked>
			  <img src="white.png" style="width: 5%;">
			</label>

			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="color" value="black">
			  <img src="black.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="color" value="blue">
			  <img src="blue.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="color" value="red">
			  <img src="red.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="color" value="yellow">
			  <img src="yellow.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="color" value="green" >
			  <img src="green.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="color" value="orange" >
			  <img src="orange.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="color" value="purple" >
			  <img src="purple.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="color" value="pink" >
			  <img src="pink.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="color" value="cyan" >
			  <img src="cyan.png" style="width: 5%;">
			</label>
			
		  
		<br>
		<p style="text-align: center;"> BACKGROUND COLOR:</p>
		  
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="bckg" value="white" checked>
			  <img src="white.png" style="width: 5%;">
			</label>

			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="bckg" value="black">
			  <img src="black.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="bckg" value="blue">
			  <img src="blue.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="bckg" value="red">
			  <img src="red.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="bckg" value="yellow">
			  <img src="yellow.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="bckg" value="green" >
			  <img src="green.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="bckg" value="orange" >
			  <img src="orange.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="bckg" value="purple" >
			  <img src="purple.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="bckg" value="pink" >
			  <img src="pink.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="bckg" value="cyan" >
			  <img src="cyan.png" style="width: 5%;">
			</label>
			</br>
			<input type="submit" value="Save settings">
		  
		</form> 

	</div>
	<div class="rest">
		
	</div>
</div>
<br>
<br>
<br>
<br>
<div class="footer">Icons made by <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>


</body>
</html>