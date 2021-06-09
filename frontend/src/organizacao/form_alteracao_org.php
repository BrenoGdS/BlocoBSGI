<!HTML>

<!-- form_alteracao_org-v2.7.php 
     formulario de alteração das organizações
<!-- versao 2.5 - baseado em cadastro_bd_pdo (form-alteracao.php) e form_inserc_org-v3.9.php 
     Script do CEP funcionando perfeitamente; Novo layout; Tipo de Organização funcionando -->
<!-- Programas acessados: conectabd.php, estilos.css, consultaCEP.js, funcoes_org_alteracao.php, 
     alteracao_organizacao.php -->


<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    <link href="..\css\estilos.css" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="consultaCEP.js"></script>    

    <title> BSGI - Organização </title>
   
    </head>

    
<body>
    <header>
  
  	<div id="cab_esq">
		<img class="contain" src="..\img\BSGI-logo3c.png" align=left width="98%">
	</div> 
	<div id="cab_dir">
        <!-- novos icones azuis -->    
                <a href="../../src/perfil/form_lista_perfil.php"><img src="..\img\ic-users-b2-128.png" height="10%" ></a>
                <a href="http://www.bsgi.org.br/quemsomos/historia_da_soka_gakkai_no_brasil/" target="_blank"><img src="..\img\ic-information-b2-128.png" height="9%" ></a>
                <a href="https://www.instagram.com" target="_blank"><img src="..\img\ic-instagram-b2-128.png" height="8.1%" ></a>
                <a href="https://www.facebook.com/" target="_blank"><img src="..\img\ic-facebook-b2-128.png" height="8.1%"></a>
                <a href="../../index.php"><img src="..\img\ic-home-b2-128.png" height="9%"></a>

	</div>
    </header>
    

    <section id="barra"> </section>
    <section id="main"> 
        <h1 class="titulo">Cadastro Organizacional  -  Alteração</h1>

    
    <!-- *** FORMULÁRIO PARA ALTERAÇÃO DOS DADOS *** -->
    <!-- <form id="formulario" action="alteracaoS_organizacao-v1.4b.php" method="GET"> <!-- vai ter que ser alteracao  -->
        <style>
            input[type=text], select, textarea {
                width: 100%; 
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                /* margin-left: 10px; */
                resize: vertical;
            }
            /* não sei pra que */
            label {
                /* padding: 12px 12px 12px 0; */
                display: inline-block;
            }


            /* botão de limpar  */
            input[type=reset] {
                background-color: rgb(220,0,0);  /* era #4CAF50 */
                color: white;
                padding: 12px 29px;     /* tamanho do botão */
                border: none;
                border-radius: 4px;
                cursor: pointer;
                filter: drop-shadow(0 2px 2px rgb(160, 160, 160));
                float: right;
                margin-right: 1%;
            }
            input[type=reset]:hover {
                background-color: red; /* era #45a049 - ACERTAR COR EM HOVER */
            }            
            /* botão de salvar */
            input[type=submit] {
                background-color: RGB(2, 130, 190); /*Azul BSGI */ /* era #4CAF50 */
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                filter: drop-shadow(0 2px 2px rgb(160, 160, 160));
                float: right;
                margin-right: 18%;      /* 21% alinha à direita; */
            }
            input[type=submit]:hover {
                background-color: dodgerblue;
            }
           
            /* tamanho das colunas */
            .col-25 {
                float: left;
                width: 21.5%;   /* estava 25, depois 20% */
                margin-top: 2px;/* era 6px */
                padding: 5px;   /* espaço entre os campos */
            }
            .col-50 {
                float: left;
                width: 43%;     /* estava 50, depois 40% */
                margin-top: 2px;
                padding: 5px;   /* espaço entre os campos */
            } 
            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }
            

        </style>
            

    
    <?php
        include_once "../inc/conectabd.php"; // ativar o database
        include_once "../inc/funcoes_org_alteracao.php";
        $id = $_GET["id"];
        $row = le_organizacao33($conn, $id);
        //$linha = compara_tipo_org4($conn, $id);
    ?>
    
    <form id="formulario" action="alteracao_organizacao.php" method="GET">    
    <div id="divFormOrg1" class="container"> 
        <div class="row"> <!-- organiza os campos em blocos -->
            
            <div class="col-50">
                <input type="hidden" name="id" value="<?php echo $row["id_organizacao"]; ?>"> 
                
            <label for="idNomeOrg"> </label>
                <input type="text" name="nome_org" id="idNomeOrg" 
                       placeholder="Nome da Organização" class="form-control mb-1 mr-sm-2"
                       value="<?php  $row=compara_nome_org($conn,$id); ?>">
            </div>
            <br> 
        
            <!-- SELECT DINÂMICO -->
            <div class="col-25"> 
            
            <label for="idTipoOrg"> </label> 
            <select name="id_tipo_org" id="idTipoOrg" class="form-control mb-1 mr-sm-2" >
            <?php 
                $row = compara_tipo_org5($conn, $id);
            ?>
            </select>
            </div>
            
        
            <div class="col-25">
            <label for="idNomeOrgPai"> </label>
            <!-- VERIFICAR ESSA PARTE - INNER JOIN tipo+nome bloco -->

            <select name="id_organizacao_pai" id="idNomeOrgPai" class="form-control mb-1 mr-sm-2"
                    value='<?php $row=compara_organização_pai3($conn); ?>' >
            </select>             
            </div>
            <br>   
            
            <div class="col-50">
            <label for="idLiderOrg1"> </label>
            <select name="Id_Lider_Organizacional1" id="idLiderOrg1" class="form-control mb-1 mr-sm-2">
                <optgroup label="Líder Organizacional 1 (selecione)">
                    <option value="">Líder Organizacional 1 (selecione)</option>
                    <option value="1">Usuário 1</option>
                    <option value="2">Usuário 2</option>
                </optgroup>
            </select>
            </div>
            
            <div class="col-50">
            <label for="idLiderOrg2"> </label>
            <select name="Id_Lider_Organizacional2" id="idLiderOrg2" class="form-control mb-1 mr-sm-2">
                <optgroup label="Líder Organizacional 2 (selecione)">
                    <option value="">Líder Organizacional 2 (selecione)</option>
                    <option value="1">Usuário 1</option>
                    <option value="2">Usuário 2</option>
                </optgroup>
            </select>            
            </div>
            
        </div>
    </div> <!-- fim do "divFormOrg1" -->


    <div id="divFormOrg2" class="container">  
        
        <div class="row">
            <div class="col-25">
            <label for="idFoneFixoOrg"> </label>
		<input type="tel" name="tel_fixo_org" id="idFoneOrg" 
                       placeholder="Telefone fixo" class="form-control mb-1 mr-sm-2"
                       value="<?php  $row=compara_telfixo_org($conn,$id); ?>">
            </div>
            <br>
        
            <div class="col-25">
            <label for="idFoneCelOrg"> </label>
		<input type="tel" name="tel_cel_org" id="idFoneOrg" 
                       placeholder="Telefone celular" class="form-control mb-1 mr-sm-2"
                       value="<?php  $row=compara_telcel_org($conn,$id); ?>">
            </div>
            
            <div class="col-50">
                <label for="idEmailOrg"> </label>
		<input type="email" name="email_org" id="idEmailOrg" 
                       placeholder="E-mail" class="form-control mb-1 mr-sm-2"
                       value="<?php  $row=compara_email_org($conn,$id); ?>">
            </div>            

        </div>
    </div> <!-- fim do "divFormOrg2" --> 
    
    
    
    <div id="divFormOrg3" class="container">
        <div class="row">
            <div class="col-25">
            <label for="cep"> </label>
            <input type="number" name="CEP_org" id="cep" 
                   placeholder="CEP" class="form-control mb-1 mr-sm-2"
                   value="<?php  $row=compara_cep_org($conn,$id); ?>">
            </div>
        
        <!-- SELECT DINÂMICO (class="form-control mb-1 mr-sm-2") -->
            <div class="col-25"> 
            <label for="idUFOrg" > </label>
            <select name="id_uf" id="estado" class="form-control mb-1 mr-sm-2">
            <?php 
                $row=compara_uf_org($conn, $id); 
            ?>
            </select>    
            </div>

            <div class="col-50">
            <label for="cidade"> </label>
            <select name="id_cidade_org" id="cidade" class="form-control" 
                    value="<?php 
                                le_cidade2($conn); 
                                $row=compara_cidade_org6($conn, $id);
                            ?>">
            <?php

            ?>
            </select>
            </div> 
        </div> 
        
        <div class="row"> <!-- organiza os campos em blocos -->
            <div class="col-50">
            <label for="logradouro"> </label>
		<input type="text" name="logradouro_org" id="logradouro"
                       placeholder="Logradouro" class="form-control"
                       value="<?php  $row=compara_logradouro_org($conn,$id); ?>">
            </div>
            <br>
            
            <div class="col-25">    
            <label for="idNumLogradouroOrg"> </label>
                <input type="number" name="num_org" id="idNumLogradouroOrg" min="0" max="9999" 
                       placeholder="Número (1-9999)" class="form-control mb-1 mr-sm-2"
                       value="<?php  $row=compara_num_org($conn,$id); ?>">
            </div>
            <br>

        </div>    
        <div class="row">
            <div class="col-50">    
            <label for="idComplementoOrg"> </label>
        	<input type="text" name="complemento_org" id="complemento" 
                       placeholder="Complemento" class="form-control mb-1 mr-sm-2"
                       value="<?php  $row=compara_complemento_org($conn,$id); ?>">
            </div>        

            <div  class="col-25">    
            <label for="bairro"> </label>
        	<input type="text" name="bairro_org" id="bairro"  
                       placeholder="Bairro" class="form-control"
                       value="<?php  $row=compara_bairro_org($conn,$id); ?>">
            </div>
            <br>
        </div>
    </div> <!-- fim do "divFormOrg3" -->   
    <br>
        

    <!-- BOTÕES -->
    <input type="submit" value="Alterar cadastro" class="btn btn-sm">
    <!-- <input type="reset" onclick="exclui_org.php" value="Excluir" class="btn btn-sm"> -->
    <!-- <input type="button" onclick="form_consulta_org.php" value="Voltar" class="btn btn-sm"> -->
<!--    </div> <!-- fim do "div formulario" --> 
    </form>

    
</body>
</html>