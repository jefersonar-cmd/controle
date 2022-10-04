<?php
session_start();
include '../../db/conn.php';
$id = $_GET['id'];

$delete = $conn->query("DELETE FROM users WHERE id_user='$id'");
if($delete){
    $_SESSION['msg'] = "<script type='text/javascript'>window.alert('Usuário deletado com sucesso!')</script>";
    header('Location: index.php?sub=cad');
}else{
    $_SESSION['msg'] = "<script type='text/javascript'>window.alert('Erro ao deletar o bendito!')</script>";
    header('Location: index.php?sub=cad');
}
