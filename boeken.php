<?php include './inc/header.inc.php';
include './inc/footer.inc.php';
include './inc/db.inc.php';

// checkt of sessie bestaat
if (!isset($_SESSION)) {
    // maakt sessie aan
    session_start();
}
// checkt of er is ingelogd
if (!$_SESSION['logged-in']) {
    // zo niet stuurt hij je naar login pagina
    header("Location: login.php");
    exit;
}

?>

<html lang="en">

<head>
    <title>Boeken</title>
</head>

<body>

<?php
//opstellen van de query
$query = 'SELECT boek.*, genre.genreNaam, schrijver.schrijvernaam
FROM boek
JOIN schrijver ON boek.schrijver_id=schrijver.schrijver_id
JOIN genre ON boek.genre_id=genre.genre_id
ORDER BY datumeind desc;';

//uitvoeren van de query
$result = $conn->query($query);


if(!$conn) {
    echo $conn->error;
}

//testen of er rijen in de database staan
if($result->num_rows > 0) {
    echo "<div class='resultaten'>";

    //data in een tabel weergeven

    echo "<div class='wrappercontent'>
    <h1>Boeken</h1>
    <h4>Dit zijn de boeken die ik heb gelezen</h4>

    <table id='tabelinfo' border='1'>
    <tr>
    <th>Titel</th>
    <th>Schrijver</th>
    <th>Datum begonnen</th>
    <th>Datum geëindigd</th>
    <th>Beschrijving</th>
    <th>Genre</th>
    <th>Labels</th>
    <tr>
    </div>";



    //opschrijven van de data per rij
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['titel'] . "</td>";
        echo "<td>" . $row['schrijvernaam'] . "</td>";
        echo "<td>" . $row['datumbegin'] . "</td>";
        echo "<td>" . $row['datumeind'] . "</td>";
        echo "<td>" . $row['kortebeschrijving'] . "</td>";
        echo "<td>" . $row['genreNaam'] . "</td>";
        echo "<td>" . $row['label'] . "</td>";
        echo "</tr>";
    }
    echo "</div>";
} else {
    echo "Geen gegevens gevonden";
}

?>

</body>

</html>