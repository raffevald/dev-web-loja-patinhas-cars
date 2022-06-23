<?php
// Sessão
session_start();

//Conexão
include "../conecta_mysqli.inc";

if (isset($_POST['btn-incluir-foto'])) :
  $id_carro = $_POST['id_carro'];


  $sql = "INSERT INTO fotos (f_carro, f_imagem, f_destaque) VALUES ($id_carro, 'padrao.png',0)";
  $resultado = mysqli_query($conexao, $sql);
  $linhasafetadas = mysqli_affected_rows($conexao);
  echo $sql;
  if ($linhasafetadas == 1) :
    mysqli_close($conexao);
    //  echo "OK";
    echo "<script> location.replace('../fotos.php?id=$id_carro'); </script>";
  else :
    mysqli_close($conexao);
    //  echo "erro";
    echo "<script> location.replace('../fotos.php?id=erro'); </script>";
  endif;
endif;
