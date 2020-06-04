<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");

$account = new Account($con);

  if(isset($_POST["submitButton"])) {


    $username = FormSanitizer::sanitizeFormUsername($_POST["username"]); // met oranje text roep je de classe aan in FormSanitizer.php
    $password = FormSanitizer::sanitizeFormString($_POST["password"]); // met oranje text roep je de classe aan in FormSanitizer.php

    $success = $account->login($username, $password);
    if($success) {
      $_SESSION["userLoggedIn"] = $username;
      header("Location: index.php");
    }
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
        <title>Welcome to Reeceflix</title>
        <link rel="stylesheet" type="text/css" href="assets/style/style.css" />
    </head>
    <body>

        <div class="signInContainer">

            <div class="column">
                <div class="header">
                  <img src="https://fontmeme.com/permalink/200603/ff9080b74f4b97ae1ff7f2dc64f2f765.png" title="logo" alt="site-logo" />
                  <h3>Sign In</h3>
                  <span>to continue to Gijsflix</span>
                </div>
                <form method="POST">

                    <?php echo $account->getError(Constants::$loginFailed); ?>
                    <input type="text" name="username" placeholder="Username" value="<?php getInputValue("username"); ?>" required>

                    <input type="password" name="password" placeholder="Password" required>

                    <input type="submit" name="submitButton" value="SUBMIT">

                </form>
                <a href="register.php" class="signInMessage">Need an account? Sign up here!</a>
            </div>

        </div>

    </body>
</html>
