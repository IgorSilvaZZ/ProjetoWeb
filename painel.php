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

<body>
  
<div id="content" style="width: 100%;height: 100%;">
  
<div id="form-editar">


<!-- FORMULARIO DE EDIÇÃO-->
<form class="rounded text-center border border-dark p-5" action="editarUsuario.php" method="post" id="form" style=" width: 55%; margin-left:20%;">

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

      <button class="btn btn-outline my-4 btn-block active" type="submit" id="salvar"><b>Salvar</b></button>
      
    </div>
 
</form>


</div>
</body>