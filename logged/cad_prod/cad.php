<?php
include '../../db/conn.php';
if(isset($_POST['nome_prod']) and isset($_POST['qtd'])) {
    $nome = $_POST['nome_prod'];
    $qtd = intval($_POST['qtd']);
    $preco = str_replace(',', '.', $_POST['preco']);
    $obs = $_POST['obs'];
    if (isset($preco)) {
        if(isset($obs)){
            $obs = $_POST['obs'];
            echo 'veio para obs e preco';
            $insert = $conn->query("INSERT INTO produtos (nome_prod, qtd_prod, preco_prod, obs_prod) VALUES ('$nome', '$qtd', '$preco', '$obs')") or die($conn->error());
            if($insert){
                header('Location: ../index.php?sub=prod');
                exit();
            }else{
                printf('Erro ao inserir dados: '. $conn->error());
                die();
            }
        }
        echo 'veio para preco';
        $insert = $conn->query("INSERT INTO produtos (nome_prod, qtd_prod, preco_prod, obs_prod) VALUES ('$nome', '$qtd', '$preco')") or die($conn->error());
        if($insert){
            header('Location: ../index.php?sub=prod');
            exit();
        }else{
            printf('Erro ao inserir dados: '. $conn->error());
            die();
        }
    }elseif(isset($obs)){
        echo 'veio para obs sem preco';
        $insert = $conn->query("INSERT INTO produtos (nome_prod, qtd_prod, obs_prod) VALUES ('$nome', '$qtd', '$obs')") or die($conn->error());
        if($insert){
            header('Location: ../index.php?sub=prod');
            exit();
        }else{
            printf('Erro ao inserir dados: '. $conn->error());
            die();
        }
    }else{
        echo 'sem obs e sem preco';
        $insert = $conn->query("INSERT INTO produtos (nome_prod, qtd_prod) VALUES ('$nome', '$qtd')") or die($conn->error());
        if($insert){
            header('Location: ../index.php?sub=prod');
            exit();
        }else{
            printf('Erro ao inserir dados: '. $conn->error());
            die();
        }
    }
}else{
    echo 'parou aqui por algum motivo';
    die();
}