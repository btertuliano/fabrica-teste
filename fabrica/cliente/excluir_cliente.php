<?php
include("../conexao/conexao.php");

if($_GET['id']){
	$query = "DELETE FROM cliente WHERE id = ".$_GET['id'];

	if ($conn->query($query) === TRUE) {
		echo "<script>alert(\"Cliente excluído com sucesso\");window.location.href='../index.php';</script>";
	} else {
		echo "<script>alert(\"Erro ao excluir cliente ".$conn->error." \");window.location.href='../index.php';</script>";
	}
}
?>