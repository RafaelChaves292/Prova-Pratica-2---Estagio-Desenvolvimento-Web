<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
	<title>Cadastro de Cliente</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<!--Importando Script Jquery-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
	
	
	<div class='container'>
		<fieldset>
			
			
			<legend><h1>Formulário - Cadastro de Cliente</h1></legend>
			
			<form action="action_cliente.php" method="post" id='form-contato' enctype='multipart/form-data'>


			    <div class="form-group">
			      <label for="nome">Nome</label>
			      <input type="text" class="form-control" id="nome" name="nome" placeholder="Infome o Nome">
			      <span class='msg-erro msg-nome'></span>
			    </div>
			     
			     <div class="form-group">
			      <label for="email">Email</label>
			      <input type="email" class="form-control" id="email" name="email" placeholder="Informe o E-mail">
			      <span class='msg-erro msg-email'></span>
			    </div>
			     
			     
			    <div class="form-group">
			      <label for="cpf">CPF</label>
			      <input type="text" onKeyUp="mascara_cpf(this.value)" class="form-control" id="cpf" maxlength="14" name="cpf" placeholder="Informe o CPF">
<script language="JavaScript">
<!--
function mascara_cpf(cpf)
{
    var mycpf = '';
    mycpf = mycpf + cpf;
    if (mycpf.length == 3) {
        mycpf = mycpf + '.';
        document.forms[0].cpf.value = mycpf;
    }
    if (mycpf.length == 7) {
        mycpf = mycpf + '.';
        document.forms[0].cpf.value = mycpf;
    }
    if (mycpf.length == 11) {
        mycpf = mycpf + '-';
        document.forms[0].cpf.value = mycpf;
    }
    if (mycpf.length == 14) {
    }
}

        </script>			      
			      
			      <span class='msg-erro msg-cpf'></span>
			    </div> 
			      
			      
			     <div class="form-group">
			      <label for="cep">CEP</label>
			      <input type="text" class="form-control" id="cep" name="cep" placeholder="Infome o CEP">
			      <span class='msg-erro msg-nome'></span>
			    </div>
			    <script type="text/javascript">
		$("#cep").focusout(function(){
			//Início do Comando AJAX
			$.ajax({
				//O campo URL diz o caminho de onde virá os dados
				//É importante concatenar o valor digitado no CEP
				url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
				//Aqui você deve preencher o tipo de dados que será lido,
				//no caso, estamos lendo JSON.
				dataType: 'json',
				//SUCESS é referente a função que será executada caso
				//ele consiga ler a fonte de dados com sucesso.
				//O parâmetro dentro da função se refere ao nome da variável
				//que você vai dar para ler esse objeto.
				success: function(resposta){
					//Agora basta definir os valores que você deseja preencher
					//automaticamente nos campos acima.
					$("#endereco").val(resposta.logradouro);
					//$("#complemento").val(resposta.complemento);
					$("#bairro").val(resposta.bairro);
					$("#cidade").val(resposta.localidade);
					$("#estado").val(resposta.localidade);
					$("#uf").val(resposta.uf);
					//Vamos incluir para que o Número seja focado automaticamente
					//melhorando a experiência do usuário
					$("#numero").focus();
				}
			});
		});
	</script>
	            
			      <div class="form-group">
			      <label for="endereco">Endereço</label>
			      <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Infome o Endereço">
			      <span class='msg-erro msg-nome'></span>
			    </div>
			    
			    <div class="form-group">
			      <label for="numero">Número</label>
			      <input type="text" class="form-control" id="numero" name="numero" placeholder="Infome o Número">
			      <span class='msg-erro msg-nome'></span>
			    </div>
			    
			    <div class="form-group">
			      <label for="bairro">Bairro</label>
			      <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Infome o Bairro">
			      <span class='msg-erro msg-nome'></span>
			    </div>
			    
			    <div class="form-group">
			      <label for="cidade">Cidade</label>
			      <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Infome a Cidade">
			      <span class='msg-erro msg-nome'></span>
			    </div>
			    
			    <div class="form-group">
			      <label for="estado">Estado</label>
			      <input type="text" class="form-control" id="estado" name="estado" placeholder="Infome o Estado">
			      <span class='msg-erro msg-estado'></span>
			    </div>
			    
			    <div class="form-group">
			      <label for="uf">UF</label>
			      <input type="text" class="form-control" id="uf" name="uf" placeholder="Infome o UF">
			      <span class='msg-erro msg-nome'></span>
			    </div>
			    
			     <div class="form-group">
			      <label for="telefone">Telefone</label>
			      <input type="text" class="form-control" id="telefone" maxlength="12" name="telefone" placeholder="Informe o Telefone">
			      <span class='msg-erro msg-telefone'></span>
			    </div>
			    <script type="text/javascript"> $("#telefone").mask("(00) 0000-0000");</script>
			    
			    
			    <div class="form-group">
			      <label for="site">Site</label>
			      <input type="site" class="form-control" id="site" maxlength="30" name="site" placeholder="Informe o Site">
			      <span class='msg-erro msg-site'></span>
			    </div>
			    
			    <input type="hidden" name="acao" value="incluir">
			    <button type="submit" class="btn btn-primary" id='botao'> 
			      Gravar
			    </button>
			    <a href='index.php' class="btn btn-danger">Cancelar</a>
			</form>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/jquery.mask.min.js"/></script>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>