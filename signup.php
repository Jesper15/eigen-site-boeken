<?php
 require_once 'inc/signup.inc.php';
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

    <!-- begin navbar -->
    <!-- <ul>
        <li><a href="Login.php">login</a></li>
        <li><a href="sign up.php">Sign up</a></li>
        <li><a href="index.html">Home</a></li>
        <li><a href="inzendingen.html">Inzendingen</a></li>
        <li><a href="top 10 versturen.html">Top 10 vragen</a></li>
        <li><a href="labelsdocenten.html">Labels</a></li>
        <img src="image/logohitsplatkopie.png" style="float: right" width="6%">
    </ul> -->
<!-- einde navbar -->

    <Form action="inc/signup.inc.php" method="POST" class="signup_B"><p>Create Account</p><br>
        <table>
            <tr>
                <td><label>Name</label></td>
                <td><input type="text" name="fullName" placeholder="Full name" required></td>
            </tr>

            <tr>
                <td><label>E-mail</label></td>
                <td><input type="text" name="email" placeholder="Email" required></td>
            </tr>

            <tr>
                <td><label>Password</label></td>
                <td><input type="password" name="password" placeholder="Enter Password" required></td>
            </tr>

            <tr>
                <td><label>Password</label></td>
                <td><input type="password" name="repeatPassword" placeholder="Repeat password" required></td>
            </tr>
        </table>

        <button style="margin-top: 30px;" type="submit" name="submit">Sign up</button>
        <button><a class="link_btn" href="login.php"><p>Login<a></button>

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

    <!-- <Form action="include/signup.inc.php" method="POST" class="signup"><p>Create Account</p><br></br>
            Name<input type="text" name="fullname" placeholder="Full name"><br></br>
            E-mail<input type="text" name="email" placeholder="Email"><br></br>
            Username<input type="text" name="uname" placeholder="Enter Username"><br></br>
            Password<input type="password" name="password" placeholder="Enter Password"><br></br>
            Repeat password<input type="password" name="repeatpassword" placeholder="Repeat password"><br></br>
            <button type="submit" name="submit">Sign up</button>
        </Form>
        <button><a href="login.php"><p>Login<a></button> -->


<!-- <footer class="footer2"></footer> -->

</body>
</html>
