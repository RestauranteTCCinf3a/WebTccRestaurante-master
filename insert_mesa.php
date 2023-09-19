<?php
// Start session
if (!session_id()) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define o email e senha esperados
    $mesa = $_POST['mesa'];

    require_once "./conexao/config.php";

    try {
        // Cria uma nova conexão PDO
        $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        // Define o modo de erro PDO para exceções
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepara a declaração SQL para inserir o registro
        $stmt = $conn->prepare("INSERT INTO mesas (numero_mesa)
        VALUES (:mesa)");

        // Vincula os parâmetros aos valores
        $stmt->bindParam(':mesa', $mesa);
       
        // Executa a declaração preparada
        if ($stmt->execute()) {
            // Verifica se o registro foi inserido com sucesso
            if ($stmt->rowCount() > 0) {
                echo "Registro inserido com sucesso!";
                header("Location: utilities-mesas.php");
                exit();
            } else {
                echo "Erro ao inserir o registro.";
                header("Location: utilities-mesas.php");
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