<!DOCTYPE html>
<!-- \login\form_login.php -->
<html>
    <html lang="pt-br">
    <head>
        <title>BSGI - Login</title>
        <!-- <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
        <link href="../css/estilos.css" rel="stylesheet">

        <style>
            .background-input{
                background-color: #ffffff; <!-- estava: #e8f0fd -->
            }
        </style>  
        
        <!--
        <script>
            function showCD(str) {
            if (str=="") {
                document.getElementById("txtHint").innerHTML="";
                return;
            }
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                document.getElementById("txtHint").innerHTML=this.responseText;
                }
            }
            xmlhttp.open("GET","getcd.php?q="+str,true);
            xmlhttp.send();
            }
            
        </script>  
        -->
        
    </head>


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>





<body id="main">
        <div style="height: 100px;"></div>
        <div class="container-fluid"> 
            <div style="text-align: center;">
                <!-- <img src="../img/BSGI-logo3c.png"> -->
                <!-- <img src="../img/BSGI-logo3c.png" style="width:23.5%;"> -->                
                <img src="{{ Storage::url('/BSGI-logo3c.png')}}" style="width:23.5%">
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
                                <input type="password" id="senha" name="senha" required="required" placeholder="Senha" 
                                       class="form-control background-input"
                                       value="" onblur="verificaSenha2(this.value)">
                                       <!--  value="" onblur="verificaSenha(this.value)"> -->
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
                    <br>
                    <div class="col-sm-4" style="margin-left: 37.3%; width: 25.5%;">
                        <!-- <input type="submit" value="ACESSAR" name="login-in" class="btn btn-primary btn-sm form-control" -->
                        <input type="submit" value="ACESSAR" name="dados" class="btn btn-primary btn-sm form-control">
                               
                               <!--  onclick="enviardados()"> -->
                               <!-- onclick="verificaSenha(this.value)"> -->
                               <!-- onclick ="verificaSenha2()"> -->
                               
                    </div>
                </form>
            </div>
        </div>

        
</script>     
    
    </body>
</html>