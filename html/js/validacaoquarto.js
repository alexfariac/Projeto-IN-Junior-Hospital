//Validacao quarto

var numero = document.getElementById("nqt");

var botao = document.getElementById("botao");

botao.addEventListener('click',function(e){
	e.preventDefault();
	if(numero.value == ""){
		alert("Preencha todos os campos");
		return false;
	}else{
		if(isNaN(Number(numero.value))){
			alert("Digite um numero valido para o quarto");
			return false;
		}else{
			document.getElementsByTagName("form")[0].submit();
		}
	}
});