<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Usuário</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
 <!--  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"> -->
  <!-- Google Fonts Roboto -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"> -->
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/estilo.css">
</head>

<body>

<?php require_once('global.php')?>
<!-- data-theme="dark" -->
<div id="principal">
  <header class="mb-1 navbar navbar-expand-lg navbar-dark" id="nav-bar" > 
      <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
          <ul class="navbar-nav mr-auto">
              

            <li class="nav-item active">
              <a class="btn z-depth-3 text-white border border-white">Bem vindo : <?php echo $_SESSION['UsuarioNome']; ?>   
                   
              </a>
            </li>
            <li class="nav-item active">
              <!-- <a class="btn z-depth-3 text-white border border-white" id="theme-toggle" class="theme-toggle">Noturno</a> -->
            </li>
            <li class="nav-item active">
              <a class="btn z-depth-3 text-white border border-white" href="sair.php">          Sair
              </a>
            </li>

            
          </ul>
          <ul class="navbar-nav ml-auto nav-flex-icons">
              <li class="nav-item avatar">
                <a class="nav-link p-0" id="menu">
                  <img src="<?php echo $_SESSION['UsuarioFoto']; ?>" class="rounded-circle z-depth-0"
                  alt="avatar image" height="55" width="50" id="foto">
                </a>
              </li>

          </ul>            
  </header>
  </div>

