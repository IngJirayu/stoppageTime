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
            $error = "sign up successful now pls log in";
        }
        ?>

<form action="includes/login.inc.php" method="post">
<div class="authenticationWrapper">

    <div class="authenticationLogo">
        <img class="logoAuthenticate" src="image/logoDesign(Blue).png" alt="logo">
    </div>
    
    <div class="loginSecondBx">
    
            <div class="authenthicationError">
                <?php
                    echo $error;
                ?>
            </div>

            <div class="usernameLogin">
                <span>Username</span> <br>
                <input type="text" name="mailuid" placeholder="Username">
            </div>

            <div class="passwordLogin">
                <span>Password</span> <br>
                <input type="password" name="pwd" placeholder="Password">
            </div>

            <div class="loginSubmitBx">
            <button type="submit" name="login-submit">Login</button>
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