<?php
require 'conexao.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);
// Recebe o id do cliente do cliente via GET
$id_cliente = (isset($_GET['id'])) ? $_GET['id'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($id_cliente) && is_numeric($id_cliente)):

	// Captura os dados do cliente solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT * FROM tab_cliente WHERE id = :id';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id', $id_cliente);
	$stm->execute();
	$cliente = $stm->fetch(PDO::FETCH_OBJ);

	if(!empty($cliente)):

		// Formata a data no formato nacional
//		$array_data     = explode('-', $cliente->data_nascimento);
//		$data_formatada = $array_data[2] . '/' . $array_data[1] . '/' . $array_data[0];

	endif;

endif;

?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
	<title>Edição de Cliente</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Edição de Cliente</h1></legend>
			
			<?php if(empty($cliente)):?>
				<h3 class="text-center text-danger">Cliente não encontrado!</h3>
			<?php else: ?>
				<form action="action_cliente.php" method="post" id='form-contato' enctype='multipart/form-data'>


				    <div class="form-group">
				      <label for="nome">Nome</label>
				      <input type="text" class="form-control" id="nome" name="nome" value="<?=$cliente->nome?>" placeholder="Infome o Nome">
				      <span class='msg-erro msg-nome'></span>
				    </div>

				    <div class="form-group">
				      <label for="email">Email</label>
				      <input type="email" class="form-control" id="email" name="email" value="<?=$cliente->email?>" placeholder="Informe o Email">
				      <span class='msg-erro msg-email'></span>
				    </div>
				    
				    <div class="form-group">
				      <label for="cpf">CPF</label>
				      <input type="cpf" class="form-control" id="cpf" name="cpf" value="<?=$cliente->cpf?>" placeholder="Informe o CPF">
				      <span class='msg-erro msg-cpf'></span>
				    </div>
				    
				    <div class="form-group">
				      <label for="cep">CEP</label>
				      <input type="text" class="form-control" id="cep" name="cep" value="<?=$cliente->cep?>" placeholder="Informe o CEP">
				      <span class='msg-erro msg-cep'></span>
				    </div>
				    
				    <div class="form-group">
				      <label for="endereco">Endereço</label>
				      <input type="text" class="form-control" id="endereco" name="endereco" value="<?=$cliente->endereco?>" placeholder="Informe o Endereço">
				      <span class='msg-erro msg-endereco'></span>
				    </div>

				    <div class="form-group">
				      <label for="numero">Número</label>
				      <input type="text" class="form-control" id="numero" name="numero" value="<?=$cliente->numero?>" placeholder="Informe o Número">
				      <span class='msg-erro msg-nome'></span>
				    </div>
				    
				    <div class="form-group">
				      <label for="bairro">Bairro</label>
				      <input type="text" class="form-control" id="bairro" name="bairro" value="<?=$cliente->bairro?>" placeholder="Informe o Bairro">
				      <span class='msg-erro msg-name'></span>
				    </div>
				   
				    <div class="form-group">
				      <label for="cidade">Cidade</label>
				      <input type="text" class="form-control" id="cidade" name="cidade" value="<?=$cliente->cidade?>" placeholder="Informe a Cidade">
				      <span class='msg-erro msg-cidade'></span>
				    </div>
				    
				    <div class="form-group">
				      <label for="estado">Estado</label>
				      <input type="text" class="form-control" id="estado" name="estado" value="<?=$cliente->estado?>" placeholder="Informe o Estado">
				      <span class='msg-erro msg-estado'></span>
				    </div>
				    
				    <div class="form-group">
				      <label for="uf">UF</label>
				      <input type="text" class="form-control" id="uf" name="uf" value="<?=$cliente->uf?>" placeholder="Informe o UF">
				      <span class='msg-erro msg-uf'></span>
				    </div>
				    
				    <div class="form-group">
				      <label for="telefone">Telefone</label>
				      <input type="telefone" class="form-control" id="telefone" maxlength="12" name="telefone" value="<?=$cliente->telefone?>" placeholder="Informe o Telefone">
				      <span class='msg-erro msg-telefone'></span>
				    </div>
				    
				    <div class="form-group">
				      <label for="site">Site</label>
				      <input type="site" class="form-control" id="site" maxlength="30" name="site" value="<?=$cliente->site?>" placeholder="Informe o Site">
				      <span class='msg-erro msg-site'></span>
				    </div>
				    
				    <input type="hidden" name="acao" value="editar">
				    <input type="hidden" name="id" value="<?=$cliente->id?>">
				   <!-- <input type="hidden" name="foto_atual" value="<?=$cliente->foto?>" -->
				    <button type="submit" class="btn btn-primary" id='botao'> 
				      Gravar
				    </button>
				    <a href='index.php' class="btn btn-danger">Cancelar</a>
				</form>
			<?php endif; ?>
		</fieldset>

	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>