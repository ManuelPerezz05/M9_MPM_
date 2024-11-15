<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bodega-Manuel</title>
</head>
<body>
    <h1>Benvingut a la Bodega de Manuel</h1>
    <form action="bodega_info.php" method="POST">
        <label for="majoredat">Ets major d'edat?</label><br>
        <input type="radio" id="si" name="majoredat" value="si" required>
        <label for="si">Sí</label><br>
        <input type="radio" id="no" name="majoredat" value="no">
        <label for="no">No</label><br><br>

        <label for="idioma">Selecciona l'idioma</label><br>
        <select name="idioma" id="idioma" required>
            <option value="catala">Català</option>
            <option value="espanyol">Español</option>
            <option value="angles">English</option>
        </select><br><br>

        <label for="moneda">Selecciona la moneda</label><br>
        <select name="moneda" id="moneda" required>
            <option value="euros">Euros</option>
            <option value="lliures">Pounds</option>
            <option value="dollars">Dollars</option>
        </select><br><br>

        <button type="submit">Envia</button>
    </form>
</body>
</html>
