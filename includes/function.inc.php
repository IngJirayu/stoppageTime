<?php

//reformat the date
function dateReformat($date) {
  return date("d-m-Y H:i:s", strtotime($date));
}
//get Username from id
function getUsernameFromId($qid){
    require 'dbh.inc.php';
    $sql = "SELECT uidUsers FROM users WHERE idUsers=?";
    
  //create a prepare statement
  $stmt = mysqli_stmt_init($conn);
  //prepare the prepare statement
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../viewtopic.php?error=sqlerror3");
    exit();
  } else {
    //bind parameter to the placeholder
    mysqli_stmt_bind_param($stmt, "i", $qid);
    //run parameter inside database
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $userId = mysqli_fetch_assoc($result);
    return $userId['uidUsers'];
  }
}


function getTenPostFromTag($qid){
  require 'dbh.inc.php';
  //for retrieving topic from qid
  $sqlQid = "SELECT topic FROM questions WHERE questionId = ?";

  //for retrieving tag
  $sql = "SELECT idQuestion FROM tags WHERE tags = ? ORDER BY idQuestion DESC LIMIT 10";
  
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../individual-tag.php?error=profileSqlError");
    exit();
  }else{
    mysqli_stmt_bind_param($stmt, "i", $qid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    }

    if (mysqli_num_rows($result) > 0) {    
 
    while($row = mysqli_fetch_assoc($result)){

      if (!mysqli_stmt_prepare($stmt, $sqlQid)) {
        header("Location: ../individual-tag.php?error=profileSqlError2");
        exit();
    } else{
        mysqli_stmt_bind_param($stmt, "i", $row['idQuestion']);
        mysqli_stmt_execute($stmt);
        $resultQid = mysqli_stmt_get_result($stmt);
        $rowQid = mysqli_fetch_assoc($resultQid);
    }
    echo "<a class ='linkToPostTag' href = viewtopic.php?qid=" .$row['idQuestion']. "><span class='topicTag'>" . $rowQid['topic']. "</span></a>";
  }
  
}
}

//top pinned post
function getFiveManualPinnedPost(array $array){
require 'dbh.inc.php';

sort($array);
$in    = str_repeat('?,', count($array) - 1) . '?'; // placeholders
$sql = "SELECT topic FROM questions WHERE questionId IN($in)";

$stmt = mysqli_stmt_init($conn);
$types = str_repeat('i', count($array)); //types

if (!mysqli_stmt_prepare($stmt, $sql)) {
  header("Location: ../?error=fiveManualPinnedPostError");
  exit();
}else{
  mysqli_stmt_bind_param($stmt, $types, ...$array);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
}
if (mysqli_num_rows($result) > 0) {
  $index = 0;    
  while($row = mysqli_fetch_assoc($result)){
    echo "<a class ='linkToPostTag' href = viewtopic.php?qid=" .$array[$index]. "><span class='topicTag'>" . $row['topic']. "</span></a>";
    $index++;
}
}

}