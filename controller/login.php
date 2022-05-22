<?php
    // obtém os valores digitados
    $username = $_POST["usuario"];
    $senha = $_POST["password"];

    include "./db_configs/conecta_mysqli.inc";
    $resultado = mysqli_query($conexao, "SELECT * FROM usuarios where username='$username'");
    $linhas = mysqli_num_rows($resultado);
 //   echo $username. $senha;

?>