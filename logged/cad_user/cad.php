<?php
session_start();
include '../../db/conn.php';

if(isset($_POST['user']) and isset($_POST['email']) and isset($_POST['pass']) and isset($_POST['acess'])){
    $user = $_POST['user'];
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $acess = $_POST['acess'];

    //echo $user, $email, $pass, $acess;
    $insert = $conn->query("INSERT INTO users (user_name, email, password, acess) VALUES ('$user','$email', '$pass', '$acess')");
    if($insert){
        $_SESSION['msg'] = "<script type='text/javascript'>window.alert('Usuário: '". $user ."', cadastrado com sucesso!')</script>";
        header('Location: ../index.php?sub=cad');
    } else {
        $_SESSION['msg'] = "<script type='text/javascript'>window.alert('Erro ao inserir dados no banco!')</script>";
        header('Location: ../index.php?sub=cad');
    }
}else {
    $_SESSION['msg'] = "<script type='text/javascript'>window.alert('Algum campo ficou vazio, se vira!')</script>";
    header('Location: ../index.php?sub=cad');
}