<?php
$id = $_GET['id'];
include '../../db/conn.php';
$delete = $conn->query("DELETE FROM produtos WHERE id_prod = '$id'");
if ($delete) {
    header('Location: ../index.php?sub=prod');
    exit();
}else{
    printf("Error deleting: " . $delete->errno);
}