<?php
include('header.php');
if(!isset($_SESSION["UsuarioNome"])) { header("Location: login.php"); }


?>

<body class="heavy-rain-gradient">
<?php
            try {
                $usuario = new Usuario();
                $lista = $usuario->listar();
            } catch(Exception $e) {
                echo '<pre>';
                    print_r($e);
                echo '</pre>';
                echo $e->getMessage();
            }
        ?>

<div id="teste">

<div class="drop" style="display: none;">
      <nav class="nav-menu">
      <table style="border-bottom: 1px solid #131313;">
        <tr>
          <td>
            <a class="nav-link p-0">
              <img src="<?php echo $_SESSION['UsuarioFoto']; ?>" class="rounded-circle z-depth-0"
                  alt="avatar image" height="55" width="50" id="foto">
          </td>
          <td style="color: white;"> 
            <b><?php echo $_SESSION['UsuarioNome']; ?></b></br>
            <b><?php echo $_SESSION['UsuarioEmail']; ?></b>
          </td> 
        </tr>
      </table>
          <ul id="menuzinho">
          <li><a href="https://www.google.com/">Google</a></li>
          <li><a href="https://twitter.com/">Twitter</a></li>
          <li><a href="painel.php">Editar</a></li>
        </ul>
      </nav>
  </div>

<div class="msg" style="display:none;">
		<p class="msgajax"></p>
</div>

<div id="conteudo">
    <div id="banner">
      <div id="fechar"><a href="#" title="Fechar" class="fechar">X</a></div>
      <p class="link"><a href="#"></a></p>
      <img src="img/shadow.jpg" alt="">
    </div>
</div>

<!-- FORMULÁRIO PARA FAZER PESQUISA -->
<form class="rounded border border-dark text-center p-5 "  action="#!" style=" width: 55%; margin-top: 3%; margin-left:20%">


  <p class="h4 mb-4 active" id="pesquisa"><b>Pesquisar</b></p>
  



    <div class="form-row mb-4">

        <div class="col">
          
          <input class="form-control border border-dark" type="text" id="defaultRegisterFormFirstName" placeholder="..."> 
        

        </div>

          
    
          <button class="btn-outline rounded blue-gradient border text-white" type="submit" ><i class="fas fa-search"></i></button>

       
    </div>


</form>
<!-- FORMULÁRIO PARA FAZER PESQUISA -->

<!--
-
-
-
-
-
-
-
-->
	

<!-- FORMULARIO DE EDIÇÃO-->
<form class="rounded text-center border border-dark p-5" action="editarUsuario.php" method="post" id="form" style=" width: 55%; margin-top: 3%; margin-left:20%">

<input type="hidden" name="codUsers" id="codUsers" value="<?php echo @$_GET['cod']; ?>">

<p class="h4 mb-4"><b>Formulário para edição</b></p>

<!-- PARTE DE BAIXO -->
    <div class="form-row mb-4">

            <div class="col">
        
          <input class="form-control border border-dark" type="text" id="defaultRegisterFormLastName" placeholder="Alterar nome de Usuario" name="txNome" id="txNome" value="<?php echo @$_GET['nome'];?>" > 

        </div>

    </div>

<!-- PARTE DE BAIXO -->
    <div class="form-row mb-4">

        <div class="col">

          <input class="form-control border border-dark" type="text" id="defaultRegisterFormFirstName" placeholder="Alterar endereço de e-mail" id="txEmail" name="txEmail" value="<?php echo @$_GET['email'];?>">

            </div>

            <div class="col">
       
          <input class="form-control border border-dark"  type="text" id="defaultRegisterFormFirstName" placeholder="Nova Senha" name="txSenha" id="txSenha" value="<?php echo @$_GET['senha'];?>">

        </div>

      <button class="btn btn-outline blue-gradient my-4 btn-block active" type="submit" id="salvar"><b>Salvar</b></button>
      
    </div>
 
</form>
<!-- FORMULÁRIO DE EDIÇÃO -->

<!--
-
-
-
-
-
-
-
-->

<!-- TABELA DE DADOS DO USUÁRIO-->



