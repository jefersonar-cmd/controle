<?php
session_start();
if(isset($_SESSION['logged'])){
    $user = $_SESSION['logged'][1];
    $acess = $_SESSION['logged'][2];
}else{
    $msg = 'Você infelizmente não está logado';
    header('Location: ../index.php?msg='.$msg);
    exit();
}
if (!empty($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle 2.0 - <?php echo $user;?></title>
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <link rel="stylesheet" href="../material_icons/material_icons.css">
    <link rel="stylesheet" href="basic.css">
</head>
<body>
    <div class="container-flex">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="../logged/">Controle 2.0</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="../logged/">Home</a>
                        <a href="index.php?sub=vend" class="nav-link">Venda</a>
                        <?php
                            if ($acess == 1) {
                                ?>
                                <a class="nav-link" href="index.php?sub=rel">Relatório</a>
                                <a class="nav-link" href="index.php?sub=prod">Produtos</a>
                                <a class="nav-link" href="index.php?sub=cad">Cadastros</a>
                                <?php
                            }
                        ?>
                        <a class="nav-link" href="index.php?sub=perfil">Meu Perfil</a>
                        <a href="exit.php" class="nav-link">Sair</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-flex">
            <?php
            $page = @$_GET['sub'];
            switch ($page) {
                case 'vend':
                    require 'venda.php';
                    break;
                case 'rel':
                    echo 'aqui será relatório';
                    break;
                case 'cad':
                    require 'cadastro.php';
                    break;
                case 'perfil':
                    require 'perfil.php';
                    break;
                case 'prod':
                    require 'produtos.php';
                    break;
                default:
                    # code...
                    break;
            }
            ?>
        </div>
    </div>
    <script src="../assets/bootstrap.bundle.min.js"></script>
</body>
</html>