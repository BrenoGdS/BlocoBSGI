<!HTML>

<!-- modeloGeralTemplate.php
     Template do layout geral das páginas - RENOMEIE PARA O NOME DO ARQUIVO QUE VOCÊ FOR USAR
<!-- versao 4.0 - baseado no design feito no Figma -->

    

<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">    
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    
    <link href="src\css\estiloIndex.css" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <title> BSGI - esolher título </title>

    </head>
    
<body>
    <header>
        <!-- ATENÇÃO: ainda preciso melhorar o cabeçalho dimensionável -->
  	<div id="cab_esq">
            <img class="contain" src="src\img\BSGI-logo3c.png" align=left width="99%">
        </div>
        <!--<div id="cab_central"> 
            <a>Nome do Usuário</a>
        </div> -->
        <div id="cab_dir">
        <!-- novos icones azuis -->    
                <a href="../user"><img src="src\img\ic-users-b2-128.png" height="10%" ></a>
                <a href="../info"><img src="src\img\ic-information-b2-128.png" height="9%" ></a>
                <a href="https://www.instagram.com" target="_blank"><img src="src\img\ic-instagram-b2-128.png" height="8.1%" ></a>
                <a href="https://www.facebook.com/" target="_blank"><img src="src\img\ic-facebook-b2-128.png" height="8.1%"></a>
                <a href="../home"><img src="src\img\ic-home-b2-128.png" height="9%"></a>
        </div>
    </header>
    
    <section id="barra"> </section>
    <section id="main">
        <h1 class="titulo">Preencha a baixo ao menos um dos campos para busca</h1>
        
        <!-- *** FORMULÁRIO PARA INSERÇÃO DE DADOS *** -->
        <form id="formulario" name="formularioFiltroOrganizacao" action="insercao_organizacao-v1.4.php" method="GET">
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
                /* Se não precisar do botão, retirar essa parte */
                input[type=reset] {
                    background-color: red;  /* era #4CAF50 */
                    color: white;
                    padding: 12px 20px;
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
                /* Se não precisar do botão, retirar essa parte */
                input[type=submit] {
                    background-color: #4CAF50;
                    color: white;
                    padding: 12px 20px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    filter: drop-shadow(0 2px 2px rgb(160, 160, 160));
                    float: right;
                    margin-right: 14%;
                }
                input[type=submit]:hover {
                    background-color: #45a049;
                }

                
                /* tamanho das colunas */
                .col-25 {
                    float: left;
                    width: 20%;
                    margin-top: 2px;/* era 6px */
                    padding: 5px;   /* espaço entre os campos */
                }
                .col-50 {
                    float: left;
                    width: 40%;
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

            <div class="row justify-content-md-left">
                <!-- PRIMEIRA COLUNA -->
                <div class="col-md-4">
                    <div class="div-filtros-Consulta-Organizacao" >
                        <!-- área central da página -->
                        <label class="label-index" for="ds_organizacao"> 
                        Nome da Organização:
                        </label>
                        <input class="imput-index" type="text" name="nomeOrganizacao">
                        
                        <label class="label-index" for="ds_atividade"> 
                        Nome do Evento/Atividade:
                        </label>
                        <input class="imput-index" type="text" name="nomeAtividade">
                
                        <label class="label-index" for="dataEvento">
                        Mês da Atividade/Evento:
                        </label>
                        <input  type="date" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
                            name="dataCalendario" value="" required>

                        <button type="button" class="btn btn-primary btnPesquisarOrg" onclick="pesquisarOrganizacaoEventos();">Pesquisar</button>
                        
                    </div>    
                </div>
                <!-- SEGUNDA COLUNA -->
                <div class="col-md-4">
                    
                    <div class="div-filtros-Consulta-Organizacao" >

                    
                        <label class="label-index" for="estado">
                        Estado:
                        </label>
                        <?php //cadastro.php
                        // lista Alunos cadastrados  
                        try{
                            include_once "src/inc/conectabd.php";
                            $query = "SELECT id_UF, nome_UF FROM tb_uf;";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            echo "<select name=\"estado\">";
                            echo '<option default value="">SELECIONE</option>';
                            // busca os dados lidos do banco de dados
                            while ($row = $stmt->fetch(PDO:: FETCH_ASSOC)) {
                                $id = $row["id_UF"];
                                $curso = $row["nome_UF"];
                                        // <option value="1">Anal. Des. Sist</option> 
                                echo "<option value=\"$id\">";
                                echo  $curso . '</option>';
                            }
                            echo "</select>";
                        } catch(PDOExeception $e){
                            echo "Erro: ".$e -> getMessage();
                        }  
                        ?> 

                        <label class="label-index" for="cidade">
                        Cidade:
                        </label>
                        <?php //cadastro.php
                        // lista Alunos cadastrados  
                        try{
                            include_once "src/inc/conectabd.php";
                            $query = "SELECT id_cidade, desc_Cidade FROM tb_cidade;";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            echo "<select name=\"cidade\">";
                            echo '<option default value="">SELECIONE</option>';
                            // busca os dados lidos do banco de dados
                            while ($row = $stmt->fetch(PDO:: FETCH_ASSOC)) {
                                $id = $row["id_cidade"];
                                $curso = $row["desc_Cidade"];
                                        // <option value="1">Anal. Des. Sist</option> 
                                echo "<option value=\"$id\">";
                                echo  $curso . '</option>';
                            }
                            echo "</select>";
                        } catch(PDOExeception $e){
                            echo "Erro: ".$e -> getMessage();
                        }  
                        ?>                             

                        <label class="label-index" for="ds_endereco"> 
                        Endereço (Palavra chave):
                        </label>
                        <input class="imput-index" type="text" name="nomeendereco">
                        
                    </div>    
                </div>
            </div>
            
            <!-- Se não precisar do botão, retirar essa parte -->
            <!-- <input type="submit" value="Cadastrar" class="btn btn-primary btn-sm">
            <input type="reset" value="Limpar" class="btn btn-primary btn-sm"> -->
        </form>
            
        <div>
            
            <div class="div-listagem-organizacao" id="div-resultado-listagem-organizacao"><!-- 
                        
                <div class="div-titulo-listagem-organizacao"> <p> <b> <i>Resultados Encontrados <i> <b></p> </div>            
                
                <div>
                    <div class="div-titulo-organizacao"> <center> <p> <b> <i><a href="form_alteracao.php?id=$XXXX" class="linksCrud"><img class="btn-editar" src="src/img/btn-lapis-editar.png" alt="..."  ></a> <a href="form_alteracao.php?id=$XXXX" class="linksCrud"><img class="btn-editar" src="src/img/img-excluir.png" alt="..." ></a>id_tipo_org nome_org <i> <b></p> </center> </div>
                    
                    <div class="div-resultado-organizacao">  
                        <div class="div-titulo-organizacao"> <center> <p> <b> <i>Informações <i> <b></p> </center> </div>                      
                        <div class="div-eventos-organizacao"> <p> <i> Endereço: Estado, Cidade, Logradouro, Nº, compl., bairro <br> 
                                                                    Telefones: 123456798 - 123456798 <br> 
                                                                    Email: email@gmail.com <i> </p> 
                        </div>
                    </div>
                    
                    <div class="div-resultado-organizacao">                        
                        <div class="div-titulo-organizacao"> <center> <p> <b> <i>Programação <i> <b></p> </center> </div>
                        <div class="div-eventos-organizacao"> <p> <i><img class="btn-editar" src="src/img/btn-lapis-editar.png" alt="..."> <img class="btn-editar" src="src/img/img-excluir.png" alt="..."> - 01/10/2020 Atividade Exemplo 1 <br> 
                        <img class="btn-editar" src="src/img/btn-lapis-editar.png" alt="..."> <img class="btn-editar" src="src/img/img-excluir.png" alt="..."> - 01/10/2020 Atividade Exemplo 2 <br> 
                        <img class="btn-editar" src="src/img/btn-lapis-editar.png" alt="..."> <img class="btn-editar" src="src/img/img-excluir.png" alt="..."> - 01/10/2020 Atividade Exemplo 3  <br> 
                                                                    + Clique aqui para detalhar <i> </p> 
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="div-titulo-organizacao"> <center> <p> <b> <i>id_tipo_org nome_org <i> <b></p> </center> </div>
                    
                    <div class="div-resultado-organizacao">  
                        <div class="div-titulo-organizacao"> <center> <p> <b> <i>Informações <i> <b></p> </center> </div>                      
                        <div class="div-eventos-organizacao"> <p> <i> Endereço: Estado, Cidade, Logradouro, Nº, compl., bairro <br> 
                                                                    Telefones: 123456798 - 123456798 <br> 
                                                                    Email: email@gmail.com <i> </p> 
                        </div>
                    </div>
                    
                    <div class="div-resultado-organizacao">                        
                        <div class="div-titulo-organizacao"> <center> <p> <b> <i>Programação <i> <b></p> </center> </div>
                        <div class="div-eventos-organizacao"> <p> <i> - 01/10/2020 Atividade Exemplo 1 <img class="btnimg-editar" src="src/img/btn-lapis-editar.png" alt="..."> <br> 
                                                                    - 01/10/2020 Atividade Exemplo 2 <br> 
                                                                    - 01/10/2020 Atividade Exemplo 3  <br> 
                                                                    + Clique aqui para detalhar <i> </p> 
                        </div>
                    </div>
                </div> -->

            </div>
        
        </div>

    </section>
</body>
</html>


<script>
  function pesquisarOrganizacaoEventos() {
	let form = document.formularioFiltroOrganizacao;
    console.log(form.nomeOrganizacao.value);

    let nomeOrganizacao = form.nomeOrganizacao ? form.nomeOrganizacao.value : "";
    let nomeAtividade = form.nomeAtividade ? form.nomeAtividade.value : "";
    let dataCalendario = form.dataCalendario.value;
    let estado = form.estado ? form.estado.value : "";
    let cidade = form.cidade ? form.cidade.value : "";
    let nomeendereco = form.nomeendereco ? form.nomeendereco.value : "";

    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("div-resultado-listagem-organizacao").innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET","funcoesOrganizacao.php?nomeOrganizacao="+nomeOrganizacao+"&nomeAtividade="+nomeAtividade+"&dataCalendario="+dataCalendario+"&estado="+estado+"&cidade="+cidade+"&nomeendereco="+nomeendereco+"&id_div_eventos=recuperaorg"+"&id_organizacao=0",true);
    xmlhttp.send(); 
  }

  function detalharProgramacao(id_div_eventos, id_organizacao, nomeAtividade, dataCalendario) {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            document.getElementById(id_div_eventos).innerHTML=this.responseText;
        }
    }
    xmlhttp.open("GET","funcoesOrganizacao.php?id_div_eventos="+id_div_eventos+"&id_organizacao="+id_organizacao+"&nomeAtividade="+nomeAtividade+"&dataCalendario="+dataCalendario+"&nomeOrganizacao=0"+"&nomeendereco=0"+"&estado=0"+"&cidade=0",true);
    xmlhttp.send(); 

    }

</script>