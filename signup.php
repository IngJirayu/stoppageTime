<?php
require "header.php";
require "navbar.php"; 
if (isset($_SESSION['userUid'])) {
    header("Location: index.php");
} else{
    $error = '';
?>

<main>

        <?php
                if (isset($_GET['error'])) {
                    switch ($_GET['error']) {
                        case 'emptyfields':
                            $error = 'โปรดกรอกให้ครบทุกช่อง';
                            break;
                        case 'invalidmail':
                            $error = 'อีเมลไม่ถูกต้อง';
                            break;
                        case 'passwordcheck':
                            $error = 'รหัสผ่านไม่ตรงกัน';
                            break;
                        case 'sqlerror':
                            $error = 'ไม่สามารถเชื่อมต่อกับฐานข้อมูลได้ โปรดลองใหม่ภายหลัง';
                            break;
                        case 'usertaken':
                            $error = 'ชื่อผู้ใช้ซ้ำคนอื่นน่ะ';
                            break;
                        case 'invaliduid':
                            $error = 'ชื่อผู้ใช้ต้องเป็นภาษาอังกฤษ และห้ามมีช่องว่างหรืออักษรพิเศษ';
                            break;
                        default:
                            $error = 'ถ้าเห็นข้อความนี้ โปรดแจ้งแอดมินด้วยครับ';
                            break;
                    }
                }
                ?>

<form action="includes/signup.inc.php" method="post">
<div class="authenticationWrapper">


    <div class="signupSecondBx">


    <div class="authenthicationError">
                <?php
                    echo $error;
                ?>
            </div>

            <div class="usernameSignup">
                <span>Username</span>
            </div> 

            <?php
                    if (isset($_GET['uid'])) {
                        $uid = $_GET['uid'];
                        echo '<div class="usernameSignupInput"><input class="authenticateInput" type="text" name="uid" placeholder="Username" maxlength="16" value="' . $uid . '"></div>';
                    } else {
                        echo '<div class="usernameSignupInput"><input class="authenticateInput" type="text" name="uid" placeholder="Username" maxlength="16"></div>';
            ?>
            

                <?php
                    }
                    if (isset($_GET['mail'])) {
                        $mail = $_GET['mail'];
                        echo '<div class="emailSignup">
                                <span>Email</span>
                              </div>';

                        echo '<div class="emailSignupInput"><input class="authenticateInput" type="text" name="mail" placeholder="Email" value="' . $mail . '"></div>';
                    } else {
                        echo '<div class="emailSignup">
                                <span>Email</span>
                              </div>';
                        echo '<div class="emailSignupInput"><input class="authenticateInput" type="text" name="mail" placeholder="Email"></div>';
                    }
                    ?>
            
            <div class="passwordSignup">
                <span>Password</span>
            </div>

            <div class="passwordSignupInput">
                <input class="authenticateInput" type="Password" name="pwd" placeholder="Password">
            </div>

            <div class="confirmPasswordSignup">
                <span>Confirm Password</span>
            </div>

            <div class="confirmPasswordSignupInput">
                <input class="authenticateInput" type="Password" name="pwd-repeat" placeholder="Confirm Password">
            </div>

            <div class="signupSubmit">
            <input type="checkbox" onchange="document.getElementById('signup-submit').disabled = !this.checked;">
            ฉันได้อ่านและยอมรับ<a href="termsAndServices.php">เงื่อนไขและข้อตกลง</a>แล้ว
            </div>

            <div class="signupSubmitButton">
                <button class="authenticateButton" type="submit" disabled="disabled" name="signup-submit" id="signup-submit">Signup</button>
            </div>

            <div class="redirectToLogin">
            <p>มีบัญชีแล้ว? <a href="login.php">เข้าสู่ระบบ</a></p> 
            </div>
        </form>
</div></div>
</main>

<?php
}
?>