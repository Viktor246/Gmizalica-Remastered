<?php
	session_start();
	$score = $_POST["score"];
	$seconds = $_POST["seconds"];
	$id = $_SESSION["ID"];
	echo 'SCORE: ' . $score;
	echo 'TIME: ' . $seconds;
	
	include "baza.php";
	
	$db = new mysqli($servername, $dbusername, $dbpass, $dbname);

	$stmt = "SELECT * FROM leaderboard WHERE userID='$id'";
    $result = mysqli_query($db, $stmt);
	$row = mysqli_fetch_assoc($result);
	if ($score > $row["hs"]) {
		$stmt_hs = "UPDATE leaderboard SET hs = '$score', hs_t = '$seconds' WHERE userID = '$id'";
		if (mysqli_query($db, $stmt_hs)) {
    		echo "New record created successfully";
		} else {
    		echo "Error: " . $stmt_hs . "<br>" . mysqli_error($db);
		}	
	}
	if ($score == $row["hs"] && $seconds < $row["hs_t"] ) {
		$stmt_hs_t = "UPDATE leaderboard SET hs_t = '$seconds' WHERE userID = '$id'";
		if (mysqli_query($db, $stmt_hs_t)) {
    		echo "New record created successfully";
		} else {
    		echo "Error: " . $stmt_hs_t . "<br>" . mysqli_error($db);
		}
	}
	if ($score > $row["monthly_hs"]) {
		$stmt_m = "UPDATE leaderboard SET monthly_hs = '$score', monthly_hs_t = '$seconds' WHERE userID = '$id'";
    	if (mysqli_query($db, $stmt_m)) {
    		echo "New record created successfully";
		} else {
    		echo "Error: " . $stmt_m . "<br>" . mysqli_error($db);
		}
	}
	if ($score == $row["monthly_hs"] && $seconds < $row["monthly_hs_t"] ) {
		$stmt_m_t = "UPDATE leaderboard SET monthly_hs_t = '$seconds' WHERE userID = '$id'";
		if (mysqli_query($db, $stmt_m_t)) {
    		echo "New record created successfully";
		} else {
    		echo "Error: " . $stmt_m_t . "<br>" . mysqli_error($db);
		}
	}
	if ($score > $row["weekly_hs"]) {
		$stmt_w = "UPDATE leaderboard SET weekly_hs = '$score', weekly_hs_t = '$seconds' WHERE userID = '$id'";
    	if (mysqli_query($db, $stmt_w)) {
    		echo "New record created successfully";
		} else {
    		echo "Error: " . $stmt_w . "<br>" . mysqli_error($db);
		}	
	}
	if ($score == $row["weekly_hs"] AND $seconds < $row["weekly_hs_t"] ) {
		$stmt_w_t = "UPDATE leaderboard SET weekly_hs_t = '$seconds' WHERE userID = '$id'";
		if (mysqli_query($db, $stmt_w_t)) {
    		echo "New record created successfully";
		} else {
    		echo "Error: " . $stmt_w_t . "<br>" . mysqli_error($db);
		}
	}
	if ($score > $row["daily_hs"]) {
		$stmt_d = "UPDATE leaderboard SET daily_hs = '$score', daily_hs_t = '$seconds' WHERE userID = '$id'";
    	if (mysqli_query($db, $stmt_d)) {
    		echo "New record created successfully";
		} else {
    		echo "Error: " . $stmt_d . "<br>" . mysqli_error($db);
		}
	}
	if ($score == $row["daily_hs"] && $seconds < $row["daily_hs_t"] ) {
		$stmt_d_t = "UPDATE leaderboard SET daily_hs_t = '$seconds' WHERE userID = '$id'";
		if (mysqli_query($db, $stmt_d_t)) {
    		echo "New record created successfully";
		} else {
    		echo "Error: " . $stmt_d_t . "<br>" . mysqli_error($db);
		}
	}

	$totalscore = $row["totalscore"];
	$totalscore += $score;
	$stmt_ts = "UPDATE leaderboard SET totalscore = '$totalscore' WHERE userID = '$id'";
	if (mysqli_query($db, $stmt_ts)) {
    		echo "totalscore updated";
		} else {
    		echo "Error: " . $stmt_ts . "<br>" . mysqli_error($db);
	}
	$stmt_p = "SELECT * FROM player WHERE userID='$id'";
    $resultp = mysqli_query($db, $stmt_p);
	$row_p = mysqli_fetch_assoc($resultp);
	$time_played = $row_p["time_played"];
	$time_played += $seconds;
	$games_played = $row_p["games_played"];
	$games_played++;
	$update = "UPDATE player SET games_played = '$games_played', time_played = '$time_played' WHERE userID = '$id'";
	if (mysqli_query($db, $update)) {
    		echo "totalt+g updated";
		} else {
    		echo "Error: " . $update . "<br>" . mysqli_error($db);
	}


	mysqli_close($db);
?>