<?php 
  include 'includes/function.inc.php';
?>
<nav class="navbar">
    <div class="brandTitle"><a href="index.php">TodVela</a></div>
    <a href="#" class="toggleButton">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </a>
    <div class="navbarLinks">
        <ul>
            <li><a href="index.php">หน้าแรก</a></li>
            <li><a href="tags.php">แท๊ก</a></li>
            <li><a href="new-topic.php">สร้างบทสนทนา</a></li>
            <?php
                if (isset($_SESSION['userUid'])) {
                echo '<li><a href="myprofile.php">โปรไฟล์</a></li>';
                }
                else {
                echo '<li><a href="login.php">ลงชื่อเข้าใช้</a></li>';
                }
            ?>
        </ul>
    </div>
</nav>
<script src="includes/navbarFunc.js"></script>