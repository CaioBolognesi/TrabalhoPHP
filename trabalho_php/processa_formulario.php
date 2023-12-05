<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trabalho_web";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Operação de criação (CREATE)
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
        // Tratamento para data inválida
        echo "Formato de data inválido!";
        exit;
    }

    // Processamento do campo de foto
    $nome_arquivo = $_FILES['foto']['name'];

    // Inserção de dados na tabela usando prepared statement
    $sql = "INSERT INTO clientes (nome, sobrenome, cep, endereco, bairro, cidade, estado, numero, telefone, email, data_nascimento, genero, foto)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssssssssssss", $nome, $sobrenome, $cep, $endereco, $bairro, $cidade, $estado, $numero, $telefone, $email, $data_nascimento, $genero, $nome_arquivo);

        if ($stmt->execute()) {
            echo "Seja bem-vindo " . $nome . " " . $sobrenome . "!" . "<br>" . "<br>" . "Lista de clientes cadastrados: <br>";

            // Adicionando o script de redirecionamento
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

// Operação de leitura (READ)
$sql_read = "SELECT * FROM clientes";
$result = $conn->query($sql_read);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Verifica se a chave "id" existe no array $row antes de usá-la
        if (array_key_exists('id', $row)) {
            echo "ID: " . $row["id"] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . "Nome: &nbsp;&nbsp;" . $row["nome"] . " " . $row["sobrenome"] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" .  "Genero: " . $row["genero"] . "<br>";
        }
    }       
} else {
    echo "0 resultados";
}


// Fechando a conexão com o banco de dados
$conn->close();
?>
