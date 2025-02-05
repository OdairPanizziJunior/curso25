<?php
$servername = "localhost";
$username = "root";
$password = "qwe123!";  // Sua senha do MySQL

// Criar conexão
$conn = new mysqli($servername, $username, $password);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} 
echo "Conexão bem-sucedida!";
?>
