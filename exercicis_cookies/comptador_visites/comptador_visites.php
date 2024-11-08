<?php
session_start();

// Inicialitzar el comptador de visites si no existeix
if (!isset($_SESSION['visites'])) {
    $_SESSION['visites'] = 0;
}

// Incrementar el comptador de visites
$_SESSION['visites']++;

// Calcular el descompte en funció del nombre de visites
$descompte = 0;
if ($_SESSION['visites'] >= 10) {
    $descompte = 50; // Descompte del 50% després de 10 visites
} elseif ($_SESSION['visites'] >= 5) {
    $descompte = 20; // Descompte del 20% després de 5 visites
}

// Preu base del producte
$preu_producte = 100;
$preu_final = $preu_producte;

// Aplicar descompte quan l'usuari clica per comprar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comprar'])) {
    if ($descompte > 0) {
        $preu_final = $preu_producte - ($preu_producte * ($descompte / 100));
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Compra del Producte</title>
</head>
<body>

<h1>Compra del Producte</h1>

<p>Nombre de visites: <?php echo $_SESSION['visites']; ?></p>

<?php if ($descompte > 0): ?>
    <p>Felicitats! Tens un descompte del <?php echo $descompte; ?>% en la teva compra.</p>
<?php endif; ?>

<form method="POST">
    <p>Preu original: <?php echo $preu_producte; ?>€</p>
    <p>Preu final amb descompte aplicat: <?php echo $preu_final; ?>€</p>
    <button type="submit" name="comprar">Comprar amb Descompte</button>
</form>

</body>
</html>
