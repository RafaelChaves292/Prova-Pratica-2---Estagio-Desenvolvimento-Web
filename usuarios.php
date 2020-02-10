<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
require 'conexao.php';

// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):

	$conexao = conexao::getInstance();
	$sql = 'SELECT * FROM tab_usuario';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$tab_usuario = $stm->fetchAll(PDO::FETCH_OBJ);

else:

	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT * FROM tab_usuario WHERE nome LIKE :nome OR login LIKE :login';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', $termo.'%');
	$stm->bindValue(':login', $termo.'%');
	$stm->execute();
	$usuarios = $stm->fetchAll(PDO::FETCH_OBJ);

endif;

//Total de registros
$conn = new PDO("mysql:host=localhost;dbname=vipgol_etapa2;", "vipgol_etapa2", "994118baskara");

$res_totalReg = $conn->prepare("SELECT COUNT(id) AS totalReg FROM tab_usuario");
$res_totalReg->execute();
$total = $res_totalReg->fetch(PDO::FETCH_OBJ);
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
    
	<title>Tela 2 - Usuários</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>

			<!-- Cabeçalho da Listagem -->
			<legend><h1>Tela 2 - Usuários</h1></legend>

			<!-- Formulário de Pesquisa -->
			<form action="" method="get" id='form-contato' class="form-horizontal col-md-10">
				
			    
			    <a href='dashboard.php' class="btn btn-primary">Tela 1 - Dashboard</a>
			    <a href='index.php' class="btn btn-primary">Tela 2 - Clientes</a>
			    
			    
			</form>

			<!-- Link para página de cadastro -->
			<a href='cadastro_usuario.php' class="btn btn-success pull-right">Cadastrar Usuário</a>
			<div class='clearfix'></div>

			<?php if(!empty($tab_usuario)):?>

				<!-- Tabela de Usuários -->
				<table class="table table-striped">
					<tr class='active'>
				     	<th>ID</th> 
						<th>Nome</th>
						<th>Login</th>
					<!--<th>Status</th> -->
						<th>Ação</th>
					</tr>
					<?php foreach($tab_usuario as $usuario):?>
						<tr>
				            <td><?=$usuario->id?></td> 
							<td><?=$usuario->nome?></td>
							<td><?=$usuario->login?></td>
							
				     <!-- 	<td><?=$usuario->status?></td>  -->
							<td>
								<a href='editar_usuario.php?id=<?=$usuario->id?>' class="btn btn-primary">Editar</a>
								<a href='javascript:void(1)' class="btn btn-danger link_exclusao" rel="<?=$usuario->id?>">Excluir</a>
							</td>
						</tr>	
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<!-- Mensagem caso não exista clientes ou não encontrado  -->
				<h3 class="text-center text-primary">Não existem usuários cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>