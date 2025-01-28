<?php
session_start();

$conn = mysqli_connect('localhost', 'manuel', 'manuel', 'M9_Manuel');
if (!$conn) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$user = $_POST['user_log'];
$password = $_POST['pswd'];

$sql = "SELECT * FROM login_classe WHERE username = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $user);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    if ($password === $row['password']) {
        $_SESSION['user_login'] = $user;
        $_SESSION['log'] = true;
        header("Location: ./login_correct.php");
        exit();
    }
}

// Si el login falla
session_destroy();
header("Location: ./index.html");
exit();
?>
