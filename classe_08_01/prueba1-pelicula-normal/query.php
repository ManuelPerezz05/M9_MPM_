<!--Mostra el títol, puntuació i l'any de totes les pel·lícules que siguin de l'any introduït per l'usuari-->
<?php
// Se obtiene el valor de un campo de formulario que se ha enviado por el método POST con el nombre 'any'.
$any = $_POST['any'];

// 'localhost' -> El servidor de la base de datos.
// 'manuel' -> El nombre del usuario
// 'manuel' -> La contraseña del usuario
// 'base_de_datos' -> El nombre de la base de datos
$conn = mysqli_connect("localhost", "manuel", "manuel", "base_de_datos");

// Verifica si la conexión fue exitosa.
if (!$conn) {
    echo "Error al connectar amb la BBDD";
    exit();
}

$sql = "SELECT Titol, Any FROM Pelicules WHERE Any < $any";

// Se ejecuta la consulta SQL utilizando mysqli_query()
$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        echo "Títol: " . $row['Titol'] . " - Any: " . $row['Any'] . "<br>";
    }
} else {
    // Si no se encontraron resultados, se ve el echo.
    echo "No s'han trobat pel·lícules anteriors a l'any $any.";
}
?>

<br><a href="index.html"><button>Tornar</button></a>
