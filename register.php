<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/lg.css" rel="stylesheet">

</head>
<body>
<?php require_once('global.php')?>

<?php

    try {
        $nivel = new NivelAcesso();
        $listar = $nivel->Listar();
        
    } catch(Exception $e) {
        echo '<pre>';
            print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }

?>

<!-- Material form login -->
<div class="card" style="height: 20%; width: 50%; margin-left: 24%; margin-top: 5%;">

<h5 class="card-header info-color white-text text-center py-4">
  <strong>Cadastrar Usuario</strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-5 pt-0">

<div class="container">
<form class="text-center" style="color: #757575;" method="post" enctype="multipart/form-data" action="cadastrarUsuario.php" name="formreg" onsubmit="return ValidaForm(this)">
  <div class="row">
    <div class="col-sm">
      
    <div class="md-form">
      <input type="text" class="form-control" name="email" id="email">
      <label>Email</label>
    </div>
    </div>
    <div class="col-sm">
   
    <div class="md-form">
    <select class="browser-default custom-select" name="selectNivel">
    <option selected>Selecione o Nivel</option>
        <?php foreach ($listar as $linhas){ ?>
        <option value="<?php echo $linhas['codNivelAcesso']?>"><?php echo $linhas['descNivel']?></option>
        <?php } ?>
</select>
    </div>
    </div>
  </div>
  <div class="container">
  <div class="row">
    <div class="col-sm">
      
    <div class="md-form">
      <input type="text" id="materialLoginFormEmail" class="form-control" name="usuario" id="usuario">
      <label>Usuario</label>
    </div>
    </div>
    <div class="col-sm">
      
    <div class="md-form">
      <input type="password" id="materialLoginFormEmail" class="form-control" name="senUsu" id="senUsu">
      <label>Senha</label>
    </div>
    </div>
  </div>

  <div class="col-sm">
      
    <div class="md-form">
    <input type="file" class="form-control" name="txtFoto" placeholder="">
    </div>
    </div>
  </div>
</div>
    <!-- Sign in button -->
    <input class="sing" type="submit" value="Enviar"></input>
  </form>
  <!-- Form -->
</div>


    <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript" src="js/jquery.mask.min.js"></script>

</body>
</html>

<script type="text/javascript">

    function ValidaForm(form){

      if(form.email.value.indexOf("@") == -1 || form.email.valueOf.indexOf(".") == -1 ||
      form.email.value == "" || form.email.value == null){
        alert("Informe um email valido!")
        form.email.focus();
        return false;
      }

      if(form.usuario.value.lenght < 3 || form.usuario.value == "" || form.usuario.value == null){
          alert("Informe o Nome de usuario!");
          form.usuario.focus();
          return false;
      }

    }

  </script>