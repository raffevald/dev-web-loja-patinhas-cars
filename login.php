<!DOCTYPE html>
<html lang="pt-BR">

    <?php
        include './includes/head.inc';
    ?>

    <body>
        <?php
            include './includes/nav.inc';
        ?>

        <main class="forme-container">
            <form method="POST" action="./controller/login.php">
                <div class="mb-3">
                    <label for="InputUsuarios" class="form-label">Usuario</label>
                    <input name="usuario" type="text" class="form-control" id="InputUsuarios" aria-describedby="UsuariosHelp">

                    <div id="UsuariosHelp" class="form-text">Nunca compartilhe seu usuario e senha com terceiros.</div>
                </div>

                <div class="mb-3">
                    <label for="InputPassword1" class="form-label">Senha</label>
                    <input name="password" type="password" class="form-control" id="InputPassword1">
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Salvar senha e usuario</label>
                </div>
                <button type="submit" class="btn btn-primary">Entrar</button>
            </form>
        </main>


    </body>

    <?php
        include './includes/foot.inc';
    ?>

</html>