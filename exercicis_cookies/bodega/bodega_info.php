<?php
// Les dades del formulari i guardar-les com cookies
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    setcookie("majoredat", $_POST["majoredat"], time() + (86400 * 30), "/");
    setcookie("idioma", $_POST["idioma"], time() + (86400 * 30), "/");
    setcookie("moneda", $_POST["moneda"], time() + (86400 * 30), "/");
    $majoredat = $_POST["majoredat"];
    $idioma = $_POST["idioma"];
    $moneda = $_POST["moneda"];
} else {
    // Si no hi ha dades, retorna a la pàgina principal
    header("Location: bodega.php");
    exit();
}

// Missatges segons les opcions seleccionades
if ($majoredat === "no") {
    $missatge = [
        "catala" => "No et podem vendre alcohol si ets menor d’edat.",
        "espanyol" => "No podemos vender alcohol si eres menor de edad.",
        "angles" => "We cannot sell alcohol if you are underage."
    ][$idioma];
} else {
    // Preus i missatges dels productes
    $preus_vi = [
        "euros" => ["catala" => "260 €", "espanyol" => "260 €", "angles" => "260 €"],
        "lliures" => ["catala" => "217 £", "espanyol" => "217 £", "angles" => "217 £"],
        "dollars" => ["catala" => "273 $", "espanyol" => "273 $", "angles" => "273 $"]
    ];
    $preus_vodka = [
        "euros" => ["catala" => "23 €", "espanyol" => "23 €", "angles" => "23 €"],
        "lliures" => ["catala" => "19 £", "espanyol" => "19 £", "angles" => "19 £"],
        "dollars" => ["catala" => "24 $", "espanyol" => "24 $", "angles" => "24 $"]
    ];

    // Creem els missatges dels productes
    $missatge_vi = [
        "catala" => "T’oferim Whisky a " . $preus_vi[$moneda]["catala"],
        "espanyol" => "Te ofrecemos Whisky a " . $preus_vi[$moneda]["espanyol"],
        "angles" => "We offer Whisly at " . $preus_vi[$moneda]["angles"]
    ][$idioma];

    $missatge_vodka = [
        "catala" => "T’oferim Vodka a " . $preus_vodka[$moneda]["catala"],
        "espanyol" => "Te ofrecemos Vodka a " . $preus_vodka[$moneda]["espanyol"],
        "angles" => "We offer Vodka at " . $preus_vodka[$moneda]["angles"]
    ][$idioma];

    // Enllaçem els missatges dels dos productes
    $missatge = $missatge_vi . "<br>" . $missatge_vodka;
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informació Bodega de Manuel</title>
</head>
<body>
    <h1>Informació Bodega de Manuel</h1>
    <p><?= $missatge; ?></p>
</body>
</html>
