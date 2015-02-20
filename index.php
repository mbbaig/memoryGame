<?php
  session_start();
  require_once("src/Game.php");
  
  $game = new Game();
  $_SESSION["game"] = $game;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Memory Game</title>
  <link rel="stylesheet" type="text/css" href="src/css/site.css">
  <script type="text/javascript" src="src/js/jquery.min.js"></script>
  <script type="text/javascript" src="src/js/site.js"></script>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
</head>
<body>
  <div id="grid">
    <?php echo $game->getGrid(); ?>
  </div>
  <div id="grats" class="hide text-center">
    <h1>CONGRATULATIONS!!!</h1>
    <h2>YOU WON!!!</h2>
    <h2>Refresh the page if you want to play again.</h2>
  </div>
</body>