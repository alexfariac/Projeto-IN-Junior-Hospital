//Validaçao do formulario do Funcionario.
var nome = document.getElementById("nomefun");
var cpf = document.getElementById("cpffun");
var endereco = document.getElementById("endfun");
var cargo = document.getElementById("carfun");

var login = document.getElementById("logfun");
var senha = document.getElementById("inputPassword");

var botao  = document.getElementById("botao");

botao.addEventListener('click',function(e){
		if(nome.value == '' ||
			cpf.value == '' ||
			endereco.value == '' ||
			login.value == '' ||
			senha.value == ''){
				alert("Por favor preencha todos os campos para proseguir");
				return false;
		}else{
			if(cpf.value.length != 11){
				alert("Insira um CPF válido");
				return false;
			}
		}
});