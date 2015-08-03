//Author Alexandre Cardoso
$("#adicionarTarefa").click(adicionarTarefa);
$(".editar").click(editarTarefa);
$(".excluir").click(excluirTarefa);

function adicionarTarefa(e){
	var input = $("#novaTarefa").val();
	if(input !== ""){
		$('#lista').append(criarTarefa(input));
		$('.editar').click(editarTarefa);
		$(".excluir").click(excluirTarefa);
		$('novaTarefa').val("");
	}else{
		alert("Insira uma Hora Para o Inicio do Ponto !");
	}
}

function criarTarefa(tarefa){
	var estrutura = "<p><span>"+tarefa+"</span>"+
					"<button class =\"editar\">Editar Ponto</button><button class = \"excluir\">Fechar Ponto</button></p>";
	
	return estrutura;
}

function editarTarefa(e){
	var p = $(this).parent('p');
	var span = p.children('span');
	var novoTexto = prompt("Insira novo texto");
	if(novoTexto !== ""){
		span.text(novoTexto);
	}else{
		alert("Insira um texto válido");
	}
}

function excluirTarefa(e){
	var p = $(this).parent('p');
	p.remove();
}