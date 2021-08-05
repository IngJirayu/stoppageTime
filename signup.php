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
                    if ($_GET['error'] == "emptyfields") {
                        echo '<p> Fill in all fields!</p>';
                    } elseif ($_GET['error'] == "invaliduidmail") {
                        echo '<p> Invalid Username and Email!</p>';
                    } elseif ($_GET['error'] == "invaliduid") {
                        echo '<p> Invalid Username!</p>';
                    } elseif ($_GET['error'] == "invalidmail") {
                        echo '<p> Invalid E-mail!</p>';
                    } elseif ($_GET['error'] == "passwordcheck") {
                        echo '<p> Password do not match!</p>';
                    } elseif ($_GET['error'] == "usertaken") {
                        echo '<p> Username already taken!</p>';
                    }
                }
                ?>

<form action="includes/signup.inc.php" method="post">
<div class="authenticationWrapper">

    <div class="authenticationLogo">
        <img class="logoAuthenticate" src="image/logoDesign(Blue).png" alt="logo">
    </div>


    <div class="signupSecondBx">


    <div class="authenthicationError">
                <?php
                    echo $error;
                ?>
            </div>

            <div class="usernameSignup">
            <?php
                    if (isset($_GET['uid'])) {
                        $uid = $_GET['uid'];
                        echo '<span>Username</span><br>';
                        echo '<input type="text" name="uid" placeholder="Username" maxlength="16" value="' . $uid . '">';
                    } else {
                        echo '<span>Username</span><br>';
                        echo '<input type="text" name="uid" placeholder="Username" maxlength="16">';
            ?>
            </div>

            <div class="emailSignup">
                <?php
                    }
                    if (isset($_GET['mail'])) {
                        $mail = $_GET['mail'];
                        echo '<span>Email</span><br>';
                        echo '<input type="text" name="mail" placeholder="Email" value="' . $mail . '">';
                    } else {
                        echo '<span>Email</span><br>';
                        echo '<input type="text" name="mail" placeholder="Email">';
                    }
                    ?>
            </div>
            <div class="passwordSignup">
                <span>Password</span><br>
                <input type="Password" name="pwd" placeholder="Password">
            </div>
            <div class="confirmPasswordSignup">
                <span>Confirm Password</span><br>
                <input type="Password" name="pwd-repeat" placeholder="Confirm Password">
            </div>
            <div class="signupSubmit">
            <button type="submit" name="signup-submit">Signup</button>
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