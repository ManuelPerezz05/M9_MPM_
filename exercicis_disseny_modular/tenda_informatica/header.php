<?php
session_start();

if (!isset($_SESSION['visites_tenda'])) {
    $_SESSION['visites_tenda'] = 0;
}
$isLogged = isset($_SESSION['usuari']);
$usuari = $isLogged ? $_SESSION['usuari'] : '';

if ($_SESSION['visites_tenda'] % 2 == 0) {
    echo "<h1>Benvingut de nou, esperem que tingui un bon dia</h1>";
} else {
    echo "<h1>Benvingut, és un plaer que ens visitis</h1>";
}

if ($isLogged) {
    echo "<p>Usuari: $usuari</p>";
    echo "<a href='logout.php'>Tanca la sessió</a>";
} else {
    echo "<a href='login.php'>Inicia sessió</a>";
}

// Missatges de descompte
if (!$isLogged && $_SESSION['visites_tenda'] == 20) {
    echo "<p>Agraïm la seva fidelitat, utilitzi el codi PROMO24 per un 20% de descompte</p>";
} elseif ($isLogged && $_SESSION['visites_tenda'] == 10) {
    echo "<p>$usuari, agraïm la seva fidelitat, utilitzi el codi PROMO24 per un 30% de descompte</p>";
}
?>
