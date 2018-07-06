<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estoque.css">
</head>

	<?php 
		session_start();
		include "header.php";
		include "conexaogeral.php";
		
		$sql = "SELECT * FROM inventario ORDER BY nome_item ASC";
		$resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro');
	?>
<body>
	<div class="slide story" id="slide-2" data-slide="2">
    	<a href="index.php" class="pr"> <img src="images/home.png" width="50px" style="padding-top: 3%;"> </a>
	    <div class="col-12 col-lg-3 col-sm-6"><a href="entrada.php" class="pr"><h4>Nova Entrada de Produtos</h4> <img src="images/s01.png" width="50px"></img></a></div>
	    <div class="col-12 col-lg-3 col-sm-6"><a href="saida.php" class="pr"><h4>Nova Saída de Produtos</h4> <img src="images/s02.jpg" width="50px"></img></a></div>
	    <div class="col-12 col-lg-3 col-sm-6"><a href="gestaoestoque.php" class="pr"><h4>Gestão de Estoque</h4> <img src="images/s04.png" width="50px"></img></a></div>
	</div>
    <div class="slide story" id="slide-6" data-slide="6">
    	<h2 class="font-thin"><span class="font-semibold"> ESTOQUE</span></h2>
		<table>
			<tr>
				<th> Código do Item: </th>
				<th> Código de Barras:</th>
				<th> Nome:</th>
				<th> Unidade:</th>
				<th> Valor Unitário:</th>
				<th> Saldo Estoque (Sistema):</th>
				<th> Valor Estoque (Sistema):</th>
				<th> Saldo Estoque (Contagem):</th>
				<th> Valor Estoque (Contagem):</th>
				<th>Acuracidade (Porcentagem):</th>
				<th>Acuracidade (Real):</th>
			</tr>
			<?php while($dados = mysqli_fetch_array($resultado)): ?>
				<tr>
					<td><?=$dados['codigo_item']?></td>
					<td><?=$dados['codigo_barras']?></td>
					<td><?=$dados['nome_item']?></td>
					<td><?=$dados['un_item']?></td>
					<td>R$ <?=$dados['valor_uni']?></td>
					<td><?=$dados['saldo_estoque_sis']?></td>
					<td>R$<?=$dados['valor_estoque_sis']?></td>
					<td><?=$dados['saldo_estoque_con']?></td>
					<td>R$<?=$dados['valor_estoque_con']. "0"?></td>
					<?php if ((($dados['saldo_estoque_con'] / $dados['saldo_estoque_sis'])*100) != 100):?>
						<td class="red"><?=(($dados['saldo_estoque_con'] / $dados['saldo_estoque_sis'])*100) . "%"?></td>
						<td class="red">R$ <?=($dados['valor_estoque_con'] - $dados['valor_estoque_sis'])?></td>
					<?php endif ?>
					<?php if ((($dados['saldo_estoque_con'] / $dados['saldo_estoque_sis'])*100) == 100):?>
						<td class="green"><?=(($dados['saldo_estoque_con'] / $dados['saldo_estoque_sis'])*100) . "%"?></td>
						<td class="green">R$ <?=($dados['valor_estoque_con'] - $dados['valor_estoque_sis'])?></td>
					<?php endif?>
				</tr>
			<?php endwhile ?>
		</table>
	</div>
</body>
</html>