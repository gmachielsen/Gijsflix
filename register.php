<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");

  $account = new Account($con);

  if(isset($_POST["submitButton"])) {
    $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]); // met oranje text roep je de classe aan in FormSanitizer.php
    $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]); // met oranje text roep je de classe aan in FormSanitizer.php
    $username = FormSanitizer::sanitizeFormUsername($_POST["username"]); // met oranje text roep je de classe aan in FormSanitizer.php
    $email = FormSanitizer::sanitizeFormEmail($_POST["email"]); // met oranje text roep je de classe aan in FormSanitizer.php
    $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]); // met oranje text roep je de classe aan in FormSanitizer.php
    $password = FormSanitizer::sanitizeFormString($_POST["password"]); // met oranje text roep je de classe aan in FormSanitizer.php
    $password2 = FormSanitizer::sanitizeFormString($_POST["password2"]); // met oranje text roep je de classe aan in FormSanitizer.php

    $success = $account->register($firstName, $lastName, $username, $email, $email2, $password, $password2);
    if($success) {
      $_SESSION["userLoggedIn"] = $username; // after registering user is logged in
      header("Location: index.php");
    }
    // echo $firstName . "<br>";
    // echo $lastName . "<br>";
    // echo $username . "<br>";
    // echo $email . "<br>";
    // echo $email2 . "<br>";
    // echo $password . "<br>";
    // echo $password2 . "<br>";

  }
  function getInputValue($name) {
    if(isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to Gijsflix</title>
        <link rel="stylesheet" type="text/css" href="assets/style/style.css" />
    </head>
    <body>

        <div class="signInContainer">

            <div class="column">
                <div class="header">
                  <img src="https://fontmeme.com/permalink/200603/ff9080b74f4b97ae1ff7f2dc64f2f765.png" title="logo" alt="site-logo" />
                  <h3>Sign Up</h3>
                  <span>to continue to Gijsflix</span>
                </div>
                <form method="POST">
                    <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                    <input type="text" name="firstName" placeholder="First name" value="<?php getInputValue("firstName"); ?>" required>

                    <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                    <input type="text" name="lastName" placeholder="Last name" value="<?php getInputValue("lastName"); ?>" required>

                    <?php echo $account->getError(Constants::$usernameCharacters); ?>
                    <?php echo $account->getError(Constants::$usernameTaken); ?>
                    <input type="text" name="username" placeholder="Username" value="<?php getInputValue("username"); ?>" required>

                    <?php echo $account->getError(Constants::$emailsDontMatch); ?>
                    <?php echo $account->getError(Constants::$emailInvalid); ?>
                    <?php echo $account->getError(Constants::$emailTaken); ?>
                    <input type="email" name="email" placeholder="Email" value="<?php getInputValue("email"); ?>" required>

                    <input type="email" name="email2" placeholder="Confirm email" value="<?php getInputValue("email2"); ?>" required>

                    <?php echo $account->getError(Constants::$passwordsDontMatch); ?>
                    <?php echo $account->getError(Constants::$passwordLength); ?>

                    <input type="password" name="password" placeholder="Password" required>

                    <input type="password" name="password2" placeholder="Confirm password" required>

                    <input type="submit" name="submitButton" value="SUBMIT">

                </form>
                <a href="login.php" class="signInMessage">Already have an account? Sign in here!</a>
            </div>

        </div>

    </body>
</html>
