//Author Alexandre Cardoso
//Verifica se quando o botao é apertado o campo Usuario está vazio.

var nome = document.getElementById("userinput");
var botao = document.getElementById("botao");

botao.addEventListener('click',function(e){
	if(nome.value == ''){
		alert("Para logar digite um usuario válido");
	}
});
