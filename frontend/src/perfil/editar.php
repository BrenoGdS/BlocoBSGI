<?php

// efetua inclusao do curso informado em cadatro_curso.html

$nome = $_POST["nome"];
$email = $_POST["email"];
$confirmar_email = $_POST["confirmar_email"];
$cod_membro = $_POST["cod_membro"];
$senha = $_POST["senha"];
$bol_admin = 1;
$telefone = NULL;
$cod_usuario = NULL;
$cod_tipo_sexo = 1;

try {
    include_once "../inc/conectabd.php";

    $sql = "UPDATE tb_usuario SET nome_usuario = '" . $nome . "', email_usuario = '" . $email . "', senha_usuario = '" . $senha . "', bol_administrador = " . $bol_admin . " WHERE id_usuario = " . $_GET['id'];

    if ($conn->query($sql)) {
        $msg = "Atualizado com sucesso!";
        header('Location: ../perfil/form_lista_perfil.php');
    } else {
        $msg = "Erro ao atualizar!";
        echo $msg;
    }
    mysql_close($conn);
    //echo "Inclusão efetuada com sucesso";            
} catch (PDOExeception $e) {
    echo "Erro: " . $e->getMessage();
}
?>  