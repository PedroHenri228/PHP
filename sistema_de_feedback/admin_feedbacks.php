<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $service_completed = $_POST['service_completed'];
    $service_cordial = $_POST['service_cordial'];
    $satisfaction = $_POST['satisfaction'];
    $recommend = $_POST['recommend'];
    $additional_comments = $_POST['additional_comments'];

    $conn = new mysqli('bfde230a740d', 'phpuser', 'phppass', 'feedback_db');

 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $stmt = $conn->prepare('INSERT INTO feedback 
            (nome, cpf, email, telefone, service_completed, service_cordial, satisfaction, recommend, additional_comments) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('sssssssss', $nome, $cpf, $email, $telefone, $service_completed, $service_cordial, $satisfaction, $recommend, $additional_comments);


    $stmt->execute();

    $stmt->close();

    $conn->close();


    header('Location: thank_you.php');
    exit;
}
?>
