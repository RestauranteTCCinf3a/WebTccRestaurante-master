<?php
// Start session
if (!session_id()) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define o email e senha esperados
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $ocupacao = $_POST['ocupacao'];
    $usuario = $_POST['usuario'];
    $idade = $_POST['idade'];
    $senha = $_POST['senha'];
    $rg = $_POST['rg'];
    $salario = $_POST['salario'];
    $telefone = $_POST['telefone'];
    $admissao = $_POST['admissao'];
    $data = date('Y-m-d', strtotime(str_replace('/', '-', $admissao)));

    require_once "./conexao/config.php";

    try {
        // Cria uma nova conexão PDO
        $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        // Define o modo de erro PDO para exceções
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepara a declaração SQL para inserir o registro
        $stmt = $conn->prepare("INSERT INTO funcionario (cpf_func, nome_func, email_func, ocupacao, usuario, idade_tra, senha, rg_func, salario_func, telefone_func, data_inicio)
        VALUES (:cpf, :nome, :email, :ocupacao, :usuario, :idade, :senha, :rg, :salario, :telefone, :data_data)");

        // Vincula os parâmetros aos valores
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':ocupacao', $ocupacao);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':salario', $salario);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':data_data', $data);

        // Executa a declaração preparada
        if ($stmt->execute()) {
            // Verifica se o registro foi inserido com sucesso
            if ($stmt->rowCount() > 0) {
                echo "Registro inserido com sucesso!";
                header("Location: tables.php");
                exit();
            } else {
                echo "Erro ao inserir o registro.";
                header("Location: cadastro_funcionario.php");
                exit();
            }
        } else {
            echo "Erro na execução da declaração: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        // Trata erros de conexão PDO
        echo "Erro na conexão: " . $e->getMessage();
    }
}
?>