<?php
include 'conexao.php';

$ID = filter_input(INPUT_GET,"id");

if ($conexao) 
	{
	$query = mysqli_query($conexao, "DELETE FROM `oficina` WHERE ID = $ID");
		if ($query) {
			header('Location: index.php');
			}else{
				die("ERRO: ".mysqli_error($conexao));
				}
	}else {
	die("ERRO1: ".mysqli_error($conexao));
		}
?>