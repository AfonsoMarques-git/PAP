<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "companhia_da_mariposa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO form_eventos (nome, email, contacto_telefonico, tipo_evento, data, n_pessoas, mensagem) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssis", $nome, $email, $contacto_telefonico, $tipo_evento, $data, $n_pessoas, $mensagem);

// Set parameters and execute
$nome = $_POST['nome'];
$email = $_POST['email'];
$contacto_telefonico = $_POST['telemovel'];
$tipo_evento = $_POST['event-option'];
$data = $_POST['selected_date'];
$n_pessoas = $_POST['n_pessoas'];
$mensagem = $_POST['mensagem'];

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
