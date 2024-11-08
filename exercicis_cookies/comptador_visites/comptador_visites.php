<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comptador de Visites</title>
</head>
<body>

<h1>Benvingut a la nostra botiga!</h1>

<!-- Mostrar el comptador de visites -->
<p>Visites actuals: <span id="comptador">
    <?php 
        session_start();
        
        // Si és la primera visita, inicialitzar el comptador
        if (!isset($_SESSION['visites'])) {
            $_SESSION['visites'] = 1;
        } else {
            $_SESSION['visites']++;
        }

        // Mostrar el nombre de visites
        echo $_SESSION['visites'];
    ?>
</span></p>

<!-- Missatges de descompte segons el nombre de visites -->
<?php
    if ($_SESSION['visites'] >= 10) {
        echo "<p>Oferta exclusiva sols per a tu! Utilitza el codi <strong>BOTIGA50</strong> per obtenir un 50% de descompte en les teves primeres compres a la botiga</p>";
    } elseif ($_SESSION['visites'] >= 5) {
        echo "<p>Oferta exclusiva! Utilitza el codi <strong>BOTIGA20</strong> per obtenir un 20% de descompte en les teves primeres compres a la botiga</p>";
    }
?>

<!-- Formulari de compra -->
<form method="post" action="comptador_visites.php">
    <label for="compra">Vols comprar alguna cosa? </label>
    <button type="submit" name="compra">Comprar</button>
</form>

</body>
</html>
