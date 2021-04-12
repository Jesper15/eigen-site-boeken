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

<form action="inc/schrijverinzenden.php" method="POST" class="formpage">
    <h1>Schrijver inzenden</h1>

    <h4>Hier kan je schrijvers inzenden:</h4>

    <label for="schrijvernaam">Naam:</label>
    <input type="text" id="schrijvernaam" name="schrijvernaam" required>
    <br>

    <label for="datumgebor">Datum geboren:</label>
    <input type="date" id="datumgebor" name="datumgebor" required>
    <br>

    <label for="datumover">Datum overleden (indien van toepassing):</label>
    <input type="date" id="datumover" name="datumover">
    <br>

    <label for="schrijverplaats">Plaats geboren:</label>
    <input type="text" id="schrijverplaats" name="schrijverplaats" required>
    <br>

    <button type="submit">Verzenden</button>

</form>

<?php
include './inc/footer.inc.php';
?>
