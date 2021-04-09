<?php
 require_once 'inc/signup.inc.php';
include 'inc/header.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <Form action="inc/signup.inc.php" method="POST" class="signup"><p>Create Account</p><br>
        <table class="register">

                <td><input class="signup_input" type="text" name="fullName" placeholder="Full name" required></td>

                <td><input class="signup_input" type="text" name="email" placeholder="Email" required></td>

                <td><input class="signup_input" type="password" name="password" placeholder="Enter Password" required></td>

                <td><input class="signup_input" type="password" name="repeatPassword" placeholder="Repeat password" required></td>
        </table>

        <button class="btn_signup" type="submit" name="submit">Sign up</button>
        <button class="btn_signup" onclick="window.location.href='login.php'">Login</button>

    </Form>
    <br>

    <?php
    // checkt of er een sessie bestaat
    if (!isset($_SESSION)) {
        // maakt sessie aan
        session_start();
      }
      // checkt of error bstaat
      if (isset($_SESSION['repeatPassword_error'])) {
          // zo wel plaatst hem op de website
        echo $_SESSION['repeatPassword_error'];
        // verwijderd de error
        unset($_SESSION['repeatPassword_error']);
      }
      if (isset($_SESSION['passwordStrength_error'])) {
        echo $_SESSION['passwordStrength_error'];
        unset($_SESSION['passwordStrength_error']);
      }
      if (isset($_SESSION['usserExists_error'])) {
        echo $_SESSION['usserExists_error'];
        unset($_SESSION['usserExists_error']);
      }
      if (isset($_SESSION['email_error'])) {
        echo $_SESSION['email_error'];
        unset($_SESSION['email_error']);
      }
    ?>

</body>
</html>
