<!DOCTYPE html>
<!-- inclusao.php -->
<html>
    <head>
        <title>Cadastro de aluno - Inclusão</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
// efetua inclusao do curso informado em cadatro_curso.html

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $confirmar_email = $_POST["confirmar_email"];
        $cod_membro = $_POST["cod_membro"];
        $senha = $_POST["senha"];
        $confirmar_senha = $_POST["confirmar_senha"];
        $bol_admin = 1;
        $telefone = NULL;
        $cod_usuario = NULL;
        $cod_tipo_sexo = 1;

        try {
            include_once "../inc/conectabd.php";

            $query = "INSERT INTO tb_usuario 
                (nome_usuario, email_usuario, senha_usuario, bol_administrador, cod_usuario, telefone_usuario, cod_tipo_sexo)
           VALUES(:nome,:email,:senha,:bol_admin,:cod_usuario,:telefone,:cod_tipo_sexo)";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":senha", $senha);
            $stmt->bindValue(":bol_admin", $bol_admin);
            $stmt->bindValue(":cod_usuario", $cod_usuario);
            $stmt->bindValue(":telefone", $telefone);
            $stmt->bindValue(":cod_tipo_sexo", $cod_tipo_sexo);
            $stmt->execute();
            //echo "Inclusão efetuada com sucesso";            
            header('Location: ../login/form_login.php');
        } catch (PDOExeception $e) {
            echo "Erro: " . $e->getMessage();
        }
        ?>          
    </body>
</html>

