<?php
if (isset($_POST['new-topic-submit'])) {
    //error handlers
    //check for empty input
    if (empty($_POST['topic'])) {
        header("Location: ../new-topic.php?error=notopic");
        exit();
        // no tags selected
    } elseif (empty($_POST['tags'])) {
        $topic = $_POST['topic'];
        header("Location: ../new-topic.php?error=notags&topic=" . $topic);
        exit();
    } else {
        session_start();
        require 'dbh.inc.php';

        $topic = $_POST['topic'];
        $detail = $_POST['detail'];
        $PosterId = $_SESSION['userId'];
        $Tags = $_POST['tags'];
        date_default_timezone_set("Asia/Bangkok");
        $date = date('Y/m/d H:i:s');




        //insert data 

        $sql = "INSERT INTO questions (topic, detail, PosterId, created) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        // if it doesn"t work
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../new-topic.php?error=sqlerror1");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ssis", $topic, $detail, $PosterId, $date);
            mysqli_stmt_execute($stmt);
            $last_id = mysqli_insert_id($conn);
            if (!empty($Tags)) {
                $checkboxSql = "INSERT INTO tags (IdQuestion, tags) VALUES (?, ?)";
                if (!mysqli_stmt_prepare($stmt, $checkboxSql)) {
                    header("Location: ../new-topic.php?error=sqlerror2");
                    exit();
                } else {
                    foreach($Tags as $x){
                        mysqli_stmt_bind_param($stmt, "ii", $last_id, $x,);
                        mysqli_stmt_execute($stmt);
                    }


                    
                    header("Location: ../viewtopic.php?qid=" .$last_id);
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);



} else {
    header("Location: ../index.php");
    exit();
}
