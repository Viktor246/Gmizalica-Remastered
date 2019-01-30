<?php
session_start();
if (!isset($_SESSION["ID"])) {
  header('Location: Login_Register/register.php');
}
?>
<html>
<head>
	<title>Snake</title>

	<link rel="stylesheet" type="text/css" href="../CSS/pocetnastranica.css">

</head>



<body>
	<?php
		$id = $_SESSION["ID"];
		echo $id;
		include "baza.php";
		$db = new mysqli($servername, $dbusername, $dbpass, $dbname);
		if ($db->connect_error) {
			die("Ne radim");	
		}
		$stmt = "SELECT hs FROM leaderboard WHERE (userID = '$id')";
		$result = mysqli_query($db, $stmt);
		$row = mysqli_fetch_array($result);
		mysqli_close($db);
	?>
	<div class="header">

		<div class="side" align="right">
			<a href="profile.php" style="background-color: red;"><img src="profilna slika" style="width: 100px;"></a>
		</div>
		<div class="middle" align="center"><img src="../CSS/Pozadine/gmizalica.png" style="width: 100%;"></div>
		<div class="side" align="center"><h1>Personal highscore</h1><p><?php echo $row["hs"]; ?></p></div>

	</div>


	<div class="menu">
		<div class="side"></div>
		<div class="middle" align="center">
			<a class="gumb" href="snake.php">Play</a >
			<a class="gumb" href="Leaderboard/dailyleaderboard.php">Leaderboard</a>
			<a class="gumb" href="Settings/settings.html">Settings</a>
			<a class="gumb" href="">About</a>
		</div>
		<div class="side"></div>
	</div>

	<div class="footer">
		<p>Powered by: suze i znoj</p>
	</div>

</body>
</html>	