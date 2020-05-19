<?php
require_once('global.php');
if(isset($_SESSION["UsuarioNome"])) { header("Location: login.php"); }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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

<!-- Material form login -->
<div class="card">

<h5 class="card-header info-color white-text text-center py-4" id="headlog">
  <strong>Login</strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-8 pt-0">

  <!-- Form -->
  <form class="text-center" style="color: #757575;" method="post" action="valida.php" class="login-form">

    <!-- Email -->
    <div class="md-form">
      <input type="email" id="materialLoginFormEmail" class="form-control" name="txtUser">
      <label for="materialLoginFormEmail">Email</label>
    </div>

    <!-- Password -->
    <div class="md-form">
      <input type="password" id="materialLoginFormPassword" class="form-control" name="txtSenha">
      <label for="materialLoginFormPassword">Password</label>
    </div>

    <div class="d-flex justify-content-around">
      <div>
      </div>
    </div>

    <!-- Sign in button -->
    <button class="sing" type="submit">Sign in</button>

    <!-- Register -->
    <p>Not a member?
      <a href="register.php">Register</a>
    </p>

  </form>
  <!-- Form -->

  <p class="text-center text-danger">
    <?php
      if(isset($_SESSION['LoginErro'])){
        echo $_SESSION['LoginErro'];
        unset($_SESSION['LoginErro']);
      }
    ?>
  </p>

</div>

</div>
<!-- Material form login -->

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
</body>
</html>