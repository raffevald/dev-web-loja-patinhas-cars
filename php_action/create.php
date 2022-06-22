<?php
    session_start();

    include "../conecta_mysqli.inc";

    if (isset($_POST['btn-adicionar'])) :
        $marca = mysqli_escape_string($conexao, $_POST['marca']);
        $modelo = mysqli_escape_string($conexao, $_POST['modelo']);
        $descricao = mysqli_escape_string($conexao, $_POST['descricao']);
        $mod_fab = mysqli_escape_string($conexao, $_POST['mod_fab']);
        $cor = mysqli_escape_string($conexao, $_POST['cor']);
        $placa = mysqli_escape_string($conexao, $_POST['placa']);
        $valor = mysqli_escape_string($conexao, $_POST['valor']);

        $sql = "INSERT INTO carros (marca, modelo, descricao, mod_fab, cor, placa, valor) 
        VALUES ('$marca', '$modelo', '$descricao', '$mod_fab', '$cor', '$placa', '$valor')";
        $resultado = mysqli_query($conexao, $sql);
        $linhasAfetadas = mysqli_affected_rows($conexao);
        if ($linhasAfetadas == 1) :
            mysqli_close($conexao);
            echo "<script> window.location.replace('../estoque.php?incsucesso'): </script>";
            // echo "onclick="window.location.href = './estoque.php'";";
        else :
            mysqli_close($conexao);
            echo "<script> location.replace('../estoque.php?erro'): </script>";
        endif;
        // echo "Marca " . $marca . "<br/> "; 
        // echo "Modelo " . $modelo  . "<br/> ";
        // echo "Descrição " . $descricao  . "<br/> ";
        // echo "Modelo de fabricação " . $mod_fab  . "<br/> ";
        // echo "Cor " . $cor . "<br/> ";
        // echo  "Placa " . $placa  . "<br/> ";
        // echo "Valor " . $valor . "<br/> ";

    endif;
?>