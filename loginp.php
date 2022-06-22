<?php
    // obtém os valores digitados
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $senhaencriptada = md5($senha);

    // acesso ao banco de dados
    include "conecta_mysqli.inc";
    $resultado = mysqli_query($conexao, "SELECT u_senha FROM usuarios where u_usuario='$usuario'");
    $linhas = mysqli_num_rows($resultado);

    // testa se a consulta retornou algum registro
    if ($linhas == 0) {
        echo "<html><body>";

        // echo $linhas['user_pass'];
        echo "<p>Usuário $usuario não encontrado!</p>";
        echo "<p><a href=\"login.html\">Voltar</a></p>";
        echo "</body></html>";
    } else {
        $linha = mysqli_fetch_array($resultado);

        // confere senha
        if ($senhaencriptada !== $linha['u_senha']) {
            echo "<html><body>";
            echo "<p>A senha está incorreta!</p>";
            echo $senhaencriptada;
            echo "<br/>";
            echo $linha['u_senha'];
            echo "<p><a href=\"login.html\">Voltar</a></p>";
            echo "</body></html>";
        // usuário e senha corretos. Vamos criar as variáveis da sessão
        } else {
            session_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['senha'] = $senhaencriptada;
            // direciona para a página inicial dos usuários cadastrados
            header("Location: pagina_inicial.php");
            exit();
        }
    }
    mysqli_close($conexao);
?>