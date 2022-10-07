<?php
include '../../db/conn.php'; 
session_start();
$id = $_SESSION['logged'][0];
$name = $_POST['user'];
$email = $_POST['email'];
$pass1 = md5($_POST['pass1']);
$pass2 = md5($_POST['pass2']);
$query = "SELECT * FROM users WHERE id_user='$id'";
$execute = $conn->query($query);
$verify = $execute->fetch_assoc();
if ($_FILES['userImg']['name'] != ''){
     $extension = strtolower(substr($_FILES['userImg']['name'], -4));
     $new_name = md5(time()) . $extension;
     $directory = 'images/';
     if($verify['password'] == $pass1){
          if($verify['user_image'] != $new_name){
               unlink('images/'.$verify['user_image']);

               move_uploaded_file($_FILES['userImg']['tmp_name'], $directory.$new_name);
               $update = "UPDATE users SET user_name = '$name', email = '$email',  user_image = '$new_name' WHERE id_user = '$id'";
               $execute = $conn->query($update);
               if($execute){
                    header('Location: ../index.php?sub=perfil');
                    exit();
               }else{
                    die('Error update: '. $conn->errno);
               }
          }else{

               move_uploaded_file($_FILES['userImg']['tmp_name'], $directory.$new_name);
               $update = "UPDATE users SET user_name = '$name', email = '$email',  user_image = '$new_name' WHERE id_user = '$id'";
               $execute = $conn->query($update);
               if($execute){
                    header('Location: ../index.php?sub=perfil');
                    exit();
               }else{
                    die('Error update: '. $conn->errno);
               }
          }
     }
}
if($pass1 == $pass2) {
     $query = "UPDATE users SET user_name = '$name', email = '$email', password = '$pass2' WHERE id_user = '$id'";
     $execute = $conn->query($query);
     if(!$execute){
          die('Error update: '. $conn->errno);
     }else{
          header('Location: ../index.php?sub=perfil');
          exit();
     }
}
if ($name != $verify['user_name'] or $email != $verify['user_email']) {
     $query = "UPDATE users SET user_name = '$name', email = '$email' WHERE id_user = '$id'";
     $execute = $conn->query($query);
     if(!$execute){
          die('Error update: '. $conn->errno);
     }else{
          header('Location: ../index.php?sub=perfil');
          exit();
     }
}