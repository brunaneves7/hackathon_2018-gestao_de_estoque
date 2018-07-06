<?php session_start();
if (!isset($_SESSION['first'])){
    $_SESSION['first'] = false;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="text-align:center">
    <?php include "header.php";?><br>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <h1>Gestão de Estoque</h1>
	<form action="processagestao.php" method="POST">
		<h3>Código de Barras <input type="text" name="codigo_barras" onkeydown="bloquearCtrlJ();" autofocus/> </h3>
		<input type="submit" hidden = "hidden" value="Registrar">
		<script>
          function bloquearCtrlJ(){
            var tecla=window.event.keyCode;   //Para controle da tecla pressionada
            var ctrl=window.event.ctrlKey;    //Para controle da Tecla CTRL
                if (ctrl && tecla==74){    //Evita teclar ctrl + j
                    event.keyCode=0;
                    event.returnValue=false;
                }
          }
	</script>
	</form>
	<?php  if ($_SESSION['first']): ?>
	<div>
	    <?php foreach ($_SESSION['gestao'] as $gestao):?>
	    <h4><?=$gestao[0];?> Quantidade: <?=$gestao[2];?></h4>
	</div>
	<?php endforeach; ?>
	<?php endif;?>
	
	<form action="processagestaofinal.php">
	    <input type="submit" value="Enviar Contagem">
	</form>
</body>
</html>