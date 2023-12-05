<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trabalho_web";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $numero = $_POST['numero'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    $data_nascimento_formatada = DateTime::createFromFormat('d/m/Y', $data_nascimento);
    $genero = $_POST['genero'];

    if ($data_nascimento_formatada) {
        $data_nascimento = $data_nascimento_formatada->format('Y-m-d');
    } else {
        echo "Formato de data inválido!";
        exit;
    }

    $nome_arquivo = $_FILES['foto']['name'];

    $sql = "INSERT INTO clientes (nome, sobrenome, cep, endereco, bairro, cidade, estado, numero, telefone, email, data_nascimento, genero, foto)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssssssssssss", $nome, $sobrenome, $cep, $endereco, $bairro, $cidade, $estado, $numero, $telefone, $email, $data_nascimento, $genero, $nome_arquivo);

        if ($stmt->execute()) {
            echo "Seja bem-vindo " . $nome . " " . $sobrenome . "!" . "<br>" . "<br>" . "Lista de clientes cadastrados: <br>";

            echo "<script>
                    alert('Cadastro feito com sucesso! Você será redirecionado em 5 segundos.');
                    setTimeout(function(){
                        window.location.href = 'http://localhost/trabalho_php';
                    }, 5000); // Redireciona após 5 segundos
                </script>";
        } else {
            echo "Erro na execução da inserção: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }
}


$sql_read = "SELECT * FROM clientes";
$result = $conn->query($sql_read);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (array_key_exists('id', $row)) {
            echo "ID: " . $row["id"] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . "Nome: &nbsp;&nbsp;" . $row["nome"] . " " . $row["sobrenome"] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" .  "Genero: " . $row["genero"] . "<br>";
        }
    }       
} else {
    echo "0 resultados";
}


$conn->close();
?>
