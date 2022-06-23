<?php

session_start();

include "../conecta_mysqli.inc";

if (isset($_POST['btn-deletar-usuario'])) :

    $usuario = $_POST['usuario'];

    $sql = "DELETE FROM usuarios WHERE u_usuario = '$usuario'";
    $resultado = mysqli_query($conexao, $sql);
    $linhasafetadas = mysqli_affected_rows($conexao);
    mysqli_close($conexao);

    if($linhasafetadas == 1) :
        echo "<script> location.replace('../admin.php?delsucesso'); </script>";
    else :
        echo "<script> location.replace('../admin.php?erro'); </script>";
    endif;
endif;