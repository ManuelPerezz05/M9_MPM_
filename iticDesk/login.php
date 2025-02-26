<?php
session_start();
$conn = mysqli_connect('localhost', 'manuel', 'manuel', 'manuel_perez_iticdesk');
if (!$conn) {
    die("Error al intentar conectarse a la base de datos.");
}
if (isset($_POST['user_log'])) {
    $user = $_POST['user_log'];
    $sql = "SELECT * FROM usuaris WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['user_login'] = $user;
        $_SESSION['log'] = true;
        $_SESSION['user_role'] = $row['rol'];
        header("Location: ./acces.php");
        exit();
    }
}
session_destroy();
header("Location: ./index.html");
exit();
?>