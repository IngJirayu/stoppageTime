<?php
require "header.php";
require "navbar.php"; 
if (isset($_SESSION['userUid'])) {
    header("Location: index.php");
} else{

?>

<main>

            
<section>
<div class = "imgBx">
    <img src="image/2.jpg" alt="football pitch background">
</div>
<div class="contextBx">
    <div class="formBx">
        <h2>Sign up</h2>
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
            <div class="inputBx">
            <?php
                    if (isset($_GET['uid'])) {
                        $uid = $_GET['uid'];
                        echo '<span>Username</span>';
                        echo '<input type="text" name="uid" placeholder="Username" maxlength="16" value="' . $uid . '">';
                    } else {
                        echo '<span>Username</span>';
                        echo '<input type="text" name="uid" placeholder="Username" maxlength="16">';
            ?>
            </div>
            <div class="inputBx">
                <?php
                    }
                    if (isset($_GET['mail'])) {
                        $mail = $_GET['mail'];
                        echo '<span>Email</span>';
                        echo '<input type="text" name="mail" placeholder="Email" value="' . $mail . '">';
                    } else {
                        echo '<span>Email</span>';
                        echo '<input type="text" name="mail" placeholder="Email">';
                    }
                    ?>
            </div>
            <div class="inputBx">
                <span>Password</span>
                <input type="Password" name="pwd" placeholder="Password">
            </div>
            <div class="inputBx">
                <span>Confirm Password</span>
                <input type="Password" name="pwd-repeat" placeholder="Confirm Password">
            </div>
            <div class="inputBx">
            <button type="submit" name="signup-submit">Signup</button>
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