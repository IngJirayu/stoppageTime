<?php

if (isset($_POST['comment-submit'])) {
    if (empty($_POST['comment'])) {
        header("Location: ../viewtopic.php?qid=" .$_POST['qid']. "error=noComment");
        exit();
    } else {
        session_start();
        require 'dbh.inc.php';

        $commentOn = $_POST['qid'];
        $comment = $_POST['comment'];
        date_default_timezone_set("Asia/Bangkok");
        $commentTime = date('Y/m/d H:i:s');
        $commenterId = $_SESSION['userId'];

        //insert data 
        $sql = "INSERT INTO comments (commentOn, comment, commentTime, commenterId) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        // if it doesn"t work
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../viewtopic.php?qid=" .$_POST['qid']. "error=sqlerror1");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "issi",$commentOn, $comment, $commentTime, $commenterId);
            mysqli_stmt_execute($stmt);  
            header("Location: ../viewtopic.php?qid=" .$_POST['qid']);
            exit();


    }}

} else {
    header("Location: ../viewtopic.php?qid=" .$_POST['qid']. "error=failedtocomment");
    exit();
    

}




