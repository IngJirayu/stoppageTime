<?php
require "header.php";
require "navbar.php"; 
if (isset($_SESSION['userUid'])) {
    header("Location: index.php");
} else{

?>
<main>

<?php 
        if (isset($_GET['signup']) == "success") {
          echo '<p> Sign up done, now log the fuck in!</p>';
        }
        ?>
    
<section>
<div class = "imgBx">
    <img src="image/2.jpg" alt="football pitch background">
</div>
<div class="contextBx">
    <div class="formBx">
        <h2>Login</h2>
        <form action="includes/login.inc.php" method="post">
            <div class="inputBx">
                <span>Username</span>
                <input type="text" name="mailuid" placeholder="Username">
            </div>
            <div class="inputBx">
                <span>Password</span>
                <input type="password" name="pwd" placeholder="Password">
            </div>
            <div class="inputBx">
            <button type="submit" name="login-submit">Login</button>
            </div>
            <div class="inputBx">
            <p>ไม่มีบัญชี? <a href="signup.php">สมัครโลด</a></p> 
            </div>
        </form>
    </div>
</div>

</section>


</main>

<?php
require "footer.php";
    }
?>