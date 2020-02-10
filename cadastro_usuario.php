<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
	<title>Cadastro de Usuários</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<!--Importando Script Jquery-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
	
	
	<div class='container'>
		<fieldset>
			
			
			<legend><h1>Formulário - Cadastro de Usuários</h1></legend>
			
			<form action="action_usuario.php" method="post" id='form-contato' enctype='multipart/form-data'>


			    <div class="form-group">
			      <label for="nome">Nome</label>
			      <input type="text" class="form-control" id="nome" name="nome" placeholder="Infome o Nome">
			      <span class='msg-erro msg-nome'></span>
			    </div>
			     
			     <div class="form-group">
			      <label for="login">Login</label>
			      <input type="login" class="form-control" id="login" name="login" placeholder="Informe o Login">
			      <span class='msg-erro msg-email'></span>
			    </div>
			     
			     
			    <div class="form-group">
			      <label for="senha">Senha</label>
			      <input type="password" class="form-control" id="senha" name="senha" placeholder="Infome a Senha">
			      <span class='msg-erro msg-senha'></span>
			    </div>
			    
			    <input type="hidden" name="acao" value="incluir">
			    <button type="submit" class="btn btn-primary" id='botao'> 
			      Gravar
			    </button>
			    <a href='/usuarios.php' class="btn btn-danger">Cancelar</a>
			</form>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/jquery.mask.min.js"/></script>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>