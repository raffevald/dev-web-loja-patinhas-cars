<?php

session_start();

include "../conecta_mysqli.inc";

if(isset($_POST['btn-deletar'])) :
    $id = $_POST['id'];
    $id = (int)$id;
    $sql = "DELETE FROM carros WHERE id_carro = $id";
    $resultado = mysqli_query($conexao, $sql);
    $linhasafetadas = mysqli_affected_rows($conexao);
    if($linhasafetadas == 1) :
        mysqli_close($conexao);

        echo "<script> location.replace('../estoque.php?delsucesso'); </script>";
    else :
        echo "<script> location.replace('../estoque.php?erro'); </script>";
    endif;
endif;

?>