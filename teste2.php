<?php

try {
    require_once './conexao/config.php';
    $sql24 = "SELECT ID_FUNC FROM funcionario ORDER BY ID_FUNC ASC";

    $statement = $conn->query($sql24);
    $usuarios = $statement->fetchAll();
    $total_usuarios = $statement->rowCount();
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<?php

// Start session
if(!session_id()){
    session_start();
}
require_once "./conexao/config.php";
require_once "UsuarioName.php";
require_once "visualizar.php";

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
    <link href="css/table.css" rel="stylesheet">
    <meta name="author" content="">
    <title>Gerenciador Palacecode</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>


    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="./js/jquery.mask.js"></script>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


    <script>
        $("#data").mask("00/00/0000");
    </script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dash.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="./img/logotcc.png">
                </div>
                <div class="sidebar-brand-text mx-3">Rock Speto</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dash.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span> Painel de gerenciamento</span></a>
            </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Heading -->
       <div class="sidebar-heading">
           Interface
       </div>

       <!-- Nav Item - Pages Collapse Menu -->
                   <!--Apagado-->


       <!-- Nav Item - Utilities Collapse Menu -->
       <li class="nav-item">
           <a class="nav-link" href="utilities-mesas.php">
               <i class="fas fa-fw fa-table"></i>
               <span>Mesas</span></a>
       </li>

         <!-- Divider -->
         <hr class="sidebar-divider">

       <li class="nav-item">
           <a class="nav-link" href="utilities-cardapio.php">
               <i class="fas bi-card-checklist"></i>
               <span>Cardápio</span></a>
       </li>
         <!-- Divider -->
         <hr class="sidebar-divider">


        
       <li class="nav-item">
           <a class="nav-link" href="utilities-pedidos.php">
               <i class="fas fa-fw bi-phone"></i>
               <span>Pedidos</span></a>
       </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


       <li class="nav-item">
           <a class="nav-link" href="utilities-caixa.php">
               <i class="fas bi-cash-coin"></i>
               <span>Caixa</span></a>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">
   
       <!-- Nav Item - Tables -->
       <li class="nav-item">
           <a class="nav-link" href="tables.php">
               <i class="fas bi-person-circle"></i>
               <span>Funcionários</span></a>
       </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class=" d-flex flex-column" style="background-image:url(./img/fundoq.png)">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Pesquisar..." aria-label="Pesquisar"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-dark" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                            <!--Apagado-->

                            <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nomeUsuario ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="conta.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil 
                                </a>
                        
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                   Sair da conta 
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

              

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-dark">Funcionários</h1>
                    <p class="mb-4">
                        <a target="_blank"
                            href="https://datatables.net"></a></p>

                            <button id="cadastrar-funcionario" type="button" class="btn btn-link" style="text-decoration: none; margin-bottom: 30px;" value="cadastrar">
                              <i class="fas bi-box-arrow-up-right text-dark" style="float: left; margin-right: 10px; margin-top: 2px;"></i>
                                <h6 class="m-0 font-weight-bold text-dark float-right ">Cadastrar Funcionario</h6>
                            </button>

                            <script>
                                document.getElementById("cadastrar-funcionario").addEventListener("click", function() {
                                    window.location.href = "cadastro_funcionario.php";
                                });
                              </script>
                              <?php
include './conexao/config.php';

try {
    // Cria uma nova conexão PDO
    $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    // Define o modo de erro PDO para exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $quantidade = 6;
    
    // Calcular o número de páginas necessárias para apresentar os usuários
    $sql24 = "SELECT COUNT(*) as total FROM funcionario WHERE situacao = 'ATIVO'";
    $stmt24 = $conn->query($sql24);
    $total_usuarios = $stmt24->fetchColumn();
    $num_paginas = ceil($total_usuarios / $quantidade);

    // Calcular o início da visualização
    $pagina = (isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1);
    $inicio = ($quantidade * $pagina) - $quantidade;

    $query = "SELECT ID_FUNC as id,
                    CPF_FUNC as cpf,
                    NOME_FUNC as nome,
                    EMAIL_FUNC as email,
                    OCUPACAO as ocupacao,
                    USUARIO as usuario,
                    IDADE_TRA as idade,
                    SENHA as senha,
                    RG_FUNC as rg,
                    SALARIO_FUNC as salario,
                    TELEFONE_FUNC as telefone,
                    DATE_FORMAT(DATA_INICIO, '%d/%m/%Y') as data_inicio,
                    FORMAT(SALARIO_FUNC, 2, 'pt_BR') as salario
            FROM funcionario WHERE situacao = 'ATIVO' ORDER BY ID_FUNC DESC LIMIT $inicio, $quantidade";
    $stmt = $conn->query($query);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Gerenciamento de Funcionários</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-fluid display" id="myTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ocupação</th>
                        <th>Idade</th>
                        <th>Data de início</th>
                        <th>Salário</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($results as $row) {
                    ?>
                        <tr>
                            <td><?php echo $row['nome']; ?></td>
                            <td><?php echo $row['ocupacao']; ?></td>
                            <td><?php echo $row['idade']; ?></td>
                            <td><?php echo $row['data_inicio']; ?></td>
                            <td><?php echo $row['salario']; ?></td>
                            <td class="text-center">
                                <span class="d-none d-md-block">
                                    <a class="btn btn-outline-primary" href="visualizar.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#myModal1<?php echo $row['id']; ?>">Visualizar</a>
                                    <a class="btn btn-outline-warning" href="editar_registro.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>">Editar</a>
                                    <a href="deletar_registro.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-danger">Excluir</a>
                                </span>
                            </td>
                        </tr>
                        <div class="modal fade" id="myModal1<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1<?php echo $row['id']; ?>">
                            <!-- Modal de Visualização aqui -->
                        </div>
                        <div class="modal fade" id="myModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['id']; ?>">
                            <!-- Modal de Edição aqui -->
                        </div>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-lg-center">
        <li class="page-item">
            <a class="page-link" href="?pagina=1"><strong>Primeira</strong><span aria-hidden="true">&laquo;</span></a>
        </li>
        <li class="page-item">
            <a class="page-link" href="?pagina=<?= $pagina - 1 ?>"><strong>Anterior</strong><span aria-hidden="true">&laquo;</span></a>
        </li>

        <?php
        for ($i = max(1, $pagina - 3); $i <= min($pagina + 3, $num_paginas); $i++) {
            echo "<li class='page-item" . ($i == $pagina ? " active" : "") . "'><a class='page-link' href='?pagina=$i'>$i</a></li>";
        }
        ?>

        <li class="page-item">
            <a class="page-link" href="?pagina=<?= $pagina + 1 ?>"><strong>Próximo</strong><span aria-hidden="true">&raquo;</span></a>
        </li>
        <li class="page-item">
            <a class="page-link" href="?pagina=<?= $num_paginas ?>"><strong>Última</strong><span aria-hidden="true">&raquo;</span></a>
        </li>
    </ul>
</nav>


                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PalaceCode 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pronto para sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Sair" abaixo se você está pronto para encerrar sua sessão</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-dark" href="index.php">Sair</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
