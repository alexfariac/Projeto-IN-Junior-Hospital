$('#adicionarTarefa').click(adicionarTarefa);
$('.editar').click(editarTarefa);
$('.excluir').click(excluirTarefa);

function adicionarTarefa(e){
	var input = $('#novaTarefa').val();
	if(input !== ""){
		$('#lista').append(criaTarefa(input));
		$('.editar').click(editarTarefa);
		$('.excluir').click(excluirTarefa);
		$('#novaTarefa').val("");
	}else{
		alert("tarefa vazia aqui não");
	}
}

function criaTarefa(tarefa){
	var estrutura = '<p>'+
			'<span>'+tarefa+'</span>'+
			'<button class="editar">Editar</button>'+
			'<button class="excluir">Excluir</button>'+
		'</p>';
	return estrutura;
}

function editarTarefa(e){
	var p = $(this).parent('p');
	var span = p.children('span');
	var novoTexto = prompt("Insira o novo texto");
	span.text(novoTexto);
	//alert(span.text());
}

function excluirTarefa(e){
	var p = $(this).parent('p');
	p.remove();
}