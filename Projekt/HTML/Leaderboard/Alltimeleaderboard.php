<?php
session_start();
$id = $_SESSION["ID"];
include "../baza.php";
$db = new mysqli($servername, $dbusername, $dbpass, $dbname);
if ($db->connect_error) {
	die("Ne radim");
}
$stmt = "SELECT hs FROM leaderboard WHERE userID='$id'";
$query = mysqli_query($db, $stmt);
$query_row = mysqli_fetch_array($query);
?>
<html>
<head>

	<title>All-time leaderboard</title>

	<link rel="stylesheet" type="text/css" href="../../CSS/leaderboard.css">


</head>
<body>

	<div class="navbar">
  		<a href="dailyleaderboard.php" >Daily</a>
  		<a href="weeklyleaderboard.php" >Weekly</a>
  		<a href="monthlyleaderboard.php">Monthly</a>
  		<a href="Alltimeleaderboard.php" class="active">All-time</a>
  		<a href="../pocetna_login.php" class="right">Return</a>
	</div>


	<div class="header">
		<div class="left">
			<h1>All-time leaderboard</h1>
			<p>Track your all-time highscore against other players.</p>
		</div>
		<div class="right">
			<h1>Your All-time Highscore</h1>
			<p><?php echo $query_row["hs"]; ?></p>
		</div>
	</div>
	<div class="tablediv">
		<div>
			<form method='get'>
				<?php
					if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
						$startrow = 0;
					} else {
  						$startrow = (int)$_GET['startrow'];
					}
					$result = mysqli_query($db,"SELECT hs, hs_t, username FROM leaderboard, player WHERE (leaderboard.userID = player.userID) ORDER BY hs DESC , hs_t LIMIT $startrow, 2");
					$num=Mysqli_num_rows($result);
					if($num>0) {
				        echo "<table class='leaderboard'>
							<tr>
								<th>Position</th>
			  					<th>Player</th>
			  					<th>Score</th>
			  					<th>Time</th>
							</tr>";
						if (!isset($_GET['position']) or !is_numeric($_GET['position'])) {
							$position = 1;
						} else {
  							$position = (int)$_GET['position'];
						}
						
				    	for($i=0;$i<$num;$i++) {
				    		$row=mysqli_fetch_array($result);
							echo "<tr>";
							echo "<td>" . $position . "</td>";
							echo "<td>" . $row['username'] . "</td>";
							echo "<td>" . $row['hs'] . "</td>";
							echo "<td>" . $row['hs_t'] . "</td>";
							echo "</tr>";
							$position++;
						}
						echo "</table>";
					}
					echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+2).'&position='.($startrow+3).'">Next</a>';
					$prev = $startrow - 2;
					if ($prev >= 0){
    					echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'&position='.($prev+1).'">Previous</a>';
					}
					mysqli_close($db);
				?>
			</form>
		</div>
	</div>





</body>
</html>