<?php
session_start();
if (!isset($_SESSION['log']) || $_SESSION['log'] !== true) {
    header("Location: index.html");
    exit();
}
$conn = mysqli_connect('localhost', 'manuel', 'manuel', 'manuel_perez_iticdesk');
$sql = "SELECT * FROM incidencies ORDER BY FIELD(prioritat, 'I', 'II', 'III', 'IV'), data_creacio ASC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Llistat de totes les Incidències</title>
</head>
<a href="acces.php">Tornar a l'inici</a>
<body>

    <h1>Llistat d'incidències</h1>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <strong>ID de la incidència -> </strong> <?php echo $row['id']; ?><br>
                <strong>Prioritat:</strong> <?php echo $row['prioritat']; ?><br>
                <strong>Títol:</strong> <?php echo $row['titol']; ?><br>
                <strong>Descripció:</strong> <?php echo $row['descripcio']; ?><br>
                <strong>Referència:</strong> <?php echo $row['referencia']; ?><br>
                <strong>Usuari Email:</strong> <?php echo $row['usuari_email']; ?><br>
                <strong>Data Creació:</strong> <?php echo $row['data_creacio']; ?><br>
                <strong>Estat:</strong> <?php echo $row['estat']; ?><br>
        </br>
        <?php } ?>

</body>
</html>
<?php mysqli_close($conn); ?>