<?php

use CrudPoo\Fabricante;

require_once "../vendor/autoload.php";

$fabricante = new Fabricante;
$fabricante->setId($_GET['id']);
$fabricante->excluirFabricante();
    //metodo get, o parametro id(pois é dinamico), e o tratamento filter

header("location:listar.php");
?>

