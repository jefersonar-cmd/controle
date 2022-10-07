<?php
include '../../db/conn.php';
$id = $_POST['id'];
$nome = $_POST['nome_prod'];
$qtd = $_POST['qtd'];
$preco = str_replace(',','.',$_POST['preco']);
$obs = $_POST['obs'];
$update = $conn->query("UPDATE produtos SET nome_prod='$nome', qtd_prod='$qtd', preco_prod='$preco', obs_prod='$obs' WHERE id_prod='$id'");
if($update){
    header("Location: ../index.php?sub=prod");
    exit();
}else{
    die("Error updating: %s\n". $conn->errno);
}