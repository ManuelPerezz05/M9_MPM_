<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
        <h1>Benvingut, <?php echo htmlspecialchars($username); ?>!</h1>

    </header>
    <main>
        <p> Aquesta és la pàgina 2 d'informació.</p>
        <a href="pagina1.php">Tornar a la Pàgina 1</a>
        <p> <a href= "logout.php">Tancar sessió</a></p>
    </main>
</body>
</html>
