<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "companhia_da_mariposa";

// Create connection
$ligacao = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($ligacao->connect_error) {
    die("Falha na conexão: " . $ligacao->connect_error);
}

// Set parameters and execute
$nome = $_POST['nome'];
$email = $_POST['email'];
$contacto_telefonico = $_POST['telemovel'];
$mensagem = $_POST['mensagem'];

// Prepare and bind
$stmt = $ligacao->prepare("INSERT INTO contactos (nome, email, contacto_telefonico, mensagem) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $nome, $email, $contacto_telefonico, $mensagem);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "New record created successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
}

$stmt->close();
$ligacao->close();
?>