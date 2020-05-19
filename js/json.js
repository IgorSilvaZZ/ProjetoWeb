window.onload(carregarDados());

function carregarDados(){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){	
		if(xhr.readyState==4 && xhr.status==200){
			document.getElementById('usuarios').innerHTML = formata(xhr.responseText);
		}	
	}
	xhr.open("GET","./get.php",true);
	xhr.send();	
}

function formata(strDados){
	var objDados = JSON.parse(strDados);
	var linhasTabela = '';
	for(la of objDados['lista']){
		linhasTabela += '<tr>' +
			'<td id="linha">' + la['codUsuario'] + '</td>' +
			'<td>' + la['nomeUsuario'] + '</td>' +
            '<td>' + la['emailUsuario'] + '</td>' +
            '<td>' + la['descNivel'] + '</td>' +
            '<td id="ft"><img src=" '+la['fotoUsuario']+ ' " id="image">' + '</td>' +

            '<td>' + '<a href="?cod='+la['codUsuario']+' & nome='+la['nomeUsuario']+' &email='+la['emailUsuario']+' & senha='+la['senhaUsuario']+' " ' + ' class="ico-modificar" title="Editar">Editar</a>' + '</td>'+

            '<td>' + '<a href="javascript:void(0)" id="'+la['codUsuario']+'" class="ico-remover" title="Excluir">Excluir</a>' + '</td>'+
          '</tr>';
        
    }
    return linhasTabela;
}