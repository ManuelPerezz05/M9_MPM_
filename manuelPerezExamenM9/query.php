<?php

$servername = "localhost";
$username = "manuelPerezExam";
$password = "Admin1234*";
$database = "manuelPerezExam";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


if (isset($_GET['anyo'])) {
    $anyo = $_GET['anyo'];

//consulta
    $sql = "SELECT titulo, puntuacion, anyo FROM peliculas WHERE anyo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $anyo);
    $stmt->execute();
    $result = $stmt->get_result();

 
    if ($result->num_rows > 0) {
        echo "<h2>Películas del año $anyo:</h2>";
        while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['titulo']} - Puntuación: {$row['puntuacion']}</li>";
        }
    } else {
        echo "<p>No hay películas registradas en el año $anyo.</p>";
    }

}

$conn->close();
?>
