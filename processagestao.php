<?php
session_start();
    $_SESSION['first'] = true;
    $codigobarras = $_POST['codigo_barras'];
    if (!isset($_SESSION['gestao'])){
        $_SESSION['gestao'] = [];
    }
    
    
    include "conexaogeral.php";
    $sql = "SELECT codigo_item, nome_item FROM inventario WHERE codigo_barras = $codigobarras";
    $resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
    $name = mysqli_query($strcon, "SELECT codigo_item, nome_item FROM inventario WHERE codigo_barras  = $codigobarras") or die(mysqli_error($strcon));
    $dados = mysqli_fetch_array($resultado);
    $gestao = [$dados['codigo_item'] . " - " . $dados['nome_item'], $codigobarras, 1];
    $gestaocomeco = [$dados['codigo_item'] . " - " . $dados['nome_item'], $codigobarras];
    $encontrou = false;
    for ($i = 0; $i < sizeof ($_SESSION['gestao']); $i++){
        if ($_SESSION['gestao'][$i][0] == $gestaocomeco[0]){
           $_SESSION['gestao'][$i][2]++;
           $encontrou = true;
        }
    }
    
    if (!$encontrou) {
        array_push($_SESSION['gestao'], $gestao);
    }
    header('location:gestaoestoque.php');
?>