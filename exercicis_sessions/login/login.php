<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $password && !empty($username)) {
        $_SESSION['username'] = $username;
        header("Location: pagina1.php");
        exit();
    } else {
        echo "<h1>Dades incorrectes</h1>";
        echo '<a href="index.html">Torna a fer sessió</a>';
    }
} else {
    header("Location: index.html");
    exit();
}
?>
