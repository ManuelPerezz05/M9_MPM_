<?php
session_start();

$conn = mysqli_connect('localhost', 'manuelPerezExam', 'Admin1234*', 'manuelPerezExam');

if (!$conn) {
    echo "Error al conectar";
} else {
    $y = $_POST['any'];
    $sql = "SELECT TITULO, PUNTUACION, `ANYO` FROM peliculas WHERE `ANYO` = '$y'";
    $query = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($query)) {
        echo $row['TITULO'] . " - " . $row['PUNTUACION'] . " - " . $row['ANYO'] . "<br>";
    }
}
?>