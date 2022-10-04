<?php
//session_start();
include '../../db/conn.php';
if($_POST['user'] and $_POST['email'] and $_POST['acess']){
    $login = $_POST['user'];
    $email = $_POST['email'];
    $acess = $_POST['acess'];
    $id = $_POST['id'];
    if(isset($_POST['pass'])){
        $pass = md5($_POST['pass']);
        $update = $conn->query("UPDATE users SET user_name='$login', password='$pass', email='$email', acess='$acess' WHERE id_user='$id'");
        if($update){
            //$_SESSION['msg'] = "<script type='text/javascript'>window.alert('Dados do usuário '".$login."' atualizados com sucesso!')</script>";
            header('Location: ../index.php?sub=cad');
        }else{
            //$_SESSION['msg'] = "<script type='text/javascript'>window.alert('Erro ao atualizar dados do usuário!')</script>";
            header('Location: ../index.php?sub=cad');
        }
    }else{
        $update = $conn->query("UPDATE users SET user_name='$login', email='$email', acess='$acess' WHERE id_user='$id'");
        if($update){
            //$_SESSION['msg'] = "<script type='text/javascript'>window.alert('Dados do usuário '".$login."' atualizados com sucesso!')</script>";
            header('Location: ../index.php?sub=cad');
        }else{
            //$_SESSION['msg'] = "<script type='text/javascript'>window.alert('Erro ao atualizar dados do usuário!')</script>";
            header('Location: ../index.php?sub=cad');
        }
    }
}   