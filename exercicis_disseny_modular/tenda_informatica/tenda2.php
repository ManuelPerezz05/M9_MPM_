<?php
session_start();

if (!isset($_SESSION['visites_tenda'])) {
    $_SESSION['visites_tenda'] = 0;
}
$_SESSION['visites_tenda']++;

include 'header.php';

echo "<h2>Altres productes de la nostra tenda:</h2>";
echo "<ul>
    <li>Ratolí sense fils - 25€</li>
    <li>Altaveus - 40€</li>
    <li>Base de refrigeració - 30€</li>
</ul>";

include 'descomptes.php';

echo "<a href='tenda.php'>Tornar als productes anteriors</a>";

echo "<p><strong>Visites a la botiga:</strong> {$_SESSION['visites_tenda']}</p>";

include 'footer.php';
?>
