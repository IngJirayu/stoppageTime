<?php
require "header.php";
require 'includes/dbh.inc.php';
require "navbar.php";

if (!isset($_GET['tagId'])) {
    header("Location: ../tags.php?error=noTagId");
} else{

    //for retrieving topic from qid
    $sqlQid = "SELECT topic FROM questions WHERE questionId = ?";



    //for retrieving tag
    $sql = "SELECT idQuestion FROM tags WHERE tags = ? ORDER BY idQuestion DESC LIMIT 100";
    $tagId = $_GET['tagId'];
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../individual-tag.php?error=profileSqlError");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "i", $tagId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        }
        
}

?>

<div class="individualTagPageWrapper">

<!-- ads upto 110px high-->
<div class="individualTagPageTopAd">
    ads
</div>

<div class="tagName">
    <?php
        switch ($_GET['tagId']) {
            case 10:
                echo 'Premier league';
                break;
            case 20:
                echo 'Laliga';
                break;
            case 30:
                echo 'Bundesliga';
                break;
            case 40:
                echo 'Seria A';
                break;
            case 50:
                echo 'Ligue 1';
                break;
            case 60:
                echo 'Thai league';
                break;
            case 70:
                echo 'Ucl';
                break;
            case 80:
                echo 'บอลไทย';
                break;
            case 90:
                echo 'วิเคราะห์';
                break;
            case 100:
                echo 'ข่าวสาร';
                break;
            case 101:
                echo 'ข่าวลือ';
                break;    
            
            default:
                break;
        }
    ?>
</div>

<!--post with this tag-->
<div class="allPostBx">
<?php
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

echo "<div><a class ='linkToPostTag' href = viewtopic.php?qid=" .$row['idQuestion']. "><span class='topicTag'>" . $rowQid['topic']. "</span></a></div>";
    }      
}
?>
</div>


</div>