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
	

	/////tu kape krece


	$stmt_bgc3 = "SELECT * FROM bckg_otk WHERE userID = '$id' AND bckgID = '3'";
	$bckg3 = mysqli_query($db, $stmt_bgc3);
	if($totalscore >= 1000 AND mysqli_num_rows($bckg3) == 0){
		$sql_blue= "INSERT INTO bckg_otk (userID, bckgID) VALUES ('$id', '3')";
		if (mysqli_query($db, $sql_blue)) {
    		echo "Uspjeh";
		} else {
    		echo "Error: " . $sql_blue . "<br>" . mysqli_error($db);
	}
	}		
	
	$stmt_bgc4 = "SELECT * FROM bckg_otk WHERE userID = '$id' AND bckgID = '4'";
	$bckg4 = mysqli_query($db, $stmt_bgc4);
	if($totalscore >= 3000 AND mysqli_num_rows($bckg4) == 0){
		$sql_red= "INSERT INTO bckg_otk (userID, bckgID) VALUES ('$id', '4')";
		if (mysqli_query($db, $sql_red)) {
    		echo "Uspjeh";
		} else {
    		echo "Error: " . $sql_red . "<br>" . mysqli_error($db);
	}
	}

	$stmt_bgc5 = "SELECT * FROM bckg_otk WHERE userID = '$id' AND bckgID = '5'";
	$bckg5 = mysqli_query($db, $stmt_bgc5);
	if($totalscore >= 5000 AND mysqli_num_rows($bckg5) == 0){
		$sql_green= "INSERT INTO bckg_otk (userID, bckgID) VALUES ('$id', '5')";
		if (mysqli_query($db, $sql_green)) {
    		echo "Uspjeh";
		} else {
    		echo "Error: " . $sql_green . "<br>" . mysqli_error($db);
	}
	}	

	$stmt_bgc6 = "SELECT * FROM bckg_otk WHERE userID = '$id' AND bckgID = '6'";
	$bckg6 = mysqli_query($db, $stmt_bgc6);
	if($totalscore >= 7000 AND mysqli_num_rows($bckg6) == 0){
		$sql_yellow= "INSERT INTO bckg_otk (userID, bckgID) VALUES ('$id', '6')";
		if (mysqli_query($db, $sql_yellow)) {
    		echo "Uspjeh";
		} else {
    		echo "Error: " . $sql_yellow . "<br>" . mysqli_error($db);
	}
	}	

	$stmt_bgc7 = "SELECT * FROM bckg_otk WHERE userID = '$id' AND bckgID = '7'";
	$bckg7 = mysqli_query($db, $stmt_bgc7);
	if($totalscore >= 9000 AND mysqli_num_rows($bckg7) == 0){
		$sql_purple= "INSERT INTO bckg_otk (userID, bckgID) VALUES ('$id', '7')";
		if (mysqli_query($db, $sql_purple)) {
    		echo "Uspjeh";
		} else {
    		echo "Error: " . $sql_purple . "<br>" . mysqli_error($db);
	}
	}

	$stmt_bgc8 = "SELECT * FROM bckg_otk WHERE userID = '$id' AND bckgID = '8'";
	$bckg8 = mysqli_query($db, $stmt_bgc8);
	if($totalscore >= 11000 AND mysqli_num_rows($bckg8) == 0){
		$sql_orange= "INSERT INTO bckg_otk (userID, bckgID) VALUES ('$id', '8')";
		if (mysqli_query($db, $sql_orange)) {
    		echo "Uspjeh";
		} else {
    		echo "Error: " . $sql_orange . "<br>" . mysqli_error($db);
	}
	}
	
	$stmt_bgc9 = "SELECT * FROM bckg_otk WHERE userID = '$id' AND bckgID = '9'";
	$bckg9 = mysqli_query($db, $stmt_bgc9);
	if($totalscore >= 13000 AND mysqli_num_rows($bckg9) == 0){
		$sql_cyan= "INSERT INTO bckg_otk (userID, bckgID) VALUES ('$id', '9')";
		if (mysqli_query($db, $sql_cyan)) {
    		echo "Uspjeh";
		} else {
    		echo "Error: " . $sql_cyan . "<br>" . mysqli_error($db);
	}
	}
	
	$stmt_bgc10 = "SELECT * FROM bckg_otk WHERE userID = '$id' AND bckgID = '10'";
	$bckg10 = mysqli_query($db, $stmt_bgc10);
	if($totalscore >= 15000 AND mysqli_num_rows($bckg10) == 0){
		$sql_pink= "INSERT INTO bckg_otk (userID, bckgID) VALUES ('$id', '10')";
		if (mysqli_query($db, $sql_pink)) {
    		echo "Uspjeh";
		} else {
    		echo "Error: " . $sql_pink . "<br>" . mysqli_error($db);
	}
	}
	
	$stmt_snc3 = "SELECT * FROM snake_otk WHERE userID = '$id' AND snakeclrID = '3'";
	$snake3 = mysqli_query($db, $stmt_snc3);
	if($row["hs"] >= 150 AND mysqli_num_rows($snake3) == 0){
		$sql_sblue= "INSERT INTO snake_otk (userID, snakeclrID) VALUES ('$id', '3')";
		if (mysqli_query($db, $sql_sblue)) {
    		echo "Uspjeh";
		} else {
    		echo "Error: " . $sql_sblue . "<br>" . mysqli_error($db);
	}
	}
	
	$stmt_snc4 = "SELECT * FROM snake_otk WHERE userID = '$id' AND snakeclrID = '4'";
	$snake4 = mysqli_query($db, $stmt_snc4);
	if($row["hs"] >= 300 AND mysqli_num_rows($snake4) == 0){
		$sql_sred= "INSERT INTO snake_otk (userID, snakeclrID) VALUES ('$id', '4')";
		if (mysqli_query($db, $sql_sred)) {
    		echo "Uspjeh";
		} else {
    		echo "Error: " . $sql_sred . "<br>" . mysqli_error($db);
	}
	}
	
	$stmt_snc5 = "SELECT * FROM snake_otk WHERE userID = '$id' AND snakeclrID = '5'";
	$snake5 = mysqli_query($db, $stmt_snc5);
	if($row["hs"] >= 450 AND mysqli_num_rows($snake5) == 0){
		$sql_sgreen= "INSERT INTO snake_otk (userID, snakeclrID) VALUES ('$id', '5')";
		if (mysqli_query($db, $sql_sgreen)) {
    		echo "Uspjeh";
		} else {
    		echo "Error: " . $sql_sgreen . "<br>" . mysqli_error($db);
	}
	}
	
	$stmt_snc6 = "SELECT * FROM snake_otk WHERE userID = '$id' AND snakeclrID = '6'";
	$snake6 = mysqli_query($db, $stmt_snc6);
	if($row["hs"] >= 600 AND mysqli_num_rows($snake6) == 0){
		$sql_syellow= "INSERT INTO snake_otk (userID, snakeclrID) VALUES ('$id', '6')";
		if (mysqli_query($db, $sql_syellow)) {
    		echo "Uspjeh";
		} else {
    		echo "Error: " . $sql_syellow . "<br>" . mysqli_error($db);
	}
	}
	
	$stmt_snc7 = "SELECT * FROM snake_otk WHERE userID = '$id' AND snakeclrID = '7'";
	$snake7 = mysqli_query($db, $stmt_snc7);
	if($row["hs"] >= 750 AND mysqli_num_rows($snake7) == 0){
		$sql_spurple= "INSERT INTO snake_otk (userID, snakeclrID) VALUES ('$id', '7')";
		if (mysqli_query($db, $sql_spurple)) {
    		echo "Uspjeh";
		} else {
    		echo "Error: " . $sql_spurple . "<br>" . mysqli_error($db);
	}
	}
	
	$stmt_snc8 = "SELECT * FROM snake_otk WHERE userID = '$id' AND snakeclrID = '8'";
	$snake8 = mysqli_query($db, $stmt_snc8);
	if($row["hs"] >= 900 AND mysqli_num_rows($snake8) == 0){
		$sql_sorange= "INSERT INTO snake_otk (userID, snakeclrID) VALUES ('$id', '8')";
		if (mysqli_query($db, $sql_sorange)) {
    		echo "Uspjeh";
		} else {
    		echo "Error: " . $sql_sorange . "<br>" . mysqli_error($db);
	}
	}
	
	$stmt_snc9 = "SELECT * FROM snake_otk WHERE userID = '$id' AND snakeclrID = '9'";
	$snake9 = mysqli_query($db, $stmt_snc9);
	if($row["hs"] >= 1050 AND mysqli_num_rows($snake9) == 0){
		$sql_scyan= "INSERT INTO snake_otk (userID, snakeclrID) VALUES ('$id', '9')";
		if (mysqli_query($db, $sql_scyan)) {
    		echo "Uspjeh";
		} else {
    		echo "Error: " . $sql_scyan . "<br>" . mysqli_error($db);
	}
	}
	
	$stmt_snc10 = "SELECT * FROM snake_otk WHERE userID = '$id' AND snakeclrID = '10'";
	$snake10 = mysqli_query($db, $stmt_snc10);
	if($row["hs"] >= 1200 AND mysqli_num_rows($snake10) == 0){
		$sql_spink= "INSERT INTO snake_otk (userID, snakeclrID) VALUES ('$id', '10')"	;
		if (mysqli_query($db, $sql_spink)) {
    		echo "Uspjeh";
		} else {
    		echo "Error: " . $sql_spink . "<br>" . mysqli_error($db);
	}
	}

	mysqli_close($db);
?>