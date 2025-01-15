$nota = $_GET['nota'];
    $sql = "SELECT * FROM usuaris WHERE nota > $nota";
    $query = mysqli_query($conn,$sql);
    while($rows = mysqli_fetch_array($query)){
        echo "Nom alumne: " . $rows['nom'] . ". Cognom alumne: " . $rows['cognom'] . ". Nota:" . $rows['nota'] . "<br>";
    }
