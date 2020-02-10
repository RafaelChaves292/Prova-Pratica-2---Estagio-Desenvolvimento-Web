<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
	<title>Sistema de Cadastro</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container box-mensagem-crud'>
		<?php 
		require 'conexao.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);

		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();

		// Recebe os dados enviados pela submissão
        $id    = (isset($_POST['id'])) ? $_POST['id'] : '';
        $acao  = (isset($_POST['acao'])) ? $_POST['acao'] : '';
		$nome  = (isset($_POST['nome'])) ? $_POST['nome'] : '';
		$endereco  = (isset($_POST['endereco'])) ? $_POST['endereco'] : '';
		$numero  = (isset($_POST['numero'])) ? $_POST['numero'] : '';
		$bairro  = (isset($_POST['bairro'])) ? $_POST['bairro'] : '';
		$cidade  = (isset($_POST['cidade'])) ? $_POST['cidade'] : '';
		$estado  = (isset($_POST['estado'])) ? $_POST['estado'] : '';
		$uf  = (isset($_POST['uf'])) ? $_POST['uf'] : '';
		$cep  = (isset($_POST['cep'])) ? $_POST['cep'] : '';
		$email = (isset($_POST['email'])) ? $_POST['email'] : '';
		$cpf   = (isset($_POST['cpf'])) ? str_replace(array('.','-'), '', $_POST['cpf']): '';
        $telefone  = (isset($_POST['telefone'])) ? str_replace(array('-', ' '), '', $_POST['telefone']) : '';
        $site  = (isset($_POST['site'])) ? str_replace(array('-', ' '), '', $_POST['site']) : '';
		
		// Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $id == ''):
		    $mensagem .= '<li>ID do registros desconhecido.</li>';
	    endif;

	    // Se for ação diferente de excluir valida os dados obrigatórios
	    if ($acao != 'excluir'):
			if ($nome == '' || strlen($nome) < 3):
				$mensagem .= '<li>Favor preencher o Nome.</li>';
		    endif;
			if ($endereco == '' || strlen($endereco) < 3):
				$mensagem .= '<li>Favor preencher o Endereço.</li>';
		    endif;
			
			if ($numero == '' || strlen($numero) < 3):
				$mensagem .= '<li>Favor preencher o Número.</li>';
		    endif;
			
			if ($bairro == '' || strlen($bairro) < 3):
				$mensagem .= '<li>Favor preencher o Bairro.</li>';
		    endif;
			
			if ($cidade == '' || strlen($cidade) < 3):
				$mensagem .= '<li>Favor preencher a Cidade.</li>';
		    endif;
			
			if ($estado == '' || strlen($estado) < 3):
				$mensagem .= '<li>Favor preencher o Estado.</li>';
		    endif;
			
			if ($uf == '' || strlen($uf) < 3):
				$mensagem .= '<li>Favor preencher o UF.</li>';
		    endif;
			
			if ($cep == '' || strlen($cep) < 3):
				$mensagem .= '<li>Favor preencher o CEP.</li>';
		    endif;
			
			if ($cpf == ''):
			   $mensagem .= '<li>Favor preencher o CPF.</li>';
		    elseif(strlen($cpf) < 11):
				  $mensagem .= '<li>Formato do CPF inválido.</li>';
		    endif;

			if ($telefone == ''): 
				$mensagem .= '<li>Favor preencher o Telefone.</li>';
			elseif(strlen($telefone) < 10):
				  $mensagem .= '<li>Formato do Telefone inválido.</li>';
		    endif;
			
			if ($site == ''): 
				$mensagem .= '<li>Favor preencher o Site.</li>';
			elseif(strlen($site) < 10):
				  $mensagem .= '<li>Formato do Site inválido.</li>';
		    endif;
			
			if ($email == ''):
				$mensagem .= '<li>Favor preencher o E-mail.</li>';
			elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)):
				  $mensagem .= '<li>Formato do E-mail inválido.</li>';
			exit;
			endif;

			// Constrói a data no formato ANSI yyyy/mm/dd
//			$data_temp = explode('/', $data_nascimento);
//			$data_ansi = $data_temp[2] . '/' . $data_temp[1] . '/' . $data_temp[0];
		endif;



		// Verifica se foi solicitada a inclusão de dados
		if ($acao == 'incluir'):

			$nome_foto = 'padrao.jpg';
			if(isset($_FILES['foto']) && $_FILES['foto']['size'] > 0):  

				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			     if(is_uploaded_file($_FILES['foto']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          if(!file_exists("fotos")):  
			               mkdir("fotos");  
			          endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $nome_foto = date('dmY') . '_' . $_FILES['foto']['name'];  
			            
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/'.$nome_foto)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			     endif;  
			endif;

			$sql = 'INSERT INTO tab_cliente (nome, endereco, numero, bairro, cidade, estado, uf, cep, cpf, telefone, site, email)
							   VALUES(:nome, :endereco, :numero, :bairro, :cidade, :estado, :uf, :cep, :cpf, :telefone, :site, :email)';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':nome', $nome);
			$stm->bindValue(':endereco', $endereco);
			$stm->bindValue(':numero', $numero);
			$stm->bindValue(':bairro', $bairro);
			$stm->bindValue(':cidade', $cidade);
			$stm->bindValue(':estado', $estado);
			$stm->bindValue(':uf', $uf);
			$stm->bindValue(':cep', $cep);
			$stm->bindValue(':cpf', $cpf);
			$stm->bindValue(':telefone', $telefone);
			$stm->bindValue(':site', $site);
			$stm->bindValue(':email', $email);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;


		// Verifica se foi solicitada a edição de dados
		if ($acao == 'editar'):

			
			  
			$sql = 'UPDATE tab_cliente SET nome=:nome, endereco=:endereco, numero=:numero, bairro=:bairro, cidade=:cidade, estado=:estado, uf=:uf, cep=:cep, cpf=:cpf, telefone=:telefone, site=:site, email=:email  ';
			$sql .= 'WHERE id = :id';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id', $id);
			$stm->bindValue(':nome', $nome);
			$stm->bindValue(':endereco', $endereco);
			$stm->bindValue(':numero', $numero);
			$stm->bindValue(':bairro', $bairro);
			$stm->bindValue(':cidade', $cidade);
			$stm->bindValue(':estado', $estado);
			$stm->bindValue(':uf', $uf);
			$stm->bindValue(':cep', $cep);
			$stm->bindValue(':cpf', $cpf);
			$stm->bindValue(':telefone', $telefone);
			$stm->bindValue(':site', $site);
			$stm->bindValue(':email', $email);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro editado com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;


		    // Verifica se foi solicitada a exclusão dos dados
		     if ($acao == 'excluir'):

		
			// Exclui o registro do banco de dados
			$sql = 'DELETE FROM tab_cliente WHERE id = :id';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id', $id);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;
		?>

	</div>
</body>
</html>