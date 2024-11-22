<?php
session_start();

if (!isset($_SESSION['cistella'])) {
    $_SESSION['cistella'] = [
        'pilota' => 0,
        'samarreta' => 0
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['afegir'])) {
    $quantitat_pilota = isset($_POST['quantitat_pilota']) ? (int)$_POST['quantitat_pilota'] : 0;
    $quantitat_samarreta = isset($_POST['quantitat_samarreta']) ? (int)$_POST['quantitat_samarreta'] : 0;

    if ($quantitat_pilota > 0) {
        $_SESSION['cistella']['pilota'] += $quantitat_pilota;
    }
    if ($quantitat_samarreta > 0) {
        $_SESSION['cistella']['samarreta'] += $quantitat_samarreta;
    }

    header("Location: index.html");
    exit();
} 

if (isset($_POST['finalitzar'])) {
    header("Location: resum_compra.php");
    exit();
}

?>
