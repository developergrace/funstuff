<?php
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        echo "<p>Thank you" . $_POST["first_name"] . " " . $_POST["last_name"] . " <br>You will hear from us soon!</p>
        <p>Please take a moment to verify your information so our records are accurate.</p>
        <p>Your email:<br>  $_POST["email"];</p>
        <p>Your password is: <br> $_POST["password1"]</p>";
    }

    print '<h2>Registration Form</h2>
        <p>Register so that you can take advantage of certain features like this, that, and the other thing.</p>';
	
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $problem = false; 
        
        if (empty($_POST['first_name'])) {
            $problem = true;
            print '<p class="text--error">Please enter your first name!</p>';
        }
        
        if (empty($_POST['last_name'])) {
            $problem = true;
            print '<p class="text--error">Please enter your last name!</p>';
        }

        if (empty($_POST['email'])) {
            $problem = true;
            print '<p class="text--error">Please enter your email address!</p>';
        }

        if (empty($_POST['password1'])) {
            $problem = true;
            print '<p class="text--error">Please enter a password!</p>';
        }

        if ($_POST['password1'] != $_POST['password2']) {
            $problem = true;
            print '<p class="text--error">Your password did not match your confirmed password!</p>';
        } 
        
        if (!$problem) {

            print '<p class="text--success">You are now registered!<br>Okay, you are not really registered but...</p>';
            $_POST = [];
        
        } else {
            print '<p class="text--error">Please try again!</p>';  
        }

    }
?>

<form action="index.php" method="post" class="form--inline">
	<p><label for="first_name">First Name:</label><input type="text" name="first_name" size="20" value="<?php if (isset($_POST['first_name'])) { echo $_POST['first_name']; } ?>"></p>
	<p><label for="last_name">Last Name:</label><input type="text" name="last_name" size="20" value="<?php if (isset($_POST['last_name'])) { print htmlspecialchars($_POST['last_name']); } ?>"></p>
	<p><label for="email">Email Address:</label><input type="email" name="email" size="20" value="<?php if (isset($_POST['email'])) { print htmlspecialchars($_POST['email']); } ?>"></p>
	<p><label for="password1">Password:</label><input type="password" name="password1" size="20" value="<?php if (isset($_POST['password1'])) { print htmlspecialchars($_POST['password1']); } ?>"></p>
	<p><label for="password2">Confirm Password:</label><input type="password" name="password2" size="20" value="<?php if (isset($_POST['password2'])) { print htmlspecialchars($_POST['password2']); } ?>"></p>

	<p><input type="submit" name="submit" value="Register!" class="button--pill"></p>

</form>