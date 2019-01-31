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
	include "../baza.php";

	$db = new mysqli($servername, $dbusername, $dbpass, $dbname);
		if ($db->connect_error) {
			die("Ne radim");
		}
	$id = $_SESSION["ID"];
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$soundvalue =$_POST["sound"];
		$color = $_POST["color"];
		$bckg = $_POST ["bckg"];


		switch ($soundvalue) {
			case 'on':
				$sqlsound1 = "UPDATE player SET sound_settings = '1' WHERE userID = '$id'";
				if (mysqli_query($db, $sqlsound1)) {
	    			echo "New record created successfully";
				} else {
	    			echo "Error: " . $sqlsound1 . "<br>" . mysqli_error($db);
				}
				break;
			
			case 'off':
				$sqlsound2 = "UPDATE player SET sound_settings = '0' WHERE userID = '$id'";
				if (mysqli_query($db, $sqlsound2)) {
	    			echo "New record created successfully";
				} else {
	    			echo "Error: " . $sqlsound2 . "<br>" . mysqli_error($db);
				}
				break;
		}


		switch ($bckg) {
			case "white":
				$sql2 = "UPDATE player SET bckg_seting = '1' WHERE userID = '$id'";
				if (mysqli_query($db, $sql2)) {
	    			echo "New record created successfully";
				} else {
	    			echo "Error: " . $sql2 . "<br>" . mysqli_error($db);
				}
			break;
			case "black":
			$sql1 = "UPDATE player SET bckg_seting = '2' WHERE userID = '$id'";
				if (mysqli_query($db, $sql1)) {
	    			echo "New record created successfully";
				} else {
	    			echo "Error: " . $sql1 . "<br>" . mysqli_error($db);
				}
			break;
			case "blue":
			$sql3 = "UPDATE player SET bckg_seting = '3' WHERE userID = '$id'";
				if (mysqli_query($db, $sql3)) {
	    			echo "New record created successfully";
				} else {
	    			echo "Error: " . $sql3 . "<br>" . mysqli_error($db);
				}
			break;
			case "red":
			$sql4 = "UPDATE player SET bckg_seting = '4' WHERE userID = '$id'";
				if (mysqli_query($db, $sql4)) {
	    			echo "New record created successfully";
				} else {
	    			echo "Error: " . $sql4 . "<br>" . mysqli_error($db);
				}
			break;
			case "yellow":
			$sql5 = "UPDATE player SET bckg_seting = '5' WHERE userID = '$id'";
				if (mysqli_query($db, $sql5)) {
	    			echo "New record created successfully";
				} else {
	    			echo "Error: " . $sql5 . "<br>" . mysqli_error($db);
				}
			break;
			case "green":
			$sql6 = "UPDATE player SET bckg_seting = '6' WHERE userID = '$id'";
				if (mysqli_query($db, $sql6)) {
	    		echo "New record created successfully";
				} else {
	    			echo "Error: " . $sql6 . "<br>" . mysqli_error($db);
				}
			break;
			case "orange":
			$sql7 = "UPDATE player SET bckg_seting = '7' WHERE userID = '$id'";
				if (mysqli_query($db, $sql7)) {
	    			echo "New record created successfully";
				} else {
	    			echo "Error: " . $sql7 . "<br>" . mysqli_error($db);
				}
			break;
			case "purple":
			$sql8 = "UPDATE player SET bckg_seting = '8' WHERE userID = '$id'";
				if (mysqli_query($db, $sql8)) {
	    			echo "New record created successfully";
				} else {
	    			echo "Error: " . $sql8 . "<br>" . mysqli_error($db);
				}
			break;
			case "pink":
			$sql9 = "UPDATE player SET bckg_seting = '9' WHERE userID = '$id'";
				if (mysqli_query($db, $sql9)) {
	    			echo "New record created successfully";
				} else {
	    			echo "Error: " . $sql9 . "<br>" . mysqli_error($db);
				}
			break;
			case "cyan":
			$sql10 = "UPDATE player SET bckg_seting = '10' WHERE userID = '$id'";
				if (mysqli_query($db, $sql10)) {
	    			echo "New record created successfully";
				} else {
	    			echo "Error: " . $sql10 . "<br>" . mysqli_error($db);
				}
			break;
		}


		switch ($color) {
			case "white":
				$sqls2 = "UPDATE player SET snake_seting = '1' WHERE userID = '$id'";
				if (mysqli_query($db, $sqls2)) {
	    			echo "New record created successfully";
				} else {
	    			echo "Error: " . $sqls2 . "<br>" . mysqli_error($db);
				}
			break;
			case "black":
			$sqls1 = "UPDATE player SET snake_seting = '2' WHERE userID = '$id'";
				if (mysqli_query($db, $sqls1)) {
	    			echo "New record created successfully";
				} else {
	    			echo "Error: " . $sqls1 . "<br>" . mysqli_error($db);
				}
			break;
			case "blue":
			$sqls3 = "UPDATE player SET snake_seting = '3' WHERE userID = '$id'";
				if (mysqli_query($db, $sqls3)) {
	    			echo "New record created successfully";
				} else {
	    			echo "Error: " . $sqls3 . "<br>" . mysqli_error($db);
				}
			break;
			case "red":
			$sqls4 = "UPDATE player SET snake_seting = '4' WHERE userID = '$id'";
				if (mysqli_query($db, $sqls4)) {
	    			echo "New record created successfully";
				} else {
	    			echo "Error: " . $sqls4 . "<br>" . mysqli_error($db);
				}
			break;
			case "yellow":
			$sqls5 = "UPDATE player SET snake_seting = '5' WHERE userID = '$id'";
				if (mysqli_query($db, $sqls5)) {
	    			echo "New record created successfully";
				} else {
	    			echo "Error: " . $sqls5 . "<br>" . mysqli_error($db);
				}
			break;
			case "green":
			$sqls6 = "UPDATE player SET snake_seting = '6' WHERE userID = '$id'";
				if (mysqli_query($db, $sqls6)) {
	    		echo "New record created successfully";
				} else {
	    			echo "Error: " . $sqls6 . "<br>" . mysqli_error($db);
				}
			break;
			case "orange":
			$sqls7 = "UPDATE player SET snake_seting = '7' WHERE userID = '$id'";
				if (mysqli_query($db, $sqls7)) {
	    			echo "New record created successfully";
				} else {
	    			echo "Error: " . $sqls7 . "<br>" . mysqli_error($db);
				}
			break;
			case "purple":
			$sqls8 = "UPDATE player SET snake_seting = '8' WHERE userID = '$id'";
				if (mysqli_query($db, $sqls8)) {
	    			echo "New record created successfully";
				} else {
	    			echo "Error: " . $sqls8 . "<br>" . mysqli_error($db);
				}
			break;
			case "pink":
			$sqls9 = "UPDATE player SET snake_seting = '9' WHERE userID = '$id'";
				if (mysqli_query($db, $sqls9)) {
	    			echo "New record created successfully";
				} else {
	    			echo "Error: " . $sqls9 . "<br>" . mysqli_error($db);
				}
			break;
			case "cyan":
			$sqls10 = "UPDATE player SET snake_seting = '10' WHERE userID = '$id'";
				if (mysqli_query($db, $sqls10)) {
	    			echo "New record created successfully";
				} else {
	    			echo "Error: " . $sqls10 . "<br>" . mysqli_error($db);
				}
			break;
		}
	}



		$da = "SELECT * FROM player WHERE userID = '$id'";
		$ne = mysqli_query($db, $da);
		$to = mysqli_fetch_assoc($ne);


		$stmt = "SELECT * FROM bckg_otk WHERE userID = '$id'";
		$query = mysqli_query($db, $stmt);
		$brojpoz = mysqli_num_rows($query);

		$stmt1 = "SELECT * FROM snake_otk WHERE userID = '$id'";
		$query1 = mysqli_query($db, $stmt1);
		$brojsnk = mysqli_num_rows($query1);


	?>
