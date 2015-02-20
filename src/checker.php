<?php
require_once("Game.php");

session_start();
$game = $_SESSION["game"];

$result = $game->checkIds($_POST["firstCard"], $_POST["secondCard"]);
$response['res'] = $result;

echo json_encode($response);