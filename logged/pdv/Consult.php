<?php

require_once 'vendor/autoload.php';

$cosulta = new \App\Model\ProdutoDao();
$produto = new \App\Model\Produto();
if($_POST['pesq'] == ''):
     var_dump($cosulta->ReadDefault());
else:
     $produto->setName($_POST['pesq']);
     print_r($cosulta->ReadValue($produto));
endif;     