</head>
<body>

	<div class="topnav">
		<a class="active" href="settings.php">Settings</a>
		<a class="right" href="../pocetna_login.php">Return</a>
	</div>

<div class="header">
	<div class="rest">
		
	</div>
	<div class="mid">

			  <?php 
			  		if (mysqli_num_rows($to["bckg_seting"]) > 0) {
			  			echo "nesto";
			  		}
			   ?>
			  
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="padding: 10px; text-align: center;" >
		  
			<label style="margin-right: 10px;" class = "sound">
			  <input type="radio" name="sound"  value="on" 
			  <?php 
			  		if ($to["sound_settings"] == 1) {
			  			echo "checked";
			  		}
			   ?>
			   >
			  <img src="sound_on.png" style="width: 7%;">
			</label>

			<label class = "sound">
			  <input type="radio" name="sound" value="off" 
			  <?php 
			  		if ($to["sound_settings"] == 0) {
			  			echo "checked";
			  		}
			   ?>
			  >
			  <img src="sound_off.png" style="width: 7%;">
			</label>
		  
		<br>
		<p style="text-align: center;"> SNAKE COLOR:</p>

			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="color" value="white" 
			  <?php 
			  		if ($to["snake_seting"] == 1) {
			  			echo "checked";
			  		}
			   ?>
			  >
			  <img src="white.png" style="width: 5%;">
			</label>

			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="color" value="black"
			  <?php 
			  		if ($to["snake_seting"] == 2) {
			  			echo "checked";
			  		}
			   ?>
			  >
			  <img src="black.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="color" value="blue" 
			  <?php 
			  		if ($to["snake_seting"] == 3) {
			  			echo "checked ";
			  		}
			  		if ($brojsnk < 1) {
			  			echo " disabled";
			  		}
			   ?>
			  >
			  <img src="blue.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="color" value="red"
			  <?php 
			  		if ($to["snake_seting"] == 4) {
			  			echo "checked";
			  		}
			  		if ($brojsnk < 2) {
			  			echo " disabled";
			  		}
			   ?>
			  >
			  <img src="red.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="color" value="yellow" 
			  <?php 
			  		if ($to["snake_seting"] == 5) {
			  			echo "checked";
			  		}
			  		if ($brojsnk < 3) {
			  			echo " disabled";
			  		}
			   ?>
			  >
			  <img src="yellow.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="color" value="green" 
			  <?php 
			  		if ($to["snake_seting"] == 6) {
			  			echo "checked";
			  		}
			  		if ($brojsnk < 4) {
			  			echo " disabled";
			  		}
			   ?>
			  >
			  <img src="green.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="color" value="orange" 
			  <?php 
			  		if ($to["snake_seting"] == 7) {
			  			echo "checked";
			  		}
			  		if ($brojsnk < 5) {
			  			echo " disabled";
			  		}
			   ?>
			  >
			  <img src="orange.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="color" value="purple" 
			  <?php 
			  		if ($to["snake_seting"] == 8) {
			  			echo "checked";
			  		}
			  		if ($brojsnk < 6) {
			  			echo " disabled";
			  		}
			   ?>
			  >
			  <img src="purple.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="color" value="pink" 
			  <?php 
			  		if ($to["snake_seting"] == 9) {
			  			echo "checked";
			  		}
			  		if ($brojsnk < 7) {
			  			echo " disabled";
			  		}
			   ?>
			  >
			  <img src="pink.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="color" value="cyan" 
			  <?php 
			  		if ($to["snake_seting"] == 10) {
			  			echo "checked";
			  		}
			  		if ($brojsnk < 8) {
			  			echo " disabled";
			  		}
			   ?>
			  >
			  <img src="cyan.png" style="width: 5%;">
			</label>
			
		  
		<br>
		<p style="text-align: center;"> BACKGROUND COLOR:</p>
		  
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="bckg" value="white" 
			  <?php 
			  		if ($to["bckg_seting"] == 1) {
			  			echo "checked";
			  		}
			   ?>
			  >
			  <img src="white.png" style="width: 5%;">
			</label>

			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="bckg" value="black"
			  <?php 
			  		if ($to["bckg_seting"] == 2) {
			  			echo "checked";
			  		}
			   ?>
			  >
			  <img src="black.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="bckg" value="blue"
			  <?php 
			  		if ($to["bckg_seting"] == 3) {
			  			echo "checked";
			  		}
			  		if ($brojsnk < 1) {
			  			echo " disabled";
			  		}
			   ?>
			  >
			  <img src="blue.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="bckg" value="red"
			  <?php 
			  		if ($to["bckg_seting"] == 4) {
			  			echo "checked";
			  		}
			  		if ($brojsnk < 2) {
			  			echo " disabled";
			  		}
			   ?>
			  >
			  <img src="red.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="bckg" value="yellow"
			  <?php 
			  		if ($to["bckg_seting"] == 5) {
			  			echo "checked";
			  		}
			  		if ($brojsnk < 3) {
			  			echo " disabled";
			  		}
			   ?>
			  >
			  <img src="yellow.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="bckg" value="green"
			  <?php 
			  		if ($to["bckg_seting"] == 6) {
			  			echo "checked";
			  		}
			  		if ($brojsnk < 4) {
			  			echo " disabled";
			  		}
			   ?>
			  >
			  <img src="green.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="bckg" value="orange"
			  <?php 
			  		if ($to["bckg_seting"] == 7) {
			  			echo "checked";
			  		}
			  		if ($brojsnk < 5) {
			  			echo " disabled";
			  		}
			   ?>
			  >
			  <img src="orange.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="bckg" value="purple"
			  <?php 
			  		if ($to["bckg_seting"] == 8) {
			  			echo "checked";
			  		}
			  		if ($brojsnk < 6) {
			  			echo " disabled";
			  		}
			   ?>
			  >
			  <img src="purple.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="bckg" value="pink"
			  <?php 
			  		if ($to["bckg_seting"] == 9) {
			  			echo "checked";
			  		}
			  		if ($brojsnk < 7) {
			  			echo " disabled";
			  		}
			   ?>
			  >
			  <img src="pink.png" style="width: 5%;">
			</label>
			
			<label style="margin-right: 10px;" class= "color">
			  <input type="radio" name="bckg" value="cyan"
			  <?php 
			  		if ($to["bckg_seting"] == 10) {
			  			echo "checked";
			  		}
			  		if ($brojsnk < 8) {
			  			echo " disabled";
			  		}
			   ?>
			  >
			  <img src="cyan.png" style="width: 5%;">
			</label>
			</br>
			<input style="margin-top:40px;" type="submit" value="Save settings">
		  
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