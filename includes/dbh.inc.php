<?php

$servername = "localhost";
$dBUsername = "u719676823_ingJirayu";
$dBPassword = "BornSinceNovember21";
// name of databse
$dBName = "u719676823_todVela";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}