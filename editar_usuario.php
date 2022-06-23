<?php
include "valida_sessao.inc";
include "UI_include.php";
include INC_DIR . 'header.inc';
?>

<body>
    <div class="container">
        <?php
        include INC_DIR . 'menu.inc';
        //select
        if (isset($_GET['id'])) :
            include "conecta_mysqli.inc";
            $id = mysqli_escape_string($conexao, $_GET['id']);
            $sql = "SELECT * FROM usuarios WHERE u_usuario = '$id'";
            $resultado = mysqli_query($conexao, $sql);
            $dados =mysqli_fetch_array($resultado);
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

        <div class="section no-pad-bot" id="index-bonner">
            <div class="container">
                <br /><br />
                <h3 style="text-align: center;"> Editar usuário</h3>
                <form action="php_action/update_user.php" method="POST">
                    <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                        <input type="hidden" name="id" value="<?php echo $u_id; ?>">

                        <div class="form-group mt-3">
                            <label for="usuario" class="form-label">Usuário</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" value="<?php echo $u_usuario; ?>">                           
                        </div>
                        <div class="form-group mt-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $u_nome; ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="sobrenome" class="form-label">sobrenome </label><input type="text" class="form-control" name="sobrenome" id="sobrenome" value="<?php echo $u_sobrenome; ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="email" class="form-label">E-mail</label><input type="text" class="form-control" name="email" id="email" value="<?php echo $u_email; ?>">
                        </div> 
                        <div class="form-group mt-3">
                            <label for="categoria" class="form-label">Categoria (selecione para mudar)</label>
                            <select name="categoria" class="form-select form-select-sm" aria-label=".form-select-lg example">
                                <option value="<?php echo $u_cat; ?>"><?php if ($u_cat == "a") : echo "administrador";
                                endif;
                                if ($u_cat == "u") : echo "usuário";
                            endif; ?></option>
                            <option value="a">administrador</option>
                            <option value="u">usuário</option>
                            </select>
                        </div>

                    </div>
                    <div style="text-align: center;" class=" mt-3">
                    <button type="submit" name="btn-alterar-usuario" class="btn btn-primary">Salvar alterações</button>
                    </div>

                </form>
            </div>
            <br /><br />
        </div>
        <?php
        include INC_DIR . 'foot.inc'; ?>
    </div>
</body>

</html>