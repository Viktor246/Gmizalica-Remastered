<?php
	session_start();
	if (!isset($_SESSION["ID"])) {
  		header('Location: Login_Register/register.php');
	}
	include "baza.php";

	$db = new mysqli($servername, $dbusername, $dbpass, $dbname);
	if ($db->connect_error) {
      die("Ne radim");
    }

	$id = $_SESSION["ID"];
	$sql = "SELECT * FROM player JOIN leaderboard ON (player.userID = leaderboard.userID) WHERE player.userID = '$id'";
	$player = mysqli_query($db, $sql);
	$row = mysqli_fetch_assoc($player);
	if ($row["games_played"] > 0) {
		$avgtime = round($row["time_played"] / $row["games_played"]);
		$avgscore = round($row["totalscore"] / $row["games_played"]);

	} else{
		$avgscore = 0;
		$avgtime = 0;

	}


	
	?>

<html>
<head>

	<title>Profile</title>

	<link rel="stylesheet" type="text/css" href="../CSS/profile.css">
	<link rel="stylesheet" type="text/css" href="../CSS/login.css">


</head>
<body>
	<?php 

    $usernameErr = $passwordErr = $confirmErr = "";
    $email = $username = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"])) {

        } else {
          $username = test_input($_POST["username"]);
          if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
            $usernameErr = "Only letters and white space allowed";
          } else { 
          $sql = "SELECT * FROM player WHERE username='$username'";
            $resultsusername = mysqli_query($db, $sql);
            if (mysqli_num_rows($resultsusername) > 0) {
                $usernameErr = "Username is taken";
            }
          }
        }
        if (empty($_POST["password"])) {
          
        } else {
          if (strlen($_POST["password"]) < 8) {
            $passwordErr = "Password needs to contain at least 8 character";
          }
          if (strlen($_POST["password"]) > 16) {
            $passwordErr = "Password must have less than 16 characters";
          }
        }
        if ($_POST["password"] != $_POST["confirm"]) {
          $confirmErr = "Passwords do not match";
        } 
        if ($usernameErr == "" && $passwordErr == "" && $confirmErr == "") {
        
          
          if (empty($_POST["username"]) && empty($_POST["password"]) && empty($_POST["confirm"])) {
			
			header('Location: profile.php');

          } else if (empty($_POST["password"]) && empty($_POST["confirm"])) {
          	
            $nesto1 = $_POST["username"];
            $sql = "UPDATE player SET username = '$nesto1' WHERE userID = '".$_SESSION["ID"]."'";
            mysqli_query($db, $sql);

            header('Location: profile.php');

          } else if (empty($_POST["username"])) {
          	
            $nesto1 = $_POST["password"];
            $sql = "UPDATE player SET password = '$nesto1' WHERE userID = '".$_SESSION["ID"]."'";
            mysqli_query($db, $sql);

            header('Location: profile.php');

          } else {

            $nesto1 = $_POST["username"];
            $nesto2 = $_POST["password"];
            $sql = "UPDATE player SET username = '$nesto1', password = '$nesto2' WHERE userID = '".$_SESSION["ID"]."'";
            mysqli_query($db, $sql);

            header('Location: profile.php');

          }
        }
    }
    
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  mysqli_close($db);
  ?>




	<div class="navbar">
		<a href="pocetna_login.php" class="right">Return</a>
  		<a href="pocetna.php" class="right">Log out</a>
  		
	</div>


<div class="header">
	<div class="left">
		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		
		<table class="profiletb">
			<tr>
				<td>Username:



				</td>
  				<td>
  					<?php
						echo " ". $row["username"] ." ";
					?> 
				</td>
				<td>
					Change username:
				</td>
				<td>
					<input type="text" name="username" class="dabar" placeholder="New username" value="<?php echo $username;?>">
					<span class="error"> <?php echo $usernameErr;?></span>
				</td>
			</tr>
			<tr>
				<td>E-mail:</td>
  				<td> 

  					<?php
						echo " ". $row["email"] ." ";
					?> 

  				</td>
  				<td>
					Change password:
				</td>
  				<td>
					<input type="password" name="password" class="dabar" placeholder="8 to 16 characters">
    				<span class="error"> <?php echo $passwordErr;?></span>
				</td>
			</tr>
			<tr>
				<td><a href="Leaderboard/Alltimeleaderboard.php" class="linkovi">Highscore:</a></td>
  				<td> 

  					<?php
						echo " ". $row["hs"] ." ";
					?> 

  				</td>
  				<td>
  					Confirm new password:
  				</td>
  				<td>
					<input type="password" name="confirm" class="dabar" placeholder="Confirm your password">
    				<span class="error"> <?php echo $confirmErr;?></span>
				</td>
			</tr>
			<tr>
				<td><a href="Leaderboard/monthlyleaderboard.php" class="linkovi">Monthly best score:</a></td>
  				<td> 

  					<?php
						echo " ". $row["monthly_hs"] ." ";
					?> 

  				</td>
  				<td>
  					<input type="submit" value="Spremi">
  				</td>
  				
			</tr>
			<tr>
				<td><a href="Leaderboard/weeklyleaderboard.php" class="linkovi">Weekly best score:</a></td>
  				<td> 

  					<?php
						echo " ". $row["weekly_hs"] ." ";
					?> 

  				</td>
  				
			</tr>
			<tr>
				<td><a href="Leaderboard/dailyleaderboard.php" class="linkovi">Daily best score:</a></td>
  				<td> 

  					<?php
						echo " ". $row["daily_hs"] ." ";
					?> 

  				</td>
  				
			</tr>
			<tr>
				<td>Time played:</td>
  				<td> 

  					<?php
						echo " ". $row["time_played"] ." s";
					?> 

  				</td>
			</tr>
			<tr>
				<td>Games played:</td>
  				<td> 

  					<?php
						echo " ". $row["games_played"] ." ";
					?> 

  				</td>
  				
			</tr>
			<tr>
				<td>Collective score:</td>
  				<td> 

  					<?php
						echo " ". $row["totalscore"] ." ";
					?> 

  				</td>
  				
			</tr>
			<tr>
				<td>Average score:</td>
  				<td> 

  					<?php
						echo $avgscore;
					?> 

  				</td>
  				
			</tr>
			<tr>
				<td>Average time:</td>
  				<td> 
  					<?php
  						echo $avgtime;
  					?> s
  				</td>
  				
			</tr>
		</table>
		<br>
		
	</div>
	
	</form>

	<div class="rest">
		YOUR FRIENDS: </br>
		<div>
			<table class="friends">
				<tr>
					<th>Username</th>
  					<th>Wins</th>
  					<th>Loses</th>
				</tr>
				<tr>
					<td>Marko123</td>
  					<td>3</td>
  					<td>2</td>
				</tr>
			</table>
		</div>

	</div>
	
</div>




</body>
</html>