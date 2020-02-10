<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
require 'conexao.php';

// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):

	$conexao = conexao::getInstance();
	$sql = 'SELECT * FROM tab_cliente';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$tab_cliente = $stm->fetchAll(PDO::FETCH_OBJ);

else:

	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT * FROM tab_cliente WHERE nome LIKE :nome OR email LIKE :email';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', $termo.'%');
	$stm->bindValue(':email', $termo.'%');
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

endif;
?>

<?php
session_start();
include('verifica_login.php');
?>

<h2>Olá, <?php echo $_SESSION['usuario'];?></h2>
<h2><a href="logout.php">Sair</a></h2>


<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
	<title>Tela 2 - Clientes</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>

			<!-- Cabeçalho da Listagem -->
			<legend><h1>Tela 2 - Clientes</h1></legend>

			<!-- Formulário de Pesquisa -->
			<form action="" method="get" id='form-contato' class="form-horizontal col-md-10">
				
			    
			    <a href='dashboard.php' class="btn btn-primary">Tela 1 - Dashboard</a>
			    <a href='usuarios.php' class="btn btn-primary">Tela 2 - Usuários</a>
			    
			</form>

			<!-- Link para página de cadastro -->
			<a href='cadastro.php' class="btn btn-success pull-right">Cadastrar Cliente</a>
			<div class='clearfix'></div>

			<?php if(!empty($tab_cliente)):?>

				<!-- Tabela de Clientes -->
				<table class="table table-striped">
					<tr class='active'>
				     	<th>ID</th> 
						<th>Nome</th>
						<th>Cidade</th>
						<th>UF</th>
				     	<th>E-mail</th> 
				   <!--<th>Status</th> -->
						<th>Ação</th>
					</tr>
					<?php foreach($tab_cliente as $cliente):?>
						<tr>
				            <td><?=$cliente->id?></td> 
							<td><?=$cliente->nome?></td>
							<td><?=$cliente->cidade?></td>
							<td><?=$cliente->uf?></td>
				 		    <th><?=$cliente->email?></th>
				<!-- 		<td><?=$cliente->status?></td>  -->
							<td>
								<a href='editar.php?id=<?=$cliente->id?>' class="btn btn-primary">Editar</a>
								<a href='javascript:void(0)' class="btn btn-danger link_exclusao" rel="<?=$cliente->id?>">Excluir</a>
							</td>
						</tr>	
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<!-- Mensagem caso não exista clientes ou não encontrado  -->
				<h3 class="text-center text-primary">Não existem clientes cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>