<?php

try {
	include 'conexao.php';

	$cliente = addslashes($_POST['cliente']);
	$vendedor = addslashes($_POST['vendedor']);
	$telefone = addslashes($_POST['telefone']);
	$descricao = addslashes($_POST['descricao']);
	$valor = addslashes($_POST['valororcamento']);
	$datahora = date('y-m-d H:i:s');

	$sql = "INSERT INTO `oficina`( `cliente`, `vendedor`, `telefone`, `datahora`, `descricao`, `valor`) VALUES ('$cliente','$vendedor',$telefone,'$datahora','$descricao',$valor)";

	$inserir = mysqli_query ($conexao,$sql);

} catch (PDOException $e) {
	echo "Falhou: " . $e->getMessage();
}
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="conteiner" align="center" style="margin-top: 40px">
<style type="text/css">
	body
	{
		background-color: green;
	}
</style>
	<div>
		<h1 style="text-align: center;">Cadastrdo Com Sucesso</h1>
		<a href="index.php">Voltar Para Inico</a>
	</div>
</div>