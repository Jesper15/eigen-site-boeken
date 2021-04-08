<?php
require 'db.inc.php';

// checkt of er een sessie bestaat
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['submit'])) {
    // pakt de infromatie die is ingevoerd
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];

    // checkt of de informatie in de database staat
    $checkFullname = mysqli_query($conn, "SELECT * FROM gebruiker WHERE fullName = '$fullName'");
    $checkEmail = mysqli_query($conn, "SELECT * FROM gebruiker WHERE email = '$email'");

    // filtert E-mail op illigale tekens
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // checkt of E-mail bestaat
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // checkt of het wachtwoord hetzelfde is
        if ($password != $repeatPassword) {
            $_SESSION['repeatPassword_error'] = 'Not the same password';
            header("Location: ../signup.php");
            exit;
            // checkt of de gebruiker al bestaat
        } elseif (mysqli_num_rows($checkFullname) || mysqli_num_rows($checkEmail)) {
            $_SESSION['usserExists_error'] = 'User already exists';
            header("Location: ../signup.php");
            exit;
            // checkt of het wachtwoord langer is dan 6 characters
        } elseif (strlen($password) < 6 && strlen($repeatPassword < 6)) {
            $_SESSION['passwordStrength_error'] = 'Weak password, minimal is 6 characters';
            header("Location: ../signup.php");
            
            exit;
        }else {
            // zet de informatie in de database
            $sql = "INSERT INTO gebruiker (fullName, email, password)
            VALUES ('$fullName', '$email', '$password');";
            // stuurt een mail
            if (mysqli_query($conn, $sql)) {
                $to = $email;
                $subject = 'Hitsplat';
                $message = 'Account aangemaakt ' . $fullName;
                $headers = "From : The Sender Name <test@gmail.com>/r/n";
                $headers .= "Reply-To: <test@gmail.com>/r/n";
                $headers .= "Content-type: text/html/r/n";
                mail($to, $subject, $message, $headers);
                header('Location: ../login.php');
                exit;
            } else {
                // geeft error aan als er conectie problemen zijn
                echo 'ERROR: Could not able to execute $sql. ' . mysqli_error($conn);
                var_dump(mysqli_error($conn));
                die;
            }
        }
    } else {
        $_SESSION['email_error'] = 'E-mail does not exist';
        header("Location: ../signup.php");
        exit;
    }
}
