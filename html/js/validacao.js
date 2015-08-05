//Author Alexandre Cardoso
//Verifica se quando o botao é apertado o campo Usuario está vazio.

var nome = document.getElementById("userinput");
var botao = document.getElementById("botao");

botao.addEventListener('click',function(e){
	e.preventDefault();
	if(nome.value == ''){
		alert("Para logar digite um usuario válido");
	}else{
		document.getElementsByTagName("form")[0].submit();
	}
});
