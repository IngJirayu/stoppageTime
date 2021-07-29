<?php
require "header.php";
require "navbar.php";
?>

<?php
if (isset($_SESSION['userUid'])) {
?>
  <div class="makePostWrapper">
    <div class="inputBx">
      <h1 class="postForum">
        ตั้งกระทู้ 
        <span class="material-icons">forum</span>
      </h1>
      <form action="includes/new-topic.inc.php" method="POST">
    </div>

    <?php
    if (isset($_GET['error'])) {
      //no topic
      if ($_GET['error'] == "notopic") {
    ?>
        <p class="errorBx"> ใส่หัวข้อด้วยจ้า</p>
        <div class="titleBx">
          หัวข้อกระทู้:
        </div>
        <div class="makePostBx">
          <input class="makePostInputBx" type="text" name="topic" placeholder="หัวข้อกระทู้" maxlength="200">
        </div>
        <div class="makeDetailBx">
          เนื้อหา:<textarea name="detail" rows="10" cols="40"></textarea>
        </div>

      <?php
        // no tags
      } elseif ($_GET['error'] == "notags") {
        $topic = $_GET['topic'];
      ?>
        <p class="errorBx"> เลือกแท๊กด้วยเด้อ</p>
        <div class="titleBx">
          หัวข้อกระทู้:
        </div>
        <div class="makePostBx">
          <?php
          echo '<input class="makePostInputBx" type="text" name="topic" placeholder="หัวข้อกระทู้" maxlength="200" value="' . $topic . '">
  </div>'
          ?>
          <div class="makeDetailBx">
            เนื้อหา:<textarea name="detail" rows="10" cols="40"></textarea>
          </div>

        <?php
      }
    } else {
        ?>
        <div class="titleBx">
          หัวข้อกระทู้:
        </div>
        <div class="makePostBx">
          <input class="makePostInputBx" type="text" name="topic" placeholder="หัวข้อกระทู้" maxlength="200">
        </div>
        <div class="makeDetailBx">
          เนื้อหา:<textarea name="detail" rows="10" cols="40"></textarea>
        </div>

      <?php
    }
      ?>

      <div class="tagBx">

        <label for="10">
          <div class="tag">
            <input type="checkbox" id="10" name="tags[]" value="10"><span class="list">Premier League</span>
          </div>
        </label>

        <label for="20">
          <div class="tag">
            <input type="checkbox" id="20" name="tags[]" value="20"><span class="list">Laliga</span>
          </div>
        </label>

        <label for="30">
          <div class="tag">
            <input type="checkbox" id="30" name="tags[]" value="30"><span class="list">Bundesliga</span>
          </div>
        </label>

        <label for="40">
          <div class="tag">
            <input type="checkbox" id="40" name="tags[]" value="40"><span class="list">Seria A</span>
          </div>
        </label>

        <label for="50">
          <div class="tag">
            <input type="checkbox" id="50" name="tags[]" value="50"><span class="list">Ligue 1</span>
          </div>
        </label>

        <label for="60">
          <div class="tag">
            <input type="checkbox" id="60" name="tags[]" value="60"><span class="list">Thai League</span>
          </div>
        </label>

        <label for="70">
          <div class="tag">
            <input type="checkbox" id="70" name="tags[]" value="70"><span class="list">UCL</span>
          </div>
        </label>

        <label for="80">
          <div class="tag">
            <input type="checkbox" id="80" name="tags[]" value="80"><span class="list">บอลไทย</span>
          </div>
        </label>

        <label for="90">
          <div class="tag">
            <input type="checkbox" id="90" name="tags[]" value="90"><span class="list">วิเคราะห์</span>
          </div>
        </label>

        <label for="100">
          <div class="tag">
            <input type="checkbox" id="100" name="tags[]" value="100"><span class="list">ข่าวสาร</span>
          </div>
        </label>
        <label for="101">
          <div class="tag">
            <input type="checkbox" id="101" name="tags[]" value="101"><span class="list">ข่าวลือ</span>
          </div>
        </label>
        </div>
      <div class="submitBx">
        <button class="logoutButton" type="submit" name="new-topic-submit">Post</button>
      </div>

      </form>

        
  </div>
  </div>
  <script>
    $(document).ready(function() {
      //not more than 4 tags
      var maxbox = 4,
        count = 0;
      var container = $(".tagBx")
      $('input:checkbox', container).click(function() {
        count = $('input:checkbox:checked', container).length;
        if (count >= maxbox) {
          $('input:checkbox:not(:checked)', container).prop("disabled", "disabled");
        } else {
          $('input:checkbox:disabled', container).removeAttr("disabled");
        }
      });
    });
  </script>
<?php
  // below for not logged in
} else {
  header("Location: login.php");
}
?>