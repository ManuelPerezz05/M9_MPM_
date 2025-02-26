<?php
session_start();
if (!isset($_SESSION['log']) || $_SESSION['log'] !== true) {
    header("Location: index.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = mysqli_connect('localhost', 'manuel', 'manuel', 'manuel_perez_iticdesk');
    $usuari = $_SESSION['user_login'];
    $data = date("Y-m-d H:i:s");
    $referencia = $_POST['referencia'];
    $titol = $_POST['titol'];
    $descripcio = $_POST['descripcio'];
    $prioritat = $_POST['prioritat'];
    
    $sql = "INSERT INTO incidencies (referencia, prioritat, titol, descripcio, usuari_email, data_creacio) VALUES ('$referencia', '$prioritat', '$titol', '$descripcio', '$usuari', '$data')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo "Incidència registrada, es gestionarà lo abans possible";
}
?>
<form method="POST">
    <div>
        <label for="referencia">Referència</label><br>
        <input type="text" id="referencia" name="referencia" required><br><br>
    </div>
    <div>
        <label for="titol">Títol</label><br>
        <input type="text" id="titol" name="titol" required><br><br>
    </div>
    <div>
        <label for="descripcio">Descripció</label><br>
        <textarea id="descripcio" name="descripcio" required></textarea><br><br>
    </div>
    
    <div>
        <label for="prioritat">Prioritat</label><br>
        <select id="prioritat" name="prioritat">
            <option value="I">I - Crítica</option>
            <option value="II">II - Urgent</option>
            <option value="III">III - Lleu</option>
            <option value="IV">IV - No urgent</option>
        </select><br><br>
    </div>

    <div>
        <button type="submit">Enviar l'incidència</button>
    </div>
</form>

<a href="acces.php">Tornar a l'inici</a>
