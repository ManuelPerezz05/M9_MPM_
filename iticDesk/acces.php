<?php
session_start();

if (!isset($_SESSION['user_login'])) {
    header("Location: index.html");
    exit();
}

$user_email = $_SESSION['user_login'];
$rol = $_SESSION['user_role'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Acces</title>
    <meta charset="UTF-8">
</head>

<body>

    <h1>Hola <?php echo $user_email; ?> benvingut!!   </h1>
    <h3><p>Rol d'aquest usuari -> <?php echo $rol; ?></p></h3>

    <h2>Gestió de les incidències</h2>

    <li><a href="registre_incidencies.php">Informar nova incidència</a></li>
    <li><a href="incidencies.php">Llistat d'incidències</a></li>
</body>
<p>
<a href="logout.php">Tancar la sessió</a>
</p>
</html>