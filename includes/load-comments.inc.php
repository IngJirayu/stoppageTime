<?php
require 'dbh.inc.php';
include 'function.inc.php';

$commentNewCount = $_POST["commentNewCount"];
$qid = $_POST["qid"];
$count = 0;


  $sql = "SELECT commentId FROM comments WHERE commentOn = ?";

  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../viewtopic.php?error=rowCountUnaccessible");
      exit();
    } else {
      //bind parameter to the placeholder
      mysqli_stmt_bind_param($stmt, "i", $qid);
      //run parameter inside database
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      $rowCount = mysqli_num_rows($result);
}

// get comments with limit
  $sqlComment = "SELECT comment, commentTime, commenterId FROM comments WHERE commentOn = ?
   LIMIT ?";
  
  $stmtComment = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmtComment, $sqlComment)) {
    header("Location: ../viewtopic.php?error=sqlerror4");
    exit();
  } else {
    //bind parameter to the placeholder
    mysqli_stmt_bind_param($stmtComment, "ii", $qid, $commentNewCount);
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
      if ($count == $rowCount) {
        echo '<div class="hiddenShowMoreButton">
        <button class="showMoreCommentButton">ดูคอมเม้นเพิ่มเติม</button> </div>';
      }
      else{
      echo '<div class="showMoreButton">
      <button class="showMoreCommentButton">ดูคอมเม้นเพิ่มเติม</button> </div>';
      }
      
    } 
    ?>

  <script>
    $(document).ready(function() {
      var commentCount = "<?php echo $commentNewCount; ?>";
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