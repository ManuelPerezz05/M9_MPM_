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
    echo "Incidència registrada";
}
?>
<form method="POST">
    <label for="referencia">Referència</label>
    <input type="text" id="referencia" name="referencia" required><br>
    
    <label for="titol">Títol</label>
    <input type="text" id="titol" name="titol" required><br>
    
    <label for="descripcio">Descripció</label>
    <textarea id="descripcio" name="descripcio" required></textarea><br>
    
    <label for="prioritat">Prioritat</label>
    <select id="prioritat" name="prioritat">
        <option value="I">I - Crítica</option>
        <option value="II">II - Urgent</option>
        <option value="III">III - Lleu</option>
        <option value="IV">IV - No urgent</option>
    </select><br>
    
    <button type="submit">Registrar la incidència</button>
</form>
<a href="acces.php">Tornar a l'inici</a>