<?php
session_start();

if (!isset($_SESSION['visites_tenda'])) {
    $_SESSION['visites_tenda'] = 0;
}
$_SESSION['visites_tenda']++;

include 'header.php';

echo "<h2>Productes disponibles a la nostra tenda:</h2>";
echo "<ul>
    <li>Ordinador portàtil - 700€</li>
    <li>Monitor Full HD - 150€</li>
    <li>Teclat mecànic - 50€</li>
</ul>";

include 'descomptes.php';

echo "<a href='tenda2.php'>Més productes</a>";

echo "<p><strong>Visites a la botiga:</strong> {$_SESSION['visites_tenda']}</p>";

include 'footer.php';
?>
