<?php include './inc/header.inc.php';
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

<form action="inc/genreinzenden.php" method="POST" class="formpage">

<h1>Genre inzenden</h1>

<h4>Hier kan je genres inzenden:</h4>

    <label for="genreNaam">Naam van de genre:</label>
    <input type="text" id="genreNaam" name="genreNaam" required>
    <br>

    <label for="genreInhoud">Beschrijving van de genre:</label>
    <textarea type="text" id="genreInhoud" name="genreInhoud" required></textarea>
    <br>

    <button type="submit">Verzenden</button>

    <?php
    include './inc/footer.inc.php';
    ?>

</form>