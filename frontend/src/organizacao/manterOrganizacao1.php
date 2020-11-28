<!HTML>

<!-- form_inserc_org.php 
     formulario de insercao das organizaçoes
<!-- versao 4.2 - baseado em cadastro_bd_pdo (form-insercao.php) 
     Script do CEP funcionando perfeitamente; Novo layout; 
     selects Tipo de Organização e cidade funcionando -->
<!-- Programas acessados: conectabd.php, estilo1-v3.1.css, consultaCEP.js, funcoes_org-v1.5.php, 
     insercao_organizacao-v1.5.php -->


<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    <link href="..\css\estilo1-v3.1.css" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="consultaCEP.js"></script>

    <title> BSGI - Organização </title>
 

    </head>


<body>
    <header>
                
  	<div id="cab_esq">
		<img class="contain" src="..\img\BSGI-logo3c.png" align=left width="99%">
	</div> 
	<div id="cab_dir">
        <!-- novos icones azuis -->    
                <a href="../user"><img src="..\img\ic-users-b2-128.png" height="10%" ></a>
                <a href="../info"><img src="..\img\ic-information-b2-128.png" height="9%" ></a>
                <a href="https://www.instagram.com" target="_blank"><img src="..\img\ic-instagram-b2-128.png" height="8.1%" ></a>
                <a href="https://www.facebook.com/" target="_blank"><img src="..\img\ic-facebook-b2-128.png" height="8.1%"></a>
                <a href="../home"><img src="..\img\ic-home-b2-128.png" height="9%"></a>

	</div>
    </header>
    

    <section id="barra"> </section>
    <section id="main"> 
        <h1 class="titulo">Cadastro Organizacional</h1>

    
    <!-- *** FORMULÁRIO PARA INSERÇÃO DE DADOS *** -->
    <form id="formulario" action="insercao_organizacao-v1.5.php" method="GET">
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
                background-color: red;  /* era #4CAF50 */
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
                background-color: rgb(220,0,0); /* era #45a049 - ACERTAR COR EM HOVER */
            }            
            /* botão de salvar */
            input[type=submit] {
                background-color: #4CAF50; 
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
                background-color: #45a049;
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
    
    

    <div id="divFormOrg1" class="container">
        <div class="row"> <!-- organiza os campos em blocos -->
            <?php
                include_once "../inc/conectabd.php"; // ativar o database
                include_once "../inc/funcoes_org-v1.5.php";
            ?>
            
            <div class="col-50">
            <label for="idNomeOrg"> </label>
		<input type="text" name="nome_org" id="idNomeOrg" placeholder="Nome da Organização" required 
                 class="form-control">
            </div>
            <br> 

            <!-- SELECT DINÂMICO -->
            <div class="col-25">
            <label for="idTipoOrg"> </label> 
            <select name="id_tipo_org" id="idTipoOrg" class="form-control" 
                    value="<?php le_tipo_org($conn); ?>" required>
            </select> 
            </div>
            <br>             
 
            <div class="col-25">
           <label for="idNomeOrgPai"> </label>
            <select name="id_organizacao_pai" id="idNomeOrgPai" class="form-control mb-1 mr-sm-2"
                    value='<?php le_organização_pai($conn); ?>' >
                
            </select> 
            </div>
        </div>

        
        <div class="row"> <!-- organiza os campos em blocos -->   
            <div class="col-50">
            <label for="idLiderOrg1"> </label>
            <select name="id_lider_organizacional1" id="idLiderOrg1" class="form-control mb-1 mr-sm-2">
                    <option default value="">Líder Organizacional 1 (selecione)</option>
                    <option value="1">Nome de Usuário 1</option>
                    <option value="2">Nome de Usuário 2</option>
            </select>
            </div>
            
            <div class="col-50">
            <label for="idLiderOrg2"> </label>
            <select name="Id_Lider_Organizacional2" id="idLiderOrg2" class="form-control mb-1 mr-sm-2">
                    <option default value="">Líder Organizacional 2 (selecione)</option>
                    <option value="1">Usuário 1</option>
                    <option value="2">Usuário 2</option>
            </select>            
            </div>
        </div>

    </div> <!-- fim do "divFormOrg1" -->

    

    <div id="divFormOrg2" class="container">  
        
        <div class="row">
            <div class="col-25">
            <label for="idFoneFixoOrg"> </label>
		<input type="tel" name="tel_fixo_org" id="idFoneOrg" placeholder="Fone fixo (11-3333-2222)" 
                 pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" class="form-control mb-1 mr-sm-2">
            </div>
            <br>
        
            <div class="col-25">
            <label for="idFoneCelOrg"> </label>
		<input type="tel" name="tel_cel_org" id="idFoneOrg" placeholder="Celular  (11-99999-8888)" 
                 pattern="[0-9]{2}-[0-9]{5}-[0-9]{4}" class="form-control mb-1 mr-sm-2">
            </div>
            
            <div class="col-50">
                <label for="idEmailOrg"> </label>
		<input type="email" name="email_org" id="idEmailOrg" placeholder="E-mail da Organização (exemplo@org.com)" 
                 class="form-control mb-1 mr-sm-2">
            </div>            

        </div>
    </div> <!-- fim do "divFormOrg2" --> 
    
    
    
    <div id="divFormOrg3" class="container">
        <div class="row"> <!-- organiza os campos em blocos -->
        <!-- SELECT DINÂMICO -->
            <div class="col-25">
            <label for="cep"> </label>
            <input type="number" class="form-control mb-1 mr-sm-2" name="cep_org" id="cep" placeholder="CEP"
                   min="01000000">
            </div>

            <div class="col-25"> 
            <label for="idUFOrg" > </label>
            <input type="text" class="form-control" name="uf_org" id="estado" placeholder="UF">
            </div>


            <div class="col-50">
            <label for="cidade"> </label> 
            <select name="id_cidade_org" id="cidade" class="form-control mb-1 mr-sm-2" 
                    value="<?php le_cidade($conn); ?>">
                
            </select>
            </div>
        </div>

        
        <div class="row"> <!-- organiza os campos em blocos -->
            <div class="col-50">
            <label for="logradouro"> </label>
		<input type="text" class="form-control" name="logradouro_org" id="logradouro" placeholder="Logradouro">
            </div>
            <br>
            
            <div class="col-25">    
            <label for="idNumLogradouroOrg"> </label>
                <input type="number" name="num_org" id="idNumLogradouroOrg" placeholder="Número (1-9999)" 
                 min="0" max="9999" class="form-control mb-1 mr-sm-2">
            </div>
            <br>

        </div>    
        <div class="row">
            <div class="col-50">    
            <label for="idComplementoOrg"> </label>
        	<input type="text" name="complemento_org" id="complemento" placeholder="Complemento" 
                 class="form-control mb-1 mr-sm-2">
            </div>        

            <div  class="col-25">    
            <label for="bairro"> </label>
        	<input type="text" name="bairro_org" id="bairro" placeholder="Bairro" class="form-control">
            </div>
            <br>
        </div>
        
    </div> <!-- fim do "divFormOrg3" -->   
    <br>

    
    <input type="submit" value="Cadastrar" class="btn btn-primary btn-sm">
    <input type="reset" value="Limpar" class="btn btn-primary btn-sm">
<!--    </div> <!-- fim do "div formulario" --> 
    </form>
       
</body>
</html>