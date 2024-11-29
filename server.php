<?php
// Habilitar relatórios de erro
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost"; // Altere se necessário
$username = "seu_usuario";  // Insira seu usuário do banco de dados
$password = "sua_senha";    // Insira sua senha do banco de dados
$dbname = "restaurante";     // Nome do seu banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o método é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar e escapar dados
    $nome = isset($_POST['nome']) ? $conn->real_escape_string(trim($_POST['nome'])) : '';
    $quantidade = isset($_POST['quantidade']) ? (int)$_POST['quantidade'] : 0;

    // Verificar se os campos estão vazios
    if (empty($nome) || $quantidade <= 0) {
        echo "Erro: Nome do item e quantidade devem ser preenchidos corretamente.";
        exit;
    }

    // Inserir dados no banco de dados
    $sql = "INSERT INTO estoque (nome, quantidade) VALUES ('$nome', $quantidade)";
    if ($conn->query($sql) === TRUE) {
        echo "Novo item adicionado ao estoque.";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Método não permitido.";
}

$conn->close();
?>
