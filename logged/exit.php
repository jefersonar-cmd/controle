<?php
session_start();
unset($_SESSION['logged']);
session_destroy();
$msg = 'Obrigado por usar nosso sistemaˆ-ˆ';
header('Location: ../index.php?msg='.$msg);
exit();