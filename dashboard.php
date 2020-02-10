<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

//Total de registros
$conn = new PDO("mysql:host=localhost;dbname=vipgol_etapa2;", "vipgol_etapa2", "994118baskara");

$res_totalReg = $conn->prepare("SELECT COUNT(id) AS totalReg FROM tab_cliente");
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
    
	<title>Tela 1 - Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>

			<!-- Cabeçalho da Listagem -->
			<legend><h1>Tela 1 - Dashboard</h1></legend>

			<!-- Formulário de Pesquisa -->
			

			<!-- Link para página de cadastro -->
				<a href='index.php' class="btn btn-primary">Tela 2 - Clientes</a>
			    <a href='usuarios.php' class="btn btn-primary">Tela 2 - Usuários</a>
			    <div class='clearfix'></div>

				<!-- Mensagem caso não exista clientes ou não encontrado  -->
				<h3 class="text-center text-primary">Número total de clientes cadastrados = <?php echo $total_de_registros = $total->totalReg; ?></h3>
		
		      <!-- Mensagem caso não exista usuarios ou não encontrado  -->
				<h3 class="text-center text-primary">Número total de usuários cadastrados = <?php echo $total_de_registros = $total->totalReg; ?></h3>
		
		
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>