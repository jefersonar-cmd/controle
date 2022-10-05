<?php
session_start();
$id = $_SESSION['logged'][0];
$name = $_POST['user'];
$email = $_POST['email'];
$pass1 = md5($_POST['pass1']);
$pass2 = md5($_POST['pass2']);
include '../../db/conn.php'; 
if(isset($_FILES['userImg'])){
     $query = "SELECT * FROM users WHERE id_user='$id'";
     $execute = $conn->query($query);
     $verify = $execute->fetch_assoc();
     if($verify['password'] == $pass1){
          if(isset($verify['user_image'])){
               unlink('images/'.$verify['user_image']);
               $extension = strtolower(substr($_FILES['userImg']['name'], -4));
               $new_name = md5(time()) . $extension;
               $directory = 'images/';

               move_uploaded_file($_FILES['userImg']['tmp_name'], $directory.$new_name);
               $update = "UPDATE users SET user_name = '$name', email = '$email',  user_image = '$new_name' WHERE id_user = '$id'";
               $execute = $conn->query($update);
               if($execute){
                    header('Location: ../index.php?sub=perfil');
                    exit();
               }else{
                    die('Error update: '. $conn->errorno);
               }
          }else{
               $extension = strtolower(substr($_FILES['userImg']['name'], -4));
               $new_name = md5(time()) . $extension;
               $directory = 'images/';

               move_uploaded_file($_FILES['userImg']['tmp_name'], $directory.$new_name);
               $update = "UPDATE users SET user_name = '$name', email = '$email',  user_image = '$new_name' WHERE id_user = '$id'";
               $execute = $conn->query($update);
               if($execute){
                    header('Location: ../index.php?sub=perfil');
                    exit();
               }else{
                    die('Error update: '. $conn->errorno);
               }
          }
     }elseif($pass1 == $pas2){
     
     }else{
          die('Senhas se divergem');
     }
}else{
     echo 'Está vazio: ';
     die();
}

