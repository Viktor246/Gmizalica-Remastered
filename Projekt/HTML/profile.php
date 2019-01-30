<?php
	session_start();
	if (!isset($_SESSION["ID"])) {
  		header('Location: Login_Register/register.php');
	}
	include "baza.php";

	$db = new mysqli($servername, $dbusername, $dbpass, $dbname);
	$id = $_SESSION["ID"];
	$sql = "SELECT * FROM player JOIN leaderboard ON (player.userID = leaderboard.userID) WHERE player.userID = '$id'";
	$player = mysqli_query($db, $sql);
	$row = mysqli_fetch_assoc($player);
	if ($row["games_played"] > 0) {
		$avgtime = $row["time_played"] / $row["games_played"];
		$avgscore = $row["totalscore"] / $row["games_played"];
	} else{
		$avgscore = 0;
		$avgtime = 0;
	}
	
	?>

<html>
<head>

	<title>Profile</title>

	<link rel="stylesheet" type="text/css" href="../CSS/profile.css">


</head>
<body>

	<div class="navbar">
		<a href="pocetna_login.php" class="right">Return</a>
  		<a href="pocetna.php" class="right">Log out</a>
  		
	</div>


<div class="header">
	<div class="left">
		<img src="fb_login_pic.png" style="width: 80x;"> </br>
		<table class="profiletb">
			<tr>
				<td>Username:



				</td>
  				<td>
  					<?php
						echo " ". $row["username"] ." ";
					?> 
				</td>
			</tr>
			<tr>
				<td>E-mail:</td>
  				<td> 

  					<?php
						echo " ". $row["email"] ." ";
					?> 

  				</td>
			</tr>
			<tr>
				<td><a href="Leaderboard/Alltimeleaderboard.php" class="linkovi">Highscore:</a></td>
  				<td> 

  					<?php
						echo " ". $row["hs"] ." ";
					?> 

  				</td>
			</tr>
			<tr>
				<td><a href="Leaderboard/monthlyleaderboard.php" class="linkovi">Monthly best score:</a></td>
  				<td> 

  					<?php
						echo " ". $row["monthly_hs"] ." ";
					?> 

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
	</div>
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