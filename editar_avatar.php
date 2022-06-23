<?php
include "valida_sessao.inc";
include "UI_include.php";
include INC_DIR . 'header.inc';
?>

<body>
  <div class="container">
    <?php
    include INC_DIR . 'menu.inc';
    //Select
    if (isset($_GET['id'])) :
      include "conecta_mysqli.inc";
      $id = mysqli_escape_string($conexao, $_GET['id']);
      $sql = "SELECT * FROM usuarios WHERE u_usuario = '$id'";
      $resultado = mysqli_query($conexao, $sql);
      $dados = mysqli_fetch_array($resultado);
    endif;
    //Recuperar dados em variáveis
    $u_id = $dados['u_id'];
    $u_usuario = $dados['u_usuario'];
    $u_nome = $dados['u_nome'];
    $u_sobrenome = $dados['u_sobrenome'];
    $u_email = $dados['u_email'];
    $u_datareg = $dados['u_datareg'];
    $u_cat = $dados['u_cat'];
    $u_avatar = $dados['u_avatar'];
    ?>

    <div class="section no-pad-bot" id="index-banner">
      <div class="container">
        <br /><br />


        <form role="form" method="post" action="php_action/update_avatar.php" enctype="multipart/form-data">

          <div class="row">
            <div class="col-4 "></div>
            <div style="text-align: center;" class="col-4 mt-3 mb-3">
              <h2>Alterar imagem do usuário</h2>
              <input type="hidden" name="id" value="<?php echo $u_id; ?>">
              <input type="hidden" name="usuario" value="<?php echo $u_usuario; ?>">
              <legend><?php echo "$u_usuario" ?></legend>

              <img class="img-responsive" width="200px" src="./assets/imagens/usuarios/<?php echo "$u_avatar" ?>" />
              <p></p>
              <input name="arquivo" type="file" class="form-control" id="arquivofoto" value="<?php echo "$u_avatar" ?>" />

            </div>
            <div class="col-4 "></div>
          </div>
          <div style="text-align: center;" class=" mt-3">
            <button type="submit" name="btn-alterar-avatar" class="btn btn-primary">Salvar nova imagem</button>
          </div>

        </form>

      </div>
      <br /><br />
      <?php
      include INC_DIR . 'foot.inc';
      ?>
    </div>
</body>

</html>