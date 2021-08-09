<?php
  require "header.php";
  require 'includes/dbh.inc.php';
  require "navbar.php";
?>


<div class="indexWrapper">

<div class="indexPageTopAd">
  พื้นที่โฆษณา <a href="contactUs.php">ติดต่อเรา!</a>
</div>

<div class="announcement">
  
  <div class="announcementTitle">
  <span class="material-icons">
campaign
</span>
    ประกาศ
  </div>

  <div class="announcementLink">
    <a href="announcement.php">ประกาศ:ยินดีต้อนรับ</a>
    <a href="rules.php">ประกาศ:กฏกติกา</a>
    <a href="contactUs.php">ติดต่อเรา</a>
  </div>

</div>

<div class="topTen">

<div class="pinnedPost">
<div class="topTenTitle">
<span class="material-icons">
push_pin
</span>
ปักหมุด
</div>

<?php
$ids = array(2,3,4,5,6,7);
  getFiveManualPinnedPost($ids);
?>

</div>

<div class="tenNewPremPost">

<div class="topTenTitle">
<span class="material-icons">
sports_soccer
</span>
Premier League
</div>

  <?php
    getTenPostFromTag(10);
  ?>
</div>

<div class="tenNewLaligaPost">

<div class="topTenTitle">
<span class="material-icons">
sports_soccer
</span>
Laliga
</div>

  <?php
    getTenPostFromTag(20);
  ?>
</div>

<div class="tenNewBundesPost">

<div class="topTenTitle">
<span class="material-icons">
sports_soccer
</span>
Bundesliga
</div>

  <?php
    getTenPostFromTag(30);
  ?>
</div>

<div class="tenNewSeriaAPost">

<div class="topTenTitle">
<span class="material-icons">
sports_soccer
</span>
Seria A
</div>

<?php
    getTenPostFromTag(40);
  ?>
</div>

<div class="tenNewLigue1Post">

<div class="topTenTitle">
<span class="material-icons">
sports_soccer
</span>
Ligue 1
</div>

<?php
    getTenPostFromTag(50);
  ?>
</div>

<div class="tenNewThaiLeaguePost">

<div class="topTenTitle">
<span class="material-icons">
sports_soccer
</span>
Thai league
</div>

<?php
    getTenPostFromTag(60);
  ?>
</div>

<div class="tenNewUclPost">

<div class="topTenTitle">
<span class="material-icons">
sports_soccer
</span>
Ucl
</div>

<?php
    getTenPostFromTag(70);
  ?>
</div>

<div class="tenNewThaiBallPost">

<div class="topTenTitle">
<span class="material-icons">
sports_soccer
</span>
บอลไทย
</div>

<?php
    getTenPostFromTag(80);
  ?>
</div>

<div class="tenNewAnalyzePost">

<div class="topTenTitle">
<span class="material-icons">
lightbulb
</span>
วิเคราะห์
</div>

<?php
    getTenPostFromTag(90);
  ?>
</div>

<div class="tenNewNewsPost">

<div class="topTenTitle">
<span class="material-icons">
article
</span>
ข่าวสาร
</div>

<?php
    getTenPostFromTag(100);
  ?>
</div>

<div class="tenNewRumourPost">

<div class="topTenTitle">
<span class="material-icons">
article
</span>
ข่าวลือ
</div>

<?php
    getTenPostFromTag(101);
  ?>
</div>

</div>



</div>


<?php
  require "footer.php"
?>