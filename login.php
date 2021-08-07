<?php
require "header.php";
require "navbar.php"; 
if (isset($_SESSION['userUid'])) {
    header("Location: index.php");
} else{

?>
<main>

<?php 
        $error = ' ';
        if (isset($_GET['signup']) == "success") {
            $error = "สมัครสมาชิกเรียบร้อยแล้ว เข้าสู่ระบบได้เลย!!!";
        } else if (isset($_GET['error']) == "emptyfields") {
            $error = "โปรดใส่ข้อมูลให้ครบทุกช่อง";
        }
        ?>

<form action="includes/login.inc.php" method="post">
<div class="authenticationWrapper">
    
    <div class="loginSecondBx">
    
            <div class="authenthicationError">
                <?php
                    echo $error;
                ?>
            </div>

            <div class="usernameLogin">
                <span>Username</span>
            </div>

            <div class="usernameLoginInput">
                <input type="text" name="mailuid" placeholder="Username" class="authenticateInput">
            </div>

            <div class="passwordLogin">
                <span>Password</span>
                
            </div>

            <div class="passwordLoginInput">
                <input type="password" name="pwd" placeholder="Password" class="authenticateInput">
            </div>

            <div class="loginSubmitBx">
            <button class="authenticateButton" type="submit" name="login-submit">Login</button>
            </div>

            <div class="redirectToSignup">
            <p>ไม่มีบัญชี? <a href="signup.php">สมัครโลด</a></p> 
            </div>

        </form>
    </div>
</div>

</main>

<?php
    }
?>