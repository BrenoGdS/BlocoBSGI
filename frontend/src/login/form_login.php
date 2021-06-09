<!DOCTYPE html>
<!-- cadastro.html -->
<html>
    <head>
        <title>Login</title>
        <!-- <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
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
                <img src="../img/BSGI-logo3c.png"/>
            </div>
            <br>
            <div class="destaque1">
                <form action="login.php" method="POST" class="form-horizontal">
                    <div class="container" style="align-content: center;">
                        <div class="row">
                            <div class="form-group col-sm-4" style="margin-left: 33.4%;">
                                <input type="text" name="email" required="required" placeholder="E-mail" class="form-control background-input">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4" style="margin-left: 33.4%;">
                                <input type="password" name="senha" required="required" placeholder="Senha" class="form-control background-input">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-sm-6" style="text-align: right;">
                            <a href="../usuario/form_insercao.php" style="margin-right: 55px;">Novo cadastro</a>
                        </div>
                        <div class="col-sm-6" style="text-align: left;">
                            <a href="#" style="margin-left: 45px;">Esqueci a Senha</a>
                        </div>

                    </div>
                    <div class="col-sm-4" style="margin-left: 37.3%; width: 25.5%;">
                        <input type="submit" value="ACESSAR" class="btn btn-primary btn-sm form-control">
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