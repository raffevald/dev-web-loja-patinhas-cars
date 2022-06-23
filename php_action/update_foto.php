<?php
// Sessão
session_start();
//Conexão
include "../conecta_mysqli.inc";

if (isset($_POST['btn-alterar-foto'])) :

  $f_carro = $_POST['f_carro'];
  $f_id = $_POST['f_id'];


  // parte referente ao upload da imagem 

  $_UP['pasta'] = '../assets/imagens/carros/';
  // Tamanho máximo do arquivo (em Bytes)
  $_UP['tamanho'] = 1024 * 1024 * 6; // 2Mb
  // Array com as extensões permitidas
  $_UP['extensoes'] = array('jpg', 'png', 'gif', 'bmp', 'jpeg', 'tiff', 'webp');
  // Renomeia o arquivo? (Se true, o arquivo será salvo com a mesma extensão mas será renomeado)
  $_UP['renomeia'] = true;
  // Array com os tipos de erros de upload do PHP
  $_UP['erros'][0] = 'Não houve erro';
  $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
  $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
  $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
  $_UP['erros'][4] = 'Não foi feito o upload do arquivo';
  // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro o nome do arquivo está em:
  //$_FILES['arquivofoto']['name']
  if ($_FILES['arquivo']['error'] != 0) {
    die("Não foi possível fazer o upload, erro: " . $_UP['erros'][$_FILES['arquivofoto']['error']]);
    exit; // Para a execução do script
  }
  // Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
  // Faz a verificação da extensÃo do arquivo
  $extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
  if (array_search($extensao, $_UP['extensoes']) === false) {
    echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
    echo  $_FILES['arquivo']['name'];
    exit;
  }
  // Faz a verificação do tamanho do arquivo
  if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
    echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
    exit;
  }
  // O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
  // Primeiro verifica se deve trocar o nome do arquivo
  if ($_UP['renomeia'] == true) {
    // Cria um nome baseado no UNIX TIMESTAMP atual e com a mesma extensao do arquivo 
    //  $nome_final_arq_foto = md5(time()) . '.' . $extensao;
    $nome_final_arq_foto = $f_carro . '_' . time() . '.' . $extensao;
  } else {
    // Mantém o nome original do arquivo
    $nome_final_arq_foto = $_FILES['arquivo']['name'];
  }
  // Depois verifica se é poss�ível mover o arquivo para a pasta escolhida
  if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final_arq_foto)) {
    // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
    echo "Upload efetuado com sucesso!";
    echo '<a href="' . $_UP['pasta'] . $nome_final_arq_foto . '">Clique aqui para acessar o arquivo</a>';
  } else {
    // Não foi possível fazer o upload, provavelmente a pasta está incorreta
    echo "Não foi possível enviar o arquivo, tente novamente";
  }

  if ($nome_final_arq_foto == "") {
    $nome_final_arq_foto = "padrao.jpg";
  } else {
    $nome_final_arq_foto = $nome_final_arq_foto;
  }

  //Constroi uma query SQL usando os valores acima

  $sql = "UPDATE fotos SET f_imagem = '$nome_final_arq_foto' WHERE f_id = $f_id";

  // Imprime em tela a query para verificação

  $resultado = mysqli_query($conexao, $sql);
  $linhasafetadas = mysqli_affected_rows($conexao);
  mysqli_close($conexao);
  // linhas de teste
  //echo $sql;
  //echo "<p></p>";
  //echo $linhasafetadas;

  if ($linhasafetadas == 1) :

    echo "<script> location.replace('../fotos.php?id=$f_carro'); </script>";

  else :

    echo "<script> location.replace('../fotos.php?erro'); </script>";

  endif;
endif;

if (isset($_POST['btn-marcar-destaque'])) :

  $f_carro = $_POST['f_carro'];
  $f_id = $_POST['f_id'];

  //Constroi uma query SQL usando os valores acima

  $sql = "UPDATE fotos SET f_destaque = 1 WHERE f_id = $f_id";

  // Imprime em tela a query para verificação

  $resultado = mysqli_query($conexao, $sql);
  $linhasafetadas = mysqli_affected_rows($conexao);
  mysqli_close($conexao);
  // linhas de teste
  //echo $sql;
  //echo "<p></p>";
  //echo $linhasafetadas;

  if ($linhasafetadas == 1) :

    echo "<script> location.replace('../fotos.php?id=$f_carro'); </script>";

  else :

    echo "<script> location.replace('../fotos.php?erro'); </script>";

  endif;

endif;


if (isset($_POST['btn-desmarcar-destaque'])) :

  $f_carro = $_POST['f_carro'];
  $f_id = $_POST['f_id'];

  //Constroi uma query SQL usando os valores acima

  $sql = "UPDATE fotos SET f_destaque = 0 WHERE f_id = $f_id";

  // Imprime em tela a query para verificação

  $resultado = mysqli_query($conexao, $sql);
  $linhasafetadas = mysqli_affected_rows($conexao);
  mysqli_close($conexao);
  // linhas de teste
  //echo $sql;
  //echo "<p></p>";
  //echo $linhasafetadas;

  if ($linhasafetadas == 1) :

    echo "<script> location.replace('../fotos.php?id=$f_carro'); </script>";

  else :

    echo "<script> location.replace('../fotos.php?erro'); </script>";

  endif;

endif;

if (isset($_POST['btn-excluir-foto'])) :
  $f_carro = $_POST['f_carro'];
  $f_id = $_POST['f_id'];

  //Constroi uma query SQL usando os valores acima

  $sql = "DELETE FROM fotos WHERE f_id = $f_id";

  // Imprime em tela a query para verificação

  $resultado = mysqli_query($conexao, $sql);
  $linhasafetadas = mysqli_affected_rows($conexao);
  mysqli_close($conexao);
  // linhas de teste
  //echo $sql;
  //echo "<p></p>";
  //echo $linhasafetadas;

  if ($linhasafetadas == 1) :

    echo "<script> location.replace('../fotos.php?id=$f_carro'); </script>";

  else :

    echo "<script> location.replace('../fotos.php?erro'); </script>";

  endif;

endif;
