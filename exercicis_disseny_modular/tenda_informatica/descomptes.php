<?php
try {
    if (isset($_SESSION['usuari'])) {
        echo "<p>Descompte especial per a usuaris registrats: 30%</p>";
    } else {
        echo "<p>Descompte per a visitants: 20%</p>";
    }
} catch (Exception $e) {
    echo "<p>Error al carregar els descomptes.</p>";
}
?>
