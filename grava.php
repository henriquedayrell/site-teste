<?php 

try {
    // echo $_POST["nome"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_games";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $nome = "fifa";
    $data = "20220101";
    $preco = 10.20;
    // $nome = $_POST["nome"];
    // $data = $_POST["data"];
    // $preco = $_POST["preco"];


    $sql = "INSERT INTO games (nome, data, preco) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssf", $nome, $data, $preco);

    if ($stmt->execute()) {
        echo "New record inserted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

} catch (\Throwable $th) {
    var_dump($th);
}
