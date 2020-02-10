<?php
require 'conexao.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);
// Recebe o id do usuario do usuario via GET
$id_usuario = (isset($_GET['id'])) ? $_GET['id'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($id_usuario) && is_numeric($id_usuario)):

	// Captura os dados do cliente solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT * FROM tab_usuario WHERE id = :id';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id', $id_usuario);
	$stm->execute();
	$usuario = $stm->fetch(PDO::FETCH_OBJ);

	if(!empty($usuario)):

		// Formata a data no formato nacional
//		$array_data     = explode('-', $cliente->data_nascimento);
//		$data_formatada = $array_data[2] . '/' . $array_data[1] . '/' . $array_data[0];

	endif;

endif;

?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
	<title>Edição de Usuário</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Edição de Usuário</h1></legend>
			
			<?php if(empty($usuario)):?>
				<h3 class="text-center text-danger">Usuário não encontrado!</h3>
			<?php else: ?>
				<form action="action_usuario.php" method="post" id='form-contato' enctype='multipart/form-data'>


				    <div class="form-group">
				      <label for="nome">Nome</label>
				      <input type="text" class="form-control" id="nome" name="nome" value="<?=$usuario->nome?>" placeholder="Infome o Nome">
				      <span class='msg-erro msg-nome'></span>
				    </div>

				    <div class="form-group">
				      <label for="login">Login</label>
				      <input type="login" class="form-control" id="login" name="login" value="<?=$usuario->login?>" placeholder="Informe o Login">
				      <span class='msg-erro msg-email'></span>
				    </div>
				    
				    <div class="form-group">
				      <label for="senha">Senha</label>
				      <input type="password" class="form-control" id="senha" name="senha" value="<?=$usuario->senha?>" placeholder="Informe a Senha">
				      <span class='msg-erro msg-senha'></span>
				    </div>
				    
				    <input type="hidden" name="acao" value="editar">
				    <input type="hidden" name="id" value="<?=$usuario->id?>">
				   <!-- <input type="hidden" name="foto_atual" value="<?=$usuario->foto?>" -->
				    <button type="submit" class="btn btn-primary" id='botao'> 
				      Gravar
				    </button>
				    <a href='usuarios.php' class="btn btn-danger">Cancelar</a>
				</form>
			<?php endif; ?>
		</fieldset>

	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>