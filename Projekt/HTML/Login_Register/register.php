
<!DOCTYPE HTML>  
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
    $emailErr = $usernameErr = $passwordErr = $confirmErr = "";
    $email = $username = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["email"])) {
          $emailErr = "Email is required";
        } else {
          $email = test_input($_POST["email"]);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $emailErr = "Invalid email format";
          } else { 
          $sql = "SELECT * FROM player WHERE email='$email'";
            $resultsemail = mysqli_query($db, $sql);
            if (mysqli_num_rows($resultsemail) > 0) {
                $emailErr = "Email is already in use";
            }
        }
        }
        if (empty($_POST["username"])) {
          $usernameErr = "Username is required";
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
          $passwordErr = "Password is required";
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
        if ($emailErr == "" && $usernameErr == "" && $passwordErr == "" && $confirmErr == "") {
          $sql1= "INSERT INTO player (username, email, password) VALUES ('".$_POST["username"]."', '".$_POST["email"]."', '".$_POST["password"]."')";
          
          if (mysqli_query ($db, $sql1)) {
            $nesto = $_POST["username"];
            $sql = "SELECT userID FROM player WHERE username='$nesto'";
            $resultsuserID = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($resultsuserID);
            $ovo = $row[0];
            $sql2 = "INSERT INTO leaderboard (userID) VALUES ('$ovo')";
            mysqli_query($db, $sql2);
            session_start();
            $_SESSION["ID"] = $ovo;
            header('Location: ../pocetna_login.php');
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
      <a href="login.php" >Login</a>
      <a href="register.php" class="active">Register</a>
      <a href="../pocetna.html" class="right">Return</a>
  </div>

<div class="header_r">
  <div class="left">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <p><span class="error">* required field</span></p>
      E-mail:<br>
      <input type="text" name="email" class="dabar" placeholder="Enter your e-mail" value="<?php echo $email;?>" >
      <span class="error">* <?php echo $emailErr;?></span>
      <br>
      Username:<br>
        <input type="text" name="username" class="dabar" placeholder="3 to 15 characters" value="<?php echo $username;?>">
        <span class="error">* <?php echo $usernameErr;?></span>
        <br>
        Password:<br>
        <input type="password" name="password" class="dabar" placeholder="8 to 16 characters">
      <span class="error">* <?php echo $passwordErr;?></span>
      <br>
        Confirm Password:<br>
        <input type="password" name="confirm" class="dabar" placeholder="Confirm your password">
      <span class="error">* <?php echo $confirmErr;?></span>
        <br><br>
        <input type="submit" value="Register" class="gumb">
    </form> 
  </div>
  <div class="rest">
    

  </div>
</body>
</html>