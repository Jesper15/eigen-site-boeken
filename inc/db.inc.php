<?php
    $dbHost = 'localhost';
    $dbUname = 'root';
    $dbPass = '';
    $db = 'boeken';

    $conn = new mysqli($dbHost, $dbUname, $dbPass, $db);

if (!$conn) {
    die('Could not connect' . mysqli_error($conn));
}
