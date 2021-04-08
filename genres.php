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
<h1>Boeken</h1>
<h4>Dit zijn de boeken die ik heb gelezen</h4>

<?php
//opstellen van de query
$query = 'SELECT * FROM genre';

//uitvoeren van de query
$result = $conn->query($query);


if(!$conn) {
    echo $conn->error;
}

//testen of er rijen in de database staan
if($result->num_rows > 0) {
    echo "<div class='resultaten'>";

    //data in een tabel weergeven

    echo "<div class='wrappercontentgenre'>
    <table id='tabelinfo' border='1'>
    <tr>
    <th>Genre naam</th>
    <th>Genre beschrijving</th>
    </tr>
    </div>";



    //opschrijven van de data per rij
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['genreNaam'] . "</td>";
        echo "<td>" . $row['genreInhoud'] . "</td>";
        echo "</tr>";
    }
    echo "</div>";
} else {
    echo "Geen gegevens gevonden";
}

?>

</body>

</html>