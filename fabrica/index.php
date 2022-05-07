<html>
<head>
	<title>Fabrica - Teste de desenvolvimento</title>
	
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/dist/css/bootstrap.min.css" />
	<script type="text/javascript" src="lib/bootstrap/dist/js/bootstrap.bundle.js"></script>
	<script type="text/javascript" src="lib/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="lib/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="lib/jquery-validation/dist/jquery.validate.min.js"></script>
	<script type="text/javascript" src="assets/js/funcao.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
</head>

<?php
setlocale(LC_ALL,'pt_BR.UTF8');
mb_internal_encoding('UTF8'); 
mb_regex_encoding('UTF8');

include("./conexao/conexao.php");
include("assets/funcoes.php");

$sql = "SELECT * FROM cliente";
$result = $conn->query($sql);
?>
<body>
	<div class="container">
		<div class="row flex-lg-nowrap">
			<div class="col">
				<div class="e-tabs mb-3 px-3">
					<h1>Listar clientes</h1>
				</div>
				<br>
				<div class="align-center">
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cadastrarCliente">Cadastrar cliente</button>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Nome</th>
							<th>Telefone</th>
							<th>E-mail</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
					<?php while($row = $result->fetch_assoc()) { ?> 
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['nome']; ?></td>
							<td><?php echo $row['telefone']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td>
								<button type="button" class="fa fa-lg fa-edit btn btn-info btn-xs waves-effect" data-bs-toggle="modal" data-bs-target="#editarCliente" data-id="<?php echo $row['id']; ?>" data-nome="<?php echo $row['nome']; ?>" data-telefone="<?php echo $row['telefone']; ?>" data-email="<?php echo $row['email']; ?>" data-nascimento="<?php echo $row['data_nascimento']; ?>" data-cep="<?php echo $row['cep']; ?>" data-logradouro="<?php echo $row['logradouro']; ?>" data-numero="<?php echo $row['numero']; ?>" data-bairro="<?php echo $row['bairro']; ?>" data-cidade="<?php echo $row['cidade']; ?>" data-uf="<?php echo $row['uf']; ?>" data-complemento="<?php echo $row['complemento']; ?>"></button>
								<a href="#" onclick="if (confirm('Tem a certeza que deseja excluir este Cliente?')) window.location='cliente/excluir_cliente.php?id=<?php echo $row['id']; ?>';return false" class="btn btn-danger btn-xs waves-effect">
									<i class="fa fa-lg fa-trash"></i><!--delete-->
								</a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div>

	<?php include("cliente/cadastrar_cliente.php"); ?>
	<?php include("cliente/editar_cliente.php"); ?>

</body>
</html>