<?php
session_start();

$conn = mysqli_connect('localhost', 'manuelPerezExam', 'Admin1234*', 'manuelPerezExam');

if (!$conn) {
    echo "Error al conectar";
} else {
    $p = $_POST['puntuacion'];
    $sql = "SELECT TITULO, PUNTUACION FROM peliculas WHERE puntuacion < '$p'";
    $query = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($query)) {
        echo $row['TITULO'] . " - " . $row['PUNTUACION'] . "<br>";
    }
}
?>
