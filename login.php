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
        } else if (isset($_GET['error'])) {
            switch ($_GET['error']) {
                case 'emptyfields':
                    $error = 'ใส่ข้อมูลไม่ครบจ้า';
                    break;
                case 'sqlerror':
                    $error = 'ไม่สามารถเชื่อมต่อกับฐานข้อมูลได้ โปรดลองใหม่ภายหลัง';
                    break;
                case 'wrongpwd':
                    $error = 'รหัสผ่านไม่ถูกต้อง';
                    break;
                case 'nouser':
                    $error = 'ไม่มีชื่อผู้ใช้';
                    break;
                    
                default:
                    $error = 'ถ้าเห็นข้อความนี้ โปรดแจ้งแอดมินด้วยครับ';
                    break;
            }
            
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