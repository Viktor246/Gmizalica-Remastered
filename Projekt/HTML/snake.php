<?php
session_start();
if (!isset($_SESSION["ID"])) {
  header('Location: Login_Register/register.php');
}
  
  include "baza.php";

	$db = new mysqli($servername, $dbusername, $dbpass, $dbname);
	$id = $_SESSION["ID"];
	$sql = "SELECT * FROM player WHERE userID = '$id'";
	$player = mysqli_query($db, $sql);
	$row = mysqli_fetch_assoc($player);


  $nesto = $row["bckg_seting"];
  $sql2 = "SELECT * FROM bckg_clr WHERE bckgID = '$nesto'";
  $player2 = mysqli_query($db, $sql2);
  $row2 = mysqli_fetch_assoc($player2);
  $backcol = $row2["bckg_color"];

  $nesto1 = $row["snake_seting"];
  $sql1 = "SELECT * FROM snake_clr WHERE snakeclrID = '$nesto1'";
  $player1 = mysqli_query($db, $sql1);
  $row1 = mysqli_fetch_assoc($player1);
  $snakecol = $row1["snake_color"];




?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <title></title>
  <style>
  html, body {
    height: 100%;
    margin: 0;
  }
  body {
    background: #<?php
		echo $backcol;
	?>;
	display: flex;
    flex-wrap: nowrap;
    flex-direction: column;
	align-content: center;
	justify-content: center;
	text-align: center;

  }
  canvas {
    border: 1px solid <?php
  echo "#" . $snakecol;
  ?>;
  }
  
  
  .score{
	color: white;
	align-content: center;
	justify-content: center;
	font-size: 25px;
	flex: 8%;
  }
  
  .gamediv{
	align-content: center;
	justify-content: center;
	flex: 90%;
  }
  </style>
</head>

<body>
<div class = "score">
<p id="scorevalue" style="color:#<?php echo $snakecol;?>;"></p>
<audio controls autoplay loop hidden>
  <source src="snake_song.mp3" type="audio/ogg">
  <embed src="snake_song.mp3" autostart="true" loop="true" hidden="true"> 
</audio>
</div>


<div class = "gamediv">
<canvas width="560" height="560" id="game"></canvas></div>
<script>
var startTime = new Date();
var canvas = document.getElementById('game');
var context = canvas.getContext('2d');
var grid = 16;
var count = 0;
var score = 0;
var seconds = 0;
document.getElementById("scorevalue").innerHTML = "SCORE: " + score;
var snake = {
  x: 160,
  y: 160,
  
  // snake velocity. moves one grid length every frame in either the x or y direction
  dx: grid,
  dy: 0,
  
  // keep track of all grids the snake body occupies
  cells: [],
  
  // length of the snake. grows when eating an apple
  maxCells: 4
};
var apple = {
  x: 320,
  y: 320
};
var endTime;



function end_time() {
  endTime = new Date();
  console.log(startTime + " nesto1");
  console.log(endTime + " nesto2");
  var timeDiff = endTime - startTime; //in ms
  console.log(timeDiff + " nesto3");
  // strip the ms
  timeDiff /= 1000;
  console.log(timeDiff + " nesto4");

  // get seconds 
  seconds = Math.round(timeDiff);
  console.log(seconds + " seconds");
  timeDiff = 0;
}

// get random whole numbers in a specific range
function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}
function popUpAlert(score) {
  var playAgain = 2;
  if (confirm("Your score: " + score + "\nPlay again?")) {
    playAgain = 1;
  } else {
    playAgain = 0;
  }
  return playAgain;
} 
// game loop
function loop() {
  requestAnimationFrame(loop);
  // slow game loop to 15 fps instead of 60 (60/15 = 4)
  if (++count < 4) {
    return;
  }
  count = 0;
  context.clearRect(0,0,canvas.width,canvas.height);
  // move snake by it's velocity
  snake.x += snake.dx;
  snake.y += snake.dy;
  // wrap snake position horizontally on edge of screen
  if (snake.x < 0) {
    snake.x = canvas.width - grid;
  }
  else if (snake.x >= canvas.width) {
    snake.x = 0;
  }
  
  // wrap snake position vertically on edge of screen
  if (snake.y < 0) {
    snake.y = canvas.height - grid;
  }
  else if (snake.y >= canvas.height) {
    snake.y = 0;
  }
  // keep track of where snake has been. front of the array is always the head
  snake.cells.unshift({x: snake.x, y: snake.y});
  // remove cells as we move away from them
  if (snake.cells.length > snake.maxCells) {
    snake.cells.pop();
  }
  // draw apple
  context.fillStyle = <?php
  echo "'#" . $snakecol . "'";
  ?>;
  context.fillRect(apple.x, apple.y, grid-1, grid-1);
  // draw snake one cell at a time
  context.fillStyle = <?php
  echo "'#" . $snakecol . "'";
	?>;
  snake.cells.forEach(function(cell, index) {
    
    // drawing 1 px smaller than the grid creates a grid effect in the snake body so you can see how long it is
    context.fillRect(cell.x, cell.y, grid-1, grid-1);  
    // snake ate apple
    if (cell.x === apple.x && cell.y === apple.y) {
      snake.maxCells++;
	  score = score + 10;
	  document.getElementById("scorevalue").innerHTML = "SCORE:" + score;
      // canvas is 400x400 which is 25x25 grids 
      apple.x = getRandomInt(0, 25) * grid;
      apple.y = getRandomInt(0, 25) * grid;
    }
    // check collision with all cells after this one (modified bubble sort)
    for (var i = index + 1; i < snake.cells.length; i++) {
      
      // snake occupies same space as a body part. reset game
      if (cell.x === snake.cells[i].x && cell.y === snake.cells[i].y) {
		    end_time(); 


        $.ajax({
          url: 'result.php',
          method: 'POST',
          data: {
            score: score,
            seconds: seconds
          },
          success: function (data) {
            console.log(data);
          },
          error: function () {
            console.log("some error");
          }
        });




		    seconds = 0;
        if(popUpAlert(score) == 1){
    			snake.x = 160;
    			snake.y = 160;
    			snake.cells = [];
    			snake.maxCells = 4;
    			snake.dx = grid;
    			snake.dy = 0;
    			apple.x = getRandomInt(0, 25) * grid;
    			apple.y = getRandomInt(0, 25) * grid;
    			score = 0;
    			document.getElementById("scorevalue").innerHTML = "SCORE: " + score;
    			startTime = new Date();
    		} else{
      		  window.location.href = "pocetna_login.php";
      		}
	}
	  
    }
  });
}
// listen to keyboard events to move the snake
document.addEventListener('keydown', function(e) {
  // prevent snake from backtracking on itself by checking that it's 
  // not already moving on the same axis (pressing left while moving
  // left won't do anything, and pressing right while moving left
  // shouldn't let you collide with your own body)
  
  // left arrow key
  if (e.which === 37 && snake.dx === 0) {
    snake.dx = -grid;
    snake.dy = 0;
  }
  // up arrow key
  else if (e.which === 38 && snake.dy === 0) {
    snake.dy = -grid;
    snake.dx = 0;
  }
  // right arrow key
  else if (e.which === 39 && snake.dx === 0) {
    snake.dx = grid;
    snake.dy = 0;
  }
  // down arrow key
  else if (e.which === 40 && snake.dy === 0) {
    snake.dy = grid;
    snake.dx = 0;
  }
});
// start the game
requestAnimationFrame(loop);
</script>
</body>
</html>