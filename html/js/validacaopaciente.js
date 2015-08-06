//Validação do Formulario do paciente
var nome = document.getElementById("inputEmail");
var cpf = document.getElementById("inputPassword");

var botao = document.getElementById("botao");
console.log(typeof(nome));
console.log(typeof(cpf));
botao.addEventListener('click',function(e){
	e.preventDefault();
		if(nome.value == '' || cpf.value == ''){
			alert("Complete todos os campos para prosseguir");
			return false;
		}else{
			if(cpf.value.length != 11 || isNaN(Number(cpf)){
				alert("Digite um CPF válido");
				return false;
			}else{
				document.getElementsByTagName("form")[0].submit();
			}
		}
})