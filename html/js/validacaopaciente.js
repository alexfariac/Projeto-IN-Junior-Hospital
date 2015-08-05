//Validação do Formulario do paciente
var nome = document.getElementById("inputEmail");
var cpf = document.getElementById("inputPassword");

var botao = document.getElementById("botao");
console.log(typeof(nome));
console.log(typeof(cpf));
botao.addEventListener('click',function(e){
		if(nome.value == '' || cpf.value == ''){
			alert("Complete todos os campos para prosseguir");
			return false;
		}else{
			if(cpf.value.length != 11){
				alert("Digite um CPF válido");
				return false;
			}
		}
})