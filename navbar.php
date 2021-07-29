<nav class="header">
    <a href="index.php" class="logo">StoppageTime</a>
    <input class="menu-btn" type="checkbox" id="menu-btn"/>
    <label class="menu-icon" for="menu-btn"><span class="nav-icon"></span></label>
    <ul class="menu">
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
</nav>
<?php 
  include 'includes/function.inc.php';
?>