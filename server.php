<?php
$servername = "localhost"; // Altere para o seu servidor
$username = "seu_usuario"; // Insira seu usuário do banco de dados
$password = "sua_senha"; // Insira sua senha do banco de dados
$dbname = "restaurante"; // Nome do seu banco de dados

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $conn->real_escape_string($_POST['nome']);
    $quantidade = (int)$_POST['quantidade'];

    $sql = "INSERT INTO estoque (nome, quantidade) VALUES ('$nome', $quantidade)";
    if ($conn->query($sql) === TRUE) {
        echo "Novo item adicionado ao estoque.";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
