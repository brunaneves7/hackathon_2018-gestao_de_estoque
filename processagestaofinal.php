<?php
session_start();
include "conexaogeral.php";
 $sql = "SELECT codigo_item, valor_uni, saldo_estoque_con, valor_estoque_con FROM inventario";
 $resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro 1');
while($dados = mysqli_fetch_array($resultado)){
    for($i = 0 ; $i <= sizeof ($_SESSION['gestao']); $i++){
            $ex = explode ("-", $_SESSION['gestao'][$i][0]);
            if (trim($ex[0]) == $dados[0]){
                $exe = trim($ex[0]);
                $saldo= $_SESSION['gestao'][$i][2];
                $valorfinal = $dados[1] * $saldo;
                $update = "UPDATE inventario SET saldo_estoque_con = $saldo,  valor_estoque_con = $valorfinal WHERE codigo_item  = $exe";
    		      $resultado = mysqli_query($strcon, $update) or die('Erro ao tentar cadastrar registro3');
            }
    }
}
        unset($_SESSION['gestao']);
        mysqli_close($strcon);
        header('location:estoque.php');
        ?>

