<?php

session_start();

include "../conecta_mysqli.inc";

if(isset($_POST['btn-alterar'])) :
    $id = mysqli_escape_string($conexao, $_POST['id']);
    $marca = mysqli_escape_string($conexao, $_POST['marca']);
    $modelo = mysqli_escape_string($conexao, $_POST['modelo']);
    $descricao = mysqli_escape_string($conexao, $_POST['descricao']);
    $mod_fab = mysqli_escape_string($conexao, $_POST['mod_fab']);
    $cor = mysqli_escape_string($conexao, $_POST['cor']);
    $placa = mysqli_escape_string($conexao, $_POST['placa']);
    $valor = mysqli_escape_string($conexao, $_POST['valor']);

    $sql = "UPDATE carros SET marca = '$marca', modelo = '$modelo', descricao = '$descricao', 
    mod_fab = '$mod_fab', cor = '$cor', placa = '$placa', valor = '$valor'
    WHERE id_carro = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    $linhasafetadas = mysqli_affected_rows($conexao);
    if($linhasafetadas == 1) :
        mysqli_close($conexao);

        echo "<script> location.replace('../estoque.php?altsucesso'); </script>";
    else :
        echo "<script> location.replace('../estoque.php?erro'); </script>";
    endif;
endif;

?>