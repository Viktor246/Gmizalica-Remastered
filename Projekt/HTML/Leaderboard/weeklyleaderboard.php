<?php
session_start();
$id = $_SESSION["ID"];
include "../baza.php";
$db = new mysqli($servername, $dbusername, $dbpass, $dbname);
if ($db->connect_error) {
	die("Ne radim");
}
$stmt = "SELECT weekly_hs FROM leaderboard WHERE userID='$id'";
$query = mysqli_query($db, $stmt);
$query_row = mysqli_fetch_array($query);
?>
<html>
<head>

	<title>Weekly leaderboard</title>

	<link rel="stylesheet" type="text/css" href="../../CSS/leaderboard.css">


</head>
<body>

	<div class="navbar">
  		<a href="dailyleaderboard.php" >Daily</a>
  		<a href="weeklyleaderboard.php" class="active">Weekly</a>
  		<a href="monthlyleaderboard.php">Monthly</a>
  		<a href="Alltimeleaderboard.php">All-time</a>
  		<a href="../pocetna_login.php" class="right">Return</a>
	</div>


	<div class="header">
		<div class="left">
			<h1>Weekly leaderboard</h1>
			<p>Track score made this week against all other players. Reset every sunday on midnight UTC+0</p>
		</div>
		<div class="right">
			<h1>Your Weekly Highscore</h1>
			<p><?php echo $query_row["weekly_hs"] ?></p>
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
					$result = mysqli_query($db,"SELECT weekly_hs, weekly_hs_t, username FROM leaderboard, player WHERE (leaderboard.userID = player.userID) ORDER BY weekly_hs DESC , weekly_hs_t LIMIT $startrow, 2");
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
							echo "<td>" . $row['weekly_hs'] . "</td>";
							echo "<td>" . $row['weekly_hs_t'] . "</td>";
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