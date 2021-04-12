<html lang="en">

<head>

    <?php
    // checkt of sessie bestaat
    if (!isset($_SESSION)) {
        // maakt sessie aan
        session_start();
    }

    // maakt text aan
    $text = 'logout';

    // checkt of er is ingelogd
    if (!isset($_SESSION['logged-in']) || !$_SESSION['logged-in']) {
        // zo niet past text aan
        $text = 'login';
    }

    // ceckt of je ben ingelogd en past zorgt ervoor dat je kan uitloggen
    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: login.php");
        exit;
    }
    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">

    <section class="navigatie">

        <h1>Jesper Otten</h1>
        <ul class="nav">
            <a href="index.php">Home</a>
            <a href="boeken.php">Boeken</a>
            <a href="inzendingen.php">Boeken inzenden</a>
            <a href="schrijvers.php">Schrijvers</a>
            <a href="schrijverinzenden.php">Schrijvers inzenden</a>
            <a href="genres.php">Genres</a>
            <a href="genreinzenden.php">Genres inzenden</a>
            <form method="POST">
                <!-- plaatst hier die button -->
                <button class="btn_loginpage" name="logout" href="login.php"><?php echo $text; ?></button>
            </form>
        </ul>
    </section>

</head>

</html>