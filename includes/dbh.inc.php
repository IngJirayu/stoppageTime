<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
// name of databse
$dBName = "stoppageTime";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}