<?php
// Start session
if (!session_id()) {
    session_start();
}

require_once "./conexao/config.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define o email e senha esperados
    $id = $_POST['id'];
    $cpf = $_POST['cpf'];
    // Remover caracteres não numéricos do CPF
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    // Adicionar pontos e traço no CPF formatado
    $cpf_formatado = substr_replace($cpf, '.', 3, 0);
    $cpf_formatado = substr_replace($cpf_formatado, '.', 7, 0);
    $cpf2 = substr_replace($cpf_formatado, '-', 11, 0);

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $ocupacao = $_POST['ocupacao'];
    $usuario = $_POST['usuario'];
    $idade = $_POST['idade'];
    $senha = $_POST['senha'];
    $rg = $_POST['rg'];
    $salario = $_POST['salario'];
    $telefone = $_POST['telefone'];
    $admissao = $_POST['data_inicio'];
    $data = date('Y-m-d', strtotime(str_replace('/', '-', $admissao)));

    require_once './conexao/config.php';

    try {
        // Cria uma nova conexão PDO
        $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        // Define o modo de erro PDO para exceções
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlUpdate = "UPDATE funcionario SET NOME_FUNC=:nome,
                                            CPF_FUNC=:cpf,
                                            EMAIL_FUNC=:email,
                                            OCUPACAO=:ocupacao,
                                            USUARIO=:usuario,
                                            IDADE_TRA=:idade,
                                            SENHA=:senha,
                                            RG_FUNC=:rg,
                                            SALARIO_FUNC=:salario,
                                            TELEFONE_FUNC=:telefone,
                                            DATA_INICIO=:data
                        WHERE ID_FUNC=:id";

        $stmt = $conn->prepare($sqlUpdate);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf2);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':ocupacao', $ocupacao);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':salario', $salario);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            header("Location: tables.php");
        } else {
            echo "Erro ao atualizar registro: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }
}
?>