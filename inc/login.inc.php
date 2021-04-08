<?php
require 'db.inc.php';

// checkt of er een sessie bestaat
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['submit'])) {
    // pakt de infromatie die is ingevoerd
    $uName = $_POST['uname'];
    $password = $_POST['password'];

    // checkt of de informatie in de database staat
    $check = mysqli_query($conn, "SELECT * FROM gebruiker WHERE email = '$uName' AND password = '$password' LIMIT 1;");

    // checkt of de informatie klopt of niet
    $count = mysqli_num_rows($check);

    // checkt of er is werkelijk is ingelogd met de goede informatie
    if ($count != 1) {
        // zo niet maakt hij error aan
        $_SESSION['login_error'] = 'User does not exist';
        header("Location: ../login.php");
        exit;
      }

    // zowel geeft hij aan dat er is ingelogd
      $_SESSION['logged-in'] = true;

      header("Location: ../index.php");
      exit;
}