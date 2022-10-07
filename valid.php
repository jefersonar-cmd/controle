<?php
session_start();
require 'db/conn.php';

if(isset($_POST['email']) and isset($_POST['pass'])){
    $login = $_POST['email'];
    $pass = md5($_POST['pass']);

    $query = $conn->query("SELECT * FROM users WHERE email='$login' and password='$pass'");
    if($query->num_rows > 0){
        while($obj = $query->fetch_object()){
            if($obj->acess != 9){
                $_SESSION['logged'] = [$obj->id_user,$obj->user_name, $obj->acess];
                $query->close();
    
                header('Location: logged/');
                exit();
            }else{
                $msg = $obj->user_name . ' bloqueado.<br>Por favor, contactar administração.';
                header('Location: index.php?msg='.$msg);
            }
        }
    }else{
        $mensagem = $login . ' Não encontrado';
        header('Location: index.php?msg='.$mensagem);
        exit();
    }
}else{
    $mensagem = 'Algum campo maldito ficou vazio!';
    header('Location: index.php?msg='.$mensagem);
    exit();
}