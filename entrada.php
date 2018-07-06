<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="secundarias.css">
</head>
<body>
    <?php include "header.php";?> <br>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<div class="slide story" id="slide-5" data-slide="5" style="padding-top: 0px!important;">
	    <h1 class="font-semibold">Entrada de Produtos</h1>

		<form action="processaentrada.php" method="POST">
			<h3>Código de Barras <input type="text" name="codigo_barras" id="cod" onkeydown="bloquearCtrlJ();"/> </h3>
			<h3>Quantidade: <input type="number" name="quantidade"> Unidade:
			<select name="tipo">
				<option value="kg">KG</option>
				<option value="pct">PCT</option>
				<option value="un">UN</option>
				<option value="lt">LT</option>
				<option value="gf">GF</option>
				<option value="pt">PT</option>
				<option value="vd">VD</option>
				<option value="cx">CX</option>
				<option value="lt">KG</option>
				<option value="l">L</option>			
				<option value="un">UN</option>
			</select> </h3>
			<input type="submit" value="Registrar">
			
			<script type="text/javascript" src="ctrljenter.js"></script>
		</form>
	</div>
</body>
</html>