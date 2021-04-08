<?php
include "db.inc.php";

//schrijvers inzenden

$schrijvernaam = $_POST['schrijvernaam'];
$datumgebor = $_POST['datumgebor'];
$datumover = $_POST['datumover'];
$schrijverplaats = $_POST['schrijverplaats'];

$schrinzend = "insert into schrijver (schrijvernaam, datumgebor, datumover, schrijverplaats) values ('$schrijvernaam', '$datumgebor', '$datumover', '$schrijverplaats')";

if($conn->query($schrinzend)) {
    header('Location: ../schrijverinzenden.php');
}
else
{
    echo "er is iets foutgegaan" . $conn->error;
}

$conn->close();
echo "<br>";
?>