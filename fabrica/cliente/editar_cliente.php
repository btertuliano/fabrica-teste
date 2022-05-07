<?php
$query = "UPDATE cliente SET
			nome = '".$_POST['nome']."',
			telefone = '".$_POST['telefone']."',
			data_nascimento = '".implode("-",array_reverse(explode("/",$_POST['nascimento'])))."',
			cep = '".$_POST['cep']."',
			logradouro = '".$_POST['logradouro']."',
			numero = '".$_POST['numero']."',
			bairro = '".$_POST['bairro']."',
			cidade = '".$_POST['cidade']."',
			uf = '".$_POST['uf']."',
			complemento = '".$_POST['complemento']."'
		 WHERE id = ".$_POST['id'];

if($conn->query($query)){
	echo "<script>alert(\"Cliente alterado com sucesso\");window.location.href='index.php';</script>";
}
?>
<div class="modal" id="editarCliente">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Editar Cliente</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form class="row g-3 was-validated" action="index.php" method="POST">
					<div class="col-md-12 position-relative">
						<label for="id" class="form-label">ID</label>
						<input type="text" class="form-control" id="id" name="id" readonly>
					</div>
					<div class="col-md-12 position-relative">
						<label for="nome" class="form-label">Nome</label>
						<input type="text" class="form-control" id="nome" name="nome" required>
						<div class="invalid-feedback">Nome obrigatório</div>
					</div>
					<div class="col-md-12 position-relative">
						<label for="email" class="form-label">E-mail</label>
						<input type="text" class="form-control" id="email" name="email" readonly>
						<div class="invalid-feedback">E-mail obrigatório</div>
					</div>
					<div class="col-md-6 position-relative">
						<label for="telefone" class="form-label">Telefone</label>
						<input type="text" class="form-control" id="telefone" name="telefone" required>
						<div id="msgErro" class="invalid-feedback">Telefone obrigatório</div>
					</div>
					<div class="col-md-6 position-relative">
						<label for="nascimento" class="form-label">Data de nascimento</label>
						<input type="text" class="form-control" id="nascimento" name="nascimento" required>
						<div class="invalid-feedback">Data de nascimento obrigatório</div>
					</div>
					<div class="col-md-6 position-relative">
						<label for="cep" class="form-label">CEP</label>
						<input type="text" class="form-control" id="cep" name="cep" required>
						<div class="invalid-feedback">CEP obrigatório</div>
					</div>
					<div class="col-md-6 position-relative">
						<label for="logradouro" class="form-label">Logradouro</label>
						<input type="text" class="form-control" id="logradouro" name="logradouro" required>
						<div class="invalid-feedback">Logradouro obrigatório</div>
					</div>
					<div class="col-md-6 position-relative">
						<label for="numero" class="form-label">Número</label>
						<input type="text" class="form-control" id="numero" name="numero" required>
						<div class="invalid-feedback">Número obrigatório</div>
					</div>
					<div class="col-md-6 position-relative">
						<label for="bairro" class="form-label">Bairro</label>
						<input type="text" class="form-control" id="bairro" name="bairro" required>
						<div class="invalid-feedback">Bairro obrigatório</div>
					</div>
					<div class="col-md-4 position-relative">
						<label for="cidade" class="form-label">Cidade</label>
						<input type="text" class="form-control" id="cidade" name="cidade" required>
						<div class="invalid-feedback">Cidade obrigatório</div>
					</div>
					<div class="col-md-4 position-relative">
						<label for="uf" class="form-label">UF</label>
						<input type="text" class="form-control" id="uf" name="uf" required>
						<div class="invalid-feedback">UF obrigatório</div>
					</div>
					<div class="col-md-4 position-relative">
						<label for="complemento" class="form-label">Complemento</label>
						<input type="text" class="form-control" id="complemento" name="complemento" required>
						<div class="invalid-feedback">Complemento obrigatório</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Salvar</button>
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>