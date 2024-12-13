<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuari = trim($_POST['usuari']);
    if (!empty($usuari)) {
        $_SESSION['usuari'] = $usuari;
        header('Location: tenda.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="">
        <label for="usuari">Nom d'usuari:</label>
        <input type="text" id="usuari" name="usuari">
        <button type="submit">Entrar</button>
    </form>
    <a href="tenda.php">Accedir sense loguejar-se</a>
</body>
</html>
