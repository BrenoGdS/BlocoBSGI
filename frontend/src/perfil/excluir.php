<?php

// efetua a exclusão do usuário

try {
    include_once "../inc/conectabd.php";

    $sql = "DELETE FROM tb_usuario WHERE id_usuario = " . $_GET['id'];

    if ($conn->query($sql)) {
        $msg = "Excluído com sucesso!";
        header('Location: ../perfil/form_lista_perfil.php');
    } else {
        $msg = "Erro ao excluir!";
        echo $msg;
    }
    mysql_close($conn);
    //echo "Inclusão efetuada com sucesso";            
} catch (PDOExeception $e) {
    echo "Erro: " . $e->getMessage();
}
?>  