<?php
session_start();

// Si no hi ha productes a la cistella, redirigir a index
if (!isset($_SESSION['cistella']) || ($_SESSION['cistella']['pilota'] == 0 && $_SESSION['cistella']['samarreta'] == 0)) {
    echo "<h1>No has afegit productes a la cistella.</h1>";
    echo '<a href="index.html">Torna a la botiga</a>';
    exit();
}

$cistella = $_SESSION['cistella'];
$preu_pilota = 57;
$preu_samarreta = 115;

// Fer els calculs
$total_pilota = $cistella['pilota'] * $preu_pilota;
$total_samarreta = $cistella['samarreta'] * $preu_samarreta;
$total_general = $total_pilota + $total_samarreta;
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resum de la compra</title>
</head>
<body>
    <h1>Resum de la teva compra</h1>
    <ul>
        <?php if ($cistella['pilota'] > 0): ?>
            <li>Pilota de futbol (<?php echo $cistella['pilota']; ?> unitats) = <?php echo $total_pilota; ?>€</li>
        <?php endif; ?>

        <?php if ($cistella['samarreta'] > 0): ?>
            <li>Samarreta del Barça (<?php echo $cistella['samarreta']; ?> unitats) = <?php echo $total_samarreta; ?>€</li>
        <?php endif; ?>
    </ul>
    <h2>Total de la compra: <?php echo $total_general; ?>€</h2>

    <!-- Botó per confirmar la compra -->
    <form action="confirmar_compra.php" method="post">
        <button type="submit">Confirmar compra</button>
    </form>

    <br>
    <a href="index.html">Torna a la botiga</a>
</body>
</html>
