<!HTML>
<!-- exclui_org.php -->

<!-- Created on : 05/11/2020, 11:03:27
     Author     : Rodrigo Brittes -->

<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    <link href="..\css\estilos.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    
    
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.js" ></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    

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
        <h1 class="titulo">Cadastro Organizacional</h1>
        
    
    <?php //exclui_org.php
// efetua a exclusão da organização pelo id informado.
  $id_organizacao = $_GET["id"];
  
  try {
  include_once "../inc/conectabd.php";

  $query = "delete from tb_organizacao where id_organizacao = :id_organizacao;";
  $stmt = $conn->prepare($query);
  $stmt->bindValue(":id_organizacao", "$id_organizacao", PDO::PARAM_INT);
  $stmt->execute();
  
    echo '<br>';
    echo "<h5>Exclusão efetuada com sucesso</h5>";
  
  } catch (PDOException $e) {
    echo "Erro: ". $e->getMessage();
  }
 ?>  
        
 <br>
 <a href="../../index.php">Retornar para consulta</a>
 <br>
 <a href="form_consulta_org.php">Ir para tabela de organizações</a>
 
 </body>
</html>
