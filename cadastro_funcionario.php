<?php

// Start session
if (!session_id()) {
    session_start();
}
require_once "./conexao/config.php";
require_once "cad_func_insert.php";

// Verifica se o usuário está autenticado
if (!isset($_SESSION['usuario'])) {
    // Redireciona para a página de login
    header("Location: index.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gerenciador PalaceCode</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Inclua o jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/jquery.mask.js"></script>


    <!-- Inclua a biblioteca InputMask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/registro.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>

    <style>
.custom-close {
    background: none;
    border: none;
    padding: 0;
    color: #000; /* Cor do ícone */
    font-size: 24px; /* Tamanho do ícone */
    margin-right: 100px; /* Espaço entre o ícone e o canto direito do botão */
    float: right; /* Alinhar à direita */
}

    </style>

</head>

<body class="corpitio" style="background-image:url(./img/fundo2.png)">

    <div class="container form " >
        <div class="row" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    onclick="window.location.href='dash.php'">
                                    <span aria-hidden="true">&times;</span>
                                </button>
            <div class=" col-lg-12" >
                <div class="card o-hidden border-0 shadow-lg my-5" >
                <div class="form-group"></div>
                    <div class="card-body p-0">
                   
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <img id="palace" src="./img/palacelogo1.png" alt="Logo Palace">
                                <img id="rock" src="./img/logotcc.png" alt="Logo Rock">
                            </div>
                        </div>
                        
                        <div class="row " >
                            <div class="col-lg-12">
                                <div class="p-5">
                               
                                    <div class="text-center">
                                        <h1 class="h2 text-dark mb-4">Cadastrar Funcionário</h1>
                                    </div>
                                    <form class="user" action="cad_func_insert.php" method="POST">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" name="nome" placeholder="Primeiro nome" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="email" class="form-control form-control-user" name="email" placeholder="Endereço de Email" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0 ">
                                                <input type="text" id="cpf" name="cpf" class="form-control form-control-user" placeholder="CPF" maxlength="14" required>
                                            </div>

                                            <div class="col-sm-6">
                                                <input type="number" class="form-control date-time-mask form-control-user" name="idade" placeholder="Idade" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user" name="senha" placeholder="Senha" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user" name="rg" placeholder="RG" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="date" id="data" class="form-control form-control-user form-control" name="admissao" placeholder="Data" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="tel" class="form-control form-control-user" name="telefone" placeholder="Telefone" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" name="usuario" placeholder="Usuário" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control form-control-user" name="salario" placeholder="Salário" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <select class="form-control rounded-pill" name="ocupacao" placeholder="Selecione" required>
                                                    <option value="Admin" selected>Admin</option>
                                                    <option value="Gestor">Garçom</option>
                                                    <option value="Gerente">Cozinha</option>
                                                    <option value="Gerente">Caixa</option>
                                                    <option value="Gerente">Atendente</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-link bg-secondary text-light w-100" style="text-decoration: none;" type="submit">Cadastrar</button>
                                        </div>
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="sticky-footer">
            <div class="container">
                <div class="copyright text-center">
                    <span>Palacecode &copy; site desenvolvido 2023</span>
                </div>
            </div>
        </footer>

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages -->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