<div class="rounded table-responsive text-nowrap" style=" width: 55%; margin-top: 3%; margin-left:20%">
<p class="h4 mb-4"><b>Dados do usuário</b></p>



  <table class="rounded table heavy-rain-gradient">
    <thead class="rounded blue-gradient white-text">

      <tr>
    <th scope="col"><b>ID</b></th>
    <th scope="col"><b>Usuário</b></th>
    <th scope="col"><b>Email</b></th>
    <th scope="col"><b>Nível</b></th>
    <th scope="col"><b>Foto</b></th>
    <th scope="col"><b>Editar</b></th>
    <th scope="col"><b>Excluir</b></th>
      </tr>

    </thead>

    <tbody>
    <?php foreach ($lista as $linha){ ?>        
      <tr>
        <td id="linha"><?php echo $linha['codUsuario'] ?></td>
        <td><?php echo $linha['nomeUsuario'] ?></td>
        <td><?php echo $linha['emailUsuario'] ?></td>
        <td><?php echo $linha['descNivel'] ?></td>
        <td id="ft"><img src="<?php echo $linha['fotoUsuario'] ?>" id="image"></td>

  <td><?php echo "<a href='?cod={$linha['codUsuario']} & nome={$linha['nomeUsuario']} & email={$linha['emailUsuario']} & senha={$linha['senhaUsuario']}' 
        class='ico-modificar' title='Editar'>Editar</a>" ?></td>

        <td><a href="javascript:void(0)" id="<?php echo $linha['codUsuario'] ?>" class="ico-remover" title="Excluir">Excluir</a></td>

      </tr>
      <?php } ?>
     
    </tbody>
  </table>

</div>

</div>

<script src="js/jquery-3.4.1.min.js"></script>
 <script>

function openMenu(){
  $(function(){
    $('.drop').addClass('open').animate({ right: (75)}).show(300);
  });
}
function closeMenu(){
  $(function(){
    $('.drop').removeClass('open').hide(300);
  });
}


$(document).ready(function(){
        /* $("#menu").click(function(event){
            $("#drop").show("");
            event.preventDefault();               
         });

        $("menu").click(function(){
          $("#drop").hide("fast");
          event.preventDefault();  
        }); */

       /*  $("#menu").animate({
             "left": "20px" // distância
        }, 100);//velocidade */

        $("#menu").click(function(event){
          if(!$(".drop").hasClass('open')){
            openMenu()
          }else{
            closeMenu()
          }
        });

        $("#menuzinho a").click(function( e ){
          e.preventDefault();
          var href = $( this ).attr('href');
          $("#teste").load( href +" #teste");
		    });
       
    })

  $(function(){

    var $conteudo = $('#conteudo').width();
    var $banner	= $('#banner');
    /* $banner.show(); */
    $banner.animate({ top: ($conteudo /17)}, 900).show();// aplicando efeito de deslocamento
  // para ajustar o posicionamento do banner, basta aumentar o número da divisão
  // #conteudo tem 1000px dividido por 4 = 250 - então, left será 250 e depois da virgula é o tempo de deslocamento dessa animação.
 
    $(".fechar").click(function(event){
      event.preventDefault(); // previne o evento clique
      $("#banner").hide(); // ocultando o banner
    });
    
  });
 
	//ajax para excluir
	jQuery(document).ready(function(){ 
		jQuery('.ico-remover').click(function(){			
			
			var element = $(this);
			var id = element.attr("id");
			var info = 'id=' + id;
			/* alert(id); */
			
			if(confirm("Deseja realmente excluir o usuário? ")) {
				$.ajax({
					type: "POST",
					url: "excluir-usuario.php?id="+id,
					data: info,
					success: function () {
						jQuery("#linha"+id).remove(); //remove a linha do registro excluído	
						jQuery(".msg").show();
						jQuery(".msgajax").html("Usuário excluído com sucesso!");						 
						jQuery('html, body').animate({ scrollTop: 0 }, 500);						
						jQuery(".msg").fadeOut(3000);
						setTimeout(function () {
							window.location.reload(1);
						}, 3000);
					}					
				});
			}
		});		
	});


  jQuery('#salvar').click(function() {     
	
		var dadosajax = {
			'codUsers' : jQuery("#codUsers").val(),
      'txNome' : jQuery("#txNome").val(),
			'txEmail' : jQuery("#txEmail").val(),
      'txSenha' : jQuery("#txSenha").val(),         
		};
    
		pageurl = 'editarUsuario.php';
    
		jQuery.ajax({        
			url: pageurl,        
			data: dadosajax,        
			type: 'POST',                        
			success: function(html)
			{   
				
				jQuery(".msg").show();
				jQuery(".msgajax").html("Dados salvos com sucesso!");
				jQuery('html, body').animate({ scrollTop: 0 }, 500);			
				jQuery(".msg").fadeOut(3000);										
				
				setTimeout(function () {
					//window.location.reload(0);
					location.href = "usuario.php";					
				}, 3000);						
			}
		});		
	});				
		
</script>	
    
</body>

<?php

include('footer.php');

?>

