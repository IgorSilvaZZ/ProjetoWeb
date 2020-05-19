<?php
    session_start();
    echo "Usuario: ". $_SESSION['UsuarioNome'];
?>
<br>
<a href="sair.php">Sair</a>