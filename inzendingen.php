<?php
include './inc/header.inc.php';
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

<h1>Boeken inzenden</h1>

<h4>Hier kan je boeken inzenden:</h4>

<form action="inc/inzenden.php" method="POST" class="formpage">
    <label for="titel">Titel:</label>
    <input type="text" id="titel" name="titel" required>
    <br>

    <!--dropdown menu van de schrijvers-->
    <label for="schrijver">Schrijver:</label>
    <?php
    $resultSet = $conn->query("SELECT schrijvernaam, schrijver_id  FROM schrijver");
    ?>
    <select name="schrijver">
        <?php
        while ($rows = $resultSet->fetch_assoc()) {
            $id = $rows['schrijver_id'];
            $naam = $rows['schrijvernaam'];

            echo "<option value='$id'>$naam</option>";
        }
        ?>
    </select>
    <br>
    <!--einde dropdown menu-->

    <label for="datumbegin">Datum begonnen:</label>
    <input type="date" id="datumbegin" name="datumbegin" required>
    <br>

    <label for="datumeind">Datum geëindigd:</label>
    <input type="date" id="datumeind" name="datumeind" required>
    <br>

    <label for="kortebeschrijving">Beschrijving:</label>
    <textarea type="text" id="kortebeschrijving" name="kortebeschrijving" required></textarea>
    <br>

    <label for="genre">Genre:</label>
    <?php
    $resultSet = $conn->query("SELECT genreNaam, genre_id  FROM genre");
    ?>
    <select name="genre">
        <?php
        while ($rows = $resultSet->fetch_assoc()) {
            $idGenre = $rows['genre_id'];
            $naamGenre = $rows['genreNaam'];

            echo "<option value='$idGenre'>$naamGenre</option>";
        }
        ?>
    </select>
    <br>

    <label for="label">Labels:</label>
    <input type="text" id="label" name="label" required>
    <br>

    <button type="submit">Verzenden</button>

</form>
