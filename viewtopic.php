<?php
require "header.php";
require 'includes/dbh.inc.php';
require "navbar.php";

if (!isset($_GET["qid"])) {
  header("Location: ../viewtopic.php?error=notKnownQid");
}else{

$qid = $_GET["qid"];
$count = 0;
?>

</head>

<body>


  <?php

  $sql = "SELECT topic, detail, PosterId, created FROM questions WHERE questionId=?";
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
    $td = mysqli_stmt_get_result($stmt);
    $tdArray = mysqli_fetch_assoc($td);
  }

  $orgDate = $tdArray['created'];
  $newDate = dateReformat($orgDate);
  ?>



  <div class="viewTopicWrapper">

    <div class="viewTopicBx">

      <?php
      echo "<div class='topicBx'>" . $tdArray['topic'] . "</div>";
      echo "<div class='detailBx'>" . $tdArray['detail'] . "</div>";
      echo "<div class='posterIdBx'>ID : " . getUsernameFromId($tdArray['PosterId']) . "</div>";
      echo "<div class='dateBx'>โพสเมื่อ " . $newDate . "</div>";
      ?>

    </div>

    <div class="viewTopicAd">
      ads
    </div>



  <div class ="comments" id="comments">

    <?php


    $sqlComment = "SELECT comment, commentTime, commenterId FROM comments WHERE commentOn = ? 
  LIMIT 25";

    $stmtComment = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtComment, $sqlComment)) {
      header("Location: ../viewtopic.php?error=sqlerror4");
      exit();
    } else {
      //bind parameter to the placeholder
      mysqli_stmt_bind_param($stmtComment, "i", $qid);
      //run parameter inside database
      mysqli_stmt_execute($stmtComment);
      $commentData = mysqli_stmt_get_result($stmtComment);
    }



    if (mysqli_num_rows($commentData) > 0) {
      while ($row = mysqli_fetch_assoc($commentData)) {
        $count++;
        echo "<div class='individualComment'>";
        echo "<div class='commentCount'> คอมเม้นที่" . $count . "</div>";
        echo "<div class='actualComment'>" . $row['comment'] . "</div>";
        echo "<div class='commentDateBx'>" . dateReformat($row['commentTime']) . "</div>";
        echo "<div class='commenterIdBx'>ID :" . getUsernameFromId($row['commenterId']) . "</div>";
        echo "</div>";      
      }
      if ($count < 25) {
        echo '<div class="hiddenShowMoreButton">
          <button>ดูคอมเม้นเพิ่มเติม</button> </div>';
      } else{
        echo '<div class="showMoreButton">
          <button>ดูคอมเม้นเพิ่มเติม</button> </div>';
      }
      

    } else {
      echo '<div class="noCommentYet"> No Comment </div>';
      echo '<div class="hiddenShowMoreButton">
      <button>ดูคอมเม้นเพิ่มเติม</button> </div>';
    }
    ?>

  </div>

  <script>
    $(document).ready(function() {
      var commentCount = 25;
      var qidNow = "<?php echo $qid; ?>";
      $("button").click(function() {
        commentCount = commentCount + 25;
        $("#comments").load("includes/load-comments.inc.php", {
          commentNewCount: commentCount,
          qid: qidNow
        });
      });
    });
  </script>



    <div class="makeComment">

  <?php
  if (!isset($_SESSION['userUid'])) {
    echo 'มีความเห็น? อยากแสดงความคิดเห็นต้อง<a href="login.php">เข้าสู่ระบบ!</a>';
  } else { ?>

    <form action="includes/comment.inc.php" method="post">
      comment:<textarea name="comment" rows="10" cols="40"></textarea>
      <input type='hidden' name='qid' value='<?php echo "$qid"; ?>' />
      <button type="submit" name="comment-submit">Post</button>
    </form>

  <?php }
  ?>

    </div>


  </div>


  <?php
  require "footer.php";
}
  ?>