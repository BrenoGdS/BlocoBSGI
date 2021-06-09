<!DOCTYPE html>
<!-- cadastro.html -->
<html>
    <head>
        <title>Cadastro de aluno</title>
        <!--<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">-->

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link href="../css/estilos.css" rel="stylesheet">

        <style>
            .background-input{
                background-color: #e8f0fd;
            }
        </style>
    </head>
    <body id="main">
        <div style="height: 100px;"></div>
        <div class="container-fluid">
            <div style="text-align: center;">
                <img src="..\img\BSGI-logo2c.png"/>
            </div>
            <br>
            <div class="destaque1">
                <form action="insercao.php" method="POST" class="form-horizontal">
                    <div class="container" style="align-content: center;">
                        <div class="row">
                            <div class="form-group col-sm-5" style="margin-left: 29%;">
                                <input type="text" name="nome" placeholder="Nome" required="required" class="form-control background-input">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-5" style="margin-left: 29%;">
                                <input type="text" name="email" required="required" placeholder="E-mail" class="form-control background-input">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-5" style="margin-left: 29%;">
                                <input type="text" name="confirmar_email" required="required" placeholder="Confirmar E-mail" class="form-control background-input">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-5" style="margin-left: 29%;">
                                <input type="text" name="cod_membro" placeholder="Cód. Membro (Opcional)" class="form-control background-input">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-5" style="margin-left: 29%;">
                                <input type="password" name="senha" required="required" placeholder="Senha" class="form-control background-input">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-5" style="margin-left: 29%;">
                                <input type="password" name="confirmar_senha" required="required" placeholder="Confirmar Senha" class="form-control background-input">
                            </div>
                        </div>       
                    </div>
                    <div class="col-sm-4" style="margin-left: 34%; width: 31.6%;">
                        <input type="submit" value="Registrar" class="btn btn-primary btn-sm form-control">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

<script language="JavaScript" >
    function enviardados(){

    if (document.dados.nome.value == "" ||
            document.dados.nome.value.length < 8)
    {
    alert("Preencha campo NOME corretamente!");
    document.dados.nome.focus();
    return false;
    }

    if (d ocument.dados.email.value == "" ||
            documen t.d ados.email.value.indexOf('@') == - 1 ||
            document.dados.email.value.indexOf('.') == - 1)
    {
    alert("Preencha campo E-MAIL corretamente!");
    d ocument.dados.email.focus();
    return false;
    }

    if (d ocument.dados.confirmar_email.value == "" ||
            documen t.d ados.confirmar_email.value.indexOf('@') == - 1 ||
            document.dados.confirmar_email.value.indexOf('.') == - 1)
    {
    alert("Preencha campo Confirmar E-MAIL corretamente!");
    d ocument.dados.confirmar_email.focus();
    return false;
    }

    if (document.dados.senha.value == "" ||
            document.dados.senha.value.length < 8)
    {
    alert("Preencha campo SENHA corretamente!");
    document.dados.senha.focus();
    return false;
    }
    if (document.dados.confirmar_senha.value == "" ||
            document.dados.confirmar_senha.value.length < 8)
    {
    alert("Preencha campo Confirmar SENHA corretamente!");
    document.dados.confirmar_senha.focus();
    return false;
    }
    return true;
    }

</script>