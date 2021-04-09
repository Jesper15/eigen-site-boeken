<?php;
 require_once 'inc/login.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitsplat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
include 'inc/header.inc.php';
?>
    

<!-- <form action="" class="login">
    login
    <input type="text" name="uname" placeholder="Username"><required>
    <br>
    <input type="text" name="uname" placeholder="Username"><required>
    <button type="submit" name="submit">Login</button>
</form> -->

    <div class="wrapper-login">
        <Form action="inc/login.inc.php" method="POST" class="login_A"><p>Login</p><br>
            <table class="login-table">

                    <!--email field-->
                        <input class="login-input" type="text" name="uname" placeholder="Email" required>

                    <!--password field-->
                        <input class="login-input" type="password" name="password" placeholder="Password" required>

                        <button class="btn_login" type="submit" name="submit">Login</button>
                        <button class="btn_login" onclick="window.location.href='signup.php'">Sign Up </></button>
            </table>

    <?php
    // checkt of er een sessie bestaat
    if (!isset($_SESSION)) {
        // maakt sessie aan
        session_start();
      }
    // checkt of error bstaat
      if (isset($_SESSION['login_error'])) {
        // zo wel plaatst hem op de website
        echo $_SESSION['login_error'];
        // werwijderd de error
        unset($_SESSION['login_error']);
        exit;
      } 
    ?> 
        </Form>

        <!-- <button><a class="link_btn" href="./sign up.php">Sign Up </a></button> -->
    </div>
    
    <footer class="footer2"></footer>

</body>
</html>
    
</body>


  