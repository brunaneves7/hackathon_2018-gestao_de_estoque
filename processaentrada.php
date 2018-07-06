<?php
session_start();
$_SESSION['entrada'] = false;
$_SESSION['saida'] = false;

$_SESSION['flash'] = false;
$host = "localhost";
$usuario = "id3284797_br";
$senha = "admin";
$dbname = "id3284797_hackathon";
$strcon = mysqli_connect("$host","$usuario","$senha","$dbname") or die('Erro ao conectar ao banco!');

$codigo = $_POST['codigo_barras'];;
$quant = $_POST['quantidade'];
$tipo = $_POST['tipo'];

$sql = "SELECT * FROM inventario WHERE codigo_barras = $codigo";
$resultado = mysqli_query($strcon, $sql) or die('Erro ao tentar cadastrar registro 1');
$name = mysqli_query($strcon, "SELECT codigo_item, nome_item valor_uni, saldo_estoque_sis, valor_estoque_sis FROM inventario WHERE codigo_barras  = $codigo") or die(mysqli_error($strcon));
        while($dados = mysqli_fetch_array($resultado)){

				if (($dados['codigo_item'] == 124 || $dados['codigo_item'] == 479) && $tipo == 'pct'){
					$quant = $quant / 2;
				}
        		$valorfinal = $dados['valor_uni'] * $quant;
        		$saldosisanterior = $dados['saldo_estoque_sis'];
        		$valorsisanterior = $dados['valor_estoque_sis'];

        		$saldosisatual = $saldosisanterior + $quant;
        		$valorsisatual = $valorsisanterior + $valorfinal;
        		$update = "UPDATE inventario SET saldo_estoque_sis = $saldosisatual,  valor_estoque_sis = $valorsisatual WHERE codigo_barras  = $codigo";
				$resultado = mysqli_query($strcon, $update) or die('Erro ao tentar cadastrar registro3');
				$_SESSION['entrada']= true;
				$_SESSION['codigo']= $dados['codigo_item'];
				$_SESSION['nome']= $dados['nome_item'];
				$_SESSION['saldosisanterior'] = $saldosisanterior;
				$_SESSION['saldosisatual'] = $saldosisatual;
				$_SESSION['valorsisanterior'] = $valorsisanterior;
				$_SESSION['valorsisanterior'] = $valorsisatual;
        }

        mysqli_close($strcon);
        header('location:estoque.php');
        ?>