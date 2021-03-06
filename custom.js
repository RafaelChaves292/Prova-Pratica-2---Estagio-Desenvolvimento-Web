/* Atribui ao evento submit do formulário a função de validação de dados */
var form = document.getElementById("form-contato");
if (form != null && form.addEventListener) {                   
    form.addEventListener("submit", validaCadastro);
} else if (form != null && form.attachEvent) {                  
    form.attachEvent("onsubmit", validaCadastro);
}

/* Atribui ao evento keypress do input cpf a função para formatar o CPF */
var inputCPF = document.getElementById("cpf");
if (inputCPF != null && inputCPF.addEventListener) {                   
    inputCPF.addEventListener("keypress", function(){mascaraTexto(this, '###.###.###-##')});
} else if (inputCPF != null && inputCPF.attachEvent) {                  
    inputCPF.attachEvent("onkeypress", function(){mascaraTexto(this, '###.###.###-##')});
}

/* Atribui ao evento keypress do input telefone a função para formatar o Telefone (00 0000-0000) */
var inputTelefone = document.getElementById("telefone");
if (inputTelefone != null && inputTelefone.addEventListener) {                   
    inputTelefone.addEventListener("keypress", function(){mascaraTexto(this, '## ####-####')});
} else if (inputTelefone != null && inputTelefone.attachEvent) {                  
    inputTelefone.attachEvent("onkeypress", function(){mascaraTexto(this, '## ####-####')});
}


/* Atribui ao evento click do link de exclusão na página de consulta a função confirmaExclusao */
var linkExclusao = document.querySelectorAll(".link_exclusao");
if (linkExclusao != null) { 
	for ( var i = 0; i < linkExclusao.length; i++ ) {
		(function(i){
			var id_cliente = linkExclusao[i].getAttribute('rel');

			if (linkExclusao[i].addEventListener){
		    	linkExclusao[i].addEventListener("click", function(){confirmaExclusao(id_cliente);});
			}else if (linkExclusao[i].attachEvent) { 
				linkExclusao[i].attachEvent("onclick", function(){confirmaExclusao(id_cliente);});
			}
		})(i);
	}
}

/* Função para validar os dados antes da submissão dos dados */
function validaCadastro(evt){
	var nome = document.getElementById('nome');
	var endereco = document.getElementById('endereco');
	var numero = document.getElementById('numero');
	var bairro = document.getElementById('bairro');
	var cidade = document.getElementById('cidade');
	var uf = document.getElementById('uf');
	var cep = document.getElementById('cep');
	var email = document.getElementById('email');
	var cpf = document.getElementById('cpf');
	var telefone = document.getElementById('telefone');
	var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var contErro = 0;


	/* Validação do campo nome */
	caixa_nome = document.querySelector('.msg-nome');
	if(nome.value == ""){
		caixa_nome.innerHTML = "Favor preencher o Nome";
		caixa_nome.style.display = 'block';
		contErro += 1;
	}else{
		caixa_nome.style.display = 'none';
	}

	/* Validação do campo email */
	caixa_email = document.querySelector('.msg-email');
	if(email.value == ""){
		caixa_email.innerHTML = "Favor preencher o E-mail";
		caixa_email.style.display = 'block';
		contErro += 1;
	}else if(filtro.test(email.value)){
		caixa_email.style.display = 'none';
	}else{
		caixa_email.innerHTML = "Formato do E-mail inválido";
		caixa_email.style.display = 'block';
		contErro += 1;
	}	

	/* Validação do campo cpf */
	caixa_data = document.querySelector('.msg-data');
	if(data_nascimento.value == ""){
		caixa_data.innerHTML = "Favor preencher a Data de Nascimento";
		caixa_data.style.display = 'block';
		contErro += 1;
	}else{
		caixa_data.style.display = 'none';
	}

	/* Validação do campo cpf */
	caixa_cpf = document.querySelector('.msg-cpf');
	if(cpf.value == ""){
		caixa_cpf.innerHTML = "Favor preencher o CPF";
		caixa_cpf.style.display = 'block';
		contErro += 1;
	}else{
		caixa_cpf.style.display = 'none';
	}

	if(contErro > 0){
		evt.preventDefault();
	}
}

/* Função para formatar dados conforme parâmetro enviado, CPF */
function mascaraTexto(t, mask){
	var i = t.value.length;
	var saida = mask.substring(1,0);
	var texto = mask.substring(i);

	if (texto.substring(0,1) != saida){
		t.value += texto.substring(0,1);
	}
}

/* Função para exibir um alert confirmando a exclusão do registro*/
function confirmaExclusao(id){
	retorno = confirm("Deseja excluir esse Registro?")

	if (retorno){

	    //Cria um formulário
	    var formulario = document.createElement("form");
	    formulario.action = "action_cliente.php";
	    formulario.action = "action_usuario.php";
	    formulario.method = "post";

		// Cria os inputs e adiciona ao formulário
	    var inputAcao = document.createElement("input");
	    inputAcao.type = "hidden";
	    inputAcao.value = "excluir";
	    inputAcao.name = "acao";
	    formulario.appendChild(inputAcao); 

	    var inputId = document.createElement("input");
	    inputId.type = "hidden";
	    inputId.value = id;
	    inputId.name = "id";
	    formulario.appendChild(inputId);

	    //Adiciona o formulário ao corpo do documento
	    document.body.appendChild(formulario);

	    //Envia o formulário
	    formulario.submit();
	}
}
