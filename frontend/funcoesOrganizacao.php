
<?php
// municipio.php

// observar que recebe como parâmetro a uf=SP ou uf=RJ

/* $uf = $_GET["uf"]; */



try{
    include_once "src/inc/conectabd.php";

    echo '<div class="div-titulo-listagem-organizacao"> <p> <b> <i>Resultados Encontrados <i> <b></p> </div>';

    $query = "SELECT 'Nome Org.' as nome_org union SELECT 'outro nome org.' as nome_org union SELECT 'teste Nome Org.' as nome_org union SELECT 'outro teste nome org.' as nome_org;";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // busca os dados lidos do banco de dados
    while ($row = $stmt->fetch(PDO:: FETCH_ASSOC)) {
        $nome_org = $row["nome_org"];
        // <option value="1">Anal. Des. Sist</option> 
        echo '<div class="div-resultado-organizacao"> ';
        echo '<div class="div-titulo-organizacao"> <center> <p> <b> <i>' .$nome_org .'<i> <b></p> </center> </div>';
        echo '<div class="div-eventos-organizacao"> <p> <i> - 01/10/2020 Atividade Exemplo 1 <br> 
                      - 01/10/2020 Atividade Exemplo 2 <br> 
                      - 01/10/2020 Atividade Exemplo 3  <br> 
                      + Clique aqui para detalhar <i> </p> 
              </div>
              </div>';

    }

} catch(PDOExeception $e){
    echo "Erro: ".$e -> getMessage();
}  


?>



<!-- 
              
                
                <div class="div-resultado-organizacao">                        
                    <div class="div-titulo-organizacao"> <center> <p> <b> <i>Bloco de Exemplo Um <i> <b></p> </center> </div>
                    <div class="div-eventos-organizacao"> <p> <i> - 01/10/2020 Atividade Exemplo 1 <br> 
                                                                - 01/10/2020 Atividade Exemplo 2 <br> 
                                                                - 01/10/2020 Atividade Exemplo 3  <br> 
                                                                + Clique aqui para detalhar <i> </p> 
                    </div>
                </div>
                
                <div class="div-resultado-organizacao">                        
                    <div class="div-titulo-organizacao"> <center> <p> <b> <i>Bloco de Exemplo Um <i> <b></p> </center> </div>
                    <div class="div-eventos-organizacao"> <p> <i> - 01/10/2020 Atividade Exemplo 1 <br> 
                                                                - 01/10/2020 Atividade Exemplo 2 <br> 
                                                                - 01/10/2020 Atividade Exemplo 3  <br> 
                                                                + Clique aqui para detalhar <i> </p> 
                    </div>
                </div>
                
                <div class="div-resultado-organizacao">                        
                    <div class="div-titulo-organizacao"> <center> <p> <b> <i>Bloco de Exemplo Um <i> <b></p> </center> </div>
                    <div class="div-eventos-organizacao"> <p> <i> - 01/10/2020 Atividade Exemplo 1 <br> 
                                                                - 01/10/2020 Atividade Exemplo 2 <br> 
                                                                - 01/10/2020 Atividade Exemplo 3  <br> 
                                                                + Clique aqui para detalhar <i> </p> 
                    </div>
                </div>

   -->