<?php

//boeken inzenden

$titel = $_POST['titel'];
$schrijver_id = $_POST['schrijver'];
$datumbegin = $_POST['datumbegin'];
$datumeind = $_POST['datumeind'];
$kortebeschrijving = $_POST['kortebeschrijving'];
$genre = $_POST['genre'];
$label = $_POST['label'];

include "db.inc.php";

$inzendingen = "insert into boek (titel, schrijver_id, datumbegin, datumeind, kortebeschrijving, genre_id, label) values ('$titel', '$schrijver_id', '$datumbegin', '$datumeind', '$kortebeschrijving', '$genre', '$label')";

if($conn->query($inzendingen)) {
    header('Location: ../inzendingen.php');

}
else
{
    echo "er is iets foutgegaan" . $conn->error;
}
$conn->close();
?>