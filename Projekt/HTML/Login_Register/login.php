<html>
<head>

	<title>Log In Page</title>

	<link rel="stylesheet" type="text/css" href="../../CSS/login.css">


</head>
<body>
	<?php
		include "../baza.php";
		$db = new mysqli($servername, $dbusername, $dbpass, $dbname);
		if ($db->connect_error) {
			die("Ne radim");
		}
		$error = "";
		$username = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
  			if (empty($_POST["username"])) {
    			$error = "Username is required";
  			} else {
  				$username = $_POST["username"];
    			$sql = "SELECT userID, username, password FROM player WHERE username='$username'";
  				$result = mysqli_query($db, $sql);
  				if (mysqli_num_rows($result) == 0) {
  					  	$error = "Username/password is wrong";
  				} else {
    			$row = mysqli_fetch_assoc($result);
    				if($row["password"] == $_POST["password"]){
    					session_start();
    					$_SESSION["ID"] = $row["userID"];
       					header('Location: ../pocetna_login.php');
    				}else
    					$error = "Username/password is wrong";
    				}
    			}
  			}
  	mysqli_close($db);
	?>

	<div class="navbar">
  		<a href="login.php" class="active">Login</a>
  		<a href="register.php" >Register</a>
  		<a href="../pocetna.html" class="right">Return</a>
	</div>

 
<div class="header">
	<div class="left">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		  Username:<br>
		  <input type="text" name="username" class="dabar" placeholder="3 to 15 characters" value="<?php echo $username;?>">
		  <br>
		  Password:<br>
		  <input type="password" name="password" class="dabar" placeholder="8 to 16 characters">
		  <br><br>
		  <span class="error"><?php echo $error	;?></span>
		  <br>
		  <input type="submit" value="Log In" class="gumb">
		</form> 
	</div>
	<div class="rest">
	</div>
</div>




</body>
</html>