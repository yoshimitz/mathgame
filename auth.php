<?php 
session_start();

$_SESSION["email"] = $_POST["email"];
$_SESSION["password"] = $_POST["password"];
$_SESSION["guessed"] = 0;
$_SESSION["correct"] = 0;
$_SESSION["firstNum"];
$_SESSION["secondNum"];
$_SESSION["signVal"];
$_SESSION["answer"];


if ($_SESSION["email"] === "a@a.a" && $_SESSION["password"] === "aaa") {
    header("Location: index.php"); 
    die();
} else {
    header("Location: login.php?message=Invalid login credentials.");
    die();
}

?>