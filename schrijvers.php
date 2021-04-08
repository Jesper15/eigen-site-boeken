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
<h1>Schrijvers</h1>
<h4>Dit is een lijst van de schrijvers die zijn ingezonden:</h4>

<?php
//opstellen van de query
$query = "SELECT * FROM schrijver";

//uitvoeren van de query
$result = $conn->query($query);

if($conn->error) {
    echo $conn->error;
}

//testen of er rijen in de database staan
if($result->num_rows > 0) {
    echo "<div class='resultaten'>";

    //data in een tabel weergeven

    echo "<div class='wrappercontent'>
    <table id='tabelinfo' border='1'>
    <tr>
    <th>Naam</th>
    <th>Datum geboren</th>
    <th>Datum overleden (indien van toepassing)</th>
    <th>Plaats geboren</th>
    <tr>
    </div>";



    //opschrijven van de data per rij
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['schrijvernaam'] . "</td>";
        echo "<td>" . $row['datumgebor'] . "</td>";
        echo "<td>" . $row['datumover'] . "</td>";
        echo "<td>" . $row['schrijverplaats'] . "</td>";
        echo "</tr>";
    }
    echo "</div>";
} else {
    echo "Geen schrijvers gevonden";
}

?>

</body>

</html>
