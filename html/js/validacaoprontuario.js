﻿//Validacao prontuario

var quarto = document.getElementById("qtpront");
var medico = document.getElementById("medpront");
var paciente = document.getElementById("pacpront");
var saude = document.getElementById("stpront");

var botao = document.getElementById("botao");

botao.addEventListener('click',function(e){
	e.preventDefault();
	if(quarto.value == '' ||
		medico.value == '' ||
		paciente.value == ''){
			alert("Por favor preencha todos os campos");
			return false;
		}else if(isNaN(Number(quarto.value))){
			alert("Digite um válido para quarto");
			return false;
		}else{
			document.getElementsByTagName("form")[0].submit();
		}
});