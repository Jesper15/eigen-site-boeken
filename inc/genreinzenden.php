<?php

//labels inzenden
$genre = $_POST['genreNaam'];
$inhoud = $_POST['genreInhoud'];

    require "db.inc.php";

$genresend = "insert into genre (genreNaam, genreInhoud) values ('$genre', '$inhoud')";

if($conn->query($genresend)) {
    header('Location: ../genreinzenden.php');
}
else
{
    echo "er is iets foutgegaan" . $conn->error;
}