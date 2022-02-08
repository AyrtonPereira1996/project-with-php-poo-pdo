<?php

require __DIR__.'/vendor/autoload.php';


use \App\Entity\Vaga;


if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

// CONSULTAR VAGA
$obVaga = Vaga::getVaga($_GET['id']);


// // VALIDACAO DA VAGA
if (!$obVaga instanceof Vaga) {
     header('location: index.php?status=error');
     exit;
}




// VALIDACAO DE POST
if (isset($_POST['excluir'])) {

     $obVaga -> excluir();

     header('location: index.php?status=success');
      exit; //IMPEDE QUE O RESTANTE DA PÁGINA SEJA EXECUTADO

    
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmarExclusao.php';
include __DIR__.'/includes/footer.php';
