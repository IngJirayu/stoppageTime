<?php
require "header.php";
require "navbar.php"; 
if (!isset($_SESSION['userUid'])) {
    header("Location: ../myprofile.php?error=notPermitted");
}
require 'includes/dbh.inc.php';
?>

<?php
    $sql = "SELECT questionId FROM questions WHERE posterId = ?";
    $id = $_SESSION['userId'];

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../myprofile.php?error=profileSqlErrorPostCount");
                   exit();
            } else {
                //bind parameter to the placeholder
                mysqli_stmt_bind_param($stmt, "i", $id);
                //run parameter inside database
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $questionCount = mysqli_num_rows($result);
                }
?>

<?php
    $sql = "SELECT commentId FROM comments WHERE commenterId = ?";
    $id = $_SESSION['userId'];

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../myprofile.php?error=profileSqlErrorCommentCount");
                    exit();
            } else {
                //bind parameter to the placeholder
                mysqli_stmt_bind_param($stmt, "i", $id);
                //run parameter inside database
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $commentCount = mysqli_num_rows($result);
                }
?>

<div class="wrapper">
    <div class="idBx">
         <?php echo $_SESSION['userId'];?> 
    </div>
    <div class="nameBx">
        <?php echo $_SESSION['userUid'];?>
    </div>
    <div class="profilePic">
        <img src="image/default profile pic.jpg" width="200" height="200" alt="profile image">
    </div>
    <div class="postStatBx">
        <div>
        <span class="material-icons">
        forum
        </span>    
        <?php echo $questionCount; ?> กระทู้</div>    
        <div>
        <span class="material-icons">
comment
</span>
        <?php echo $commentCount; ?> คอมเม้น</div>
    </div>
    <div class="postTitle"> กระทู้ </div>
    <div class="postBx">
                <?php
                    $sql = "SELECT questionId, topic FROM questions WHERE posterId = ? LIMIT 20";
                    $id = $_SESSION['userId'];

                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../myprofile.php?error=profileSqlError");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "i", $id);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                    }

                    if (mysqli_num_rows($result) > 0) {

                        
                        while($row = mysqli_fetch_assoc($result)){
                        echo "<div><a class ='linkToPost' href = viewtopic.php?qid=" .$row['questionId']. ">" .$row['topic']." </a></div>";
                        
                    }
                    }else{
                        echo 'ไม่มีกระทู้';
                    }

                ?>
</div>
      <div class="logout">
                <form action="includes/logout.inc.php" method="post">
                <button class="logoutButton" type="submit" name="logout-submit">Logout</button>
                </form>
                </div>
</div>