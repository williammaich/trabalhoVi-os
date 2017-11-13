<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catalogo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM vinhos ORDER BY nota";
$result = $conn->query($sql);

$vinhos = array();


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $vinhos[] = array("id"=>utf8_encode($row['id']),
                         "nome"=>utf8_encode($row["nome"]),
                         "origem"=>utf8_encode($row["origem"]),
                          "vinicula"=>utf8_encode($row["vinicula"]),
                         "ano"=>utf8_encode($row["ano"]),
                        "nota"=>utf8_encode($row["nota"]),
                              "descricao"=>utf8_encode($row["descricao"]),
                              "tipo"=>utf8_encode($row["tipo"]),
                              "comentarios"=>utf8_encode($row["comentarios"])
                         );                        
    }
 
}

$conn->close();


echo json_encode($vinhos);
?>