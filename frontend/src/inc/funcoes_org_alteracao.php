<?php



#########
// função para ler o tipo da organização e inserir no cadastro
//function le_organizacao($conn, $id_organizacao_sel=0){
function le_organizacao33($conn, $id){
    
try {
  $row = array();

  $query = "SELECT id_organizacao, id_tipo_org, id_organizacao_pai, nome_org, tel_fixo_org, tel_cel_org, email_org, CEP_org,"
          . "id_cidade_org, logradouro_org, num_org, complemento_org, bairro_org FROM tb_organizacao WHERE id_organizacao = :id;";
  
  $stmt = $conn->prepare($query);
  $stmt->bindValue(":id", $id, PDO::PARAM_INT);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
  return ($row);

    
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}







#########
// função para ler o nome da organizacao cadastrada na tb_organizacao para posterior alteração
// FUNCIONANDO PERFEITAMENTE
function compara_nome_org($conn, $id_organizacao_sel=0){

try {
  $row = array();

  $query = "SELECT id_organizacao, nome_org FROM tb_organizacao WHERE id_organizacao = $id_organizacao_sel;";
  //$query = "SELECT id_organizacao, email_org FROM tb_organizacao WHERE id_organizacao = $id;";
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {

      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id = $row["id_organizacao"];
          $nome_org = $row["nome_org"];
           
          if ($id == $id_organizacao_sel) {
              $selected = "selected";
          }

        echo $nome_org;
   
    $stmt->bindValue(":nome_org", $id, PDO::PARAM_INT);      
          return $row;
          
      }
  }  
  
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}





#########
# copiado de funcoes_org_alteracao-v1
// função para ler o tipo da organizacao cadastrada na tb_organizacao para posterior alteração
// FUNCIONADO quase 100%: mostra o nome do tipo selecionado, mas não mostra as opções
function compara_tipo_org5($conn, $id_organizacao_sel=0){

try {
  $row = array();
  
  // obter desc_tipo_org da tb_tipo_organizacao a partir do id_tipo_org da tb_organizacao
  $query = 'SELECT tb_organizacao.id_tipo_org, tb_tipo_organizacao.id_tipo_org, tb_tipo_organizacao.desc_tipo_org 
            FROM tb_organizacao INNER JOIN tb_tipo_organizacao
            ON tb_tipo_organizacao.id_tipo_org = tb_organizacao.id_tipo_org
            WHERE id_organizacao = '.$id_organizacao_sel.';';  
  
/*  $query = 'SELECT tb_organizacao.id_organizacao, tb_organizacao.id_tipo_org, tb_tipo_organizacao.id_tipo_org, tb_tipo_organizacao.desc_tipo_org 
            FROM tb_organizacao INNER JOIN tb_tipo_organizacao
            ON tb_tipo_organizacao.id_tipo_org = tb_organizacao.id_tipo_org
            WHERE id_organizacao = '.$id_organizacao_sel.';';
 * 
 */
  
  $stmt = $conn->prepare($query);
  if ($stmt->execute()) {
        
      #echo "<select name=\"idTipoOrg\" class='col-25'>";     // insere o conteúdo dentro do campo
      #echo '<option default value="">Tipo de Organização</option>';
      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id = $row["id_organizacao"];
          $id_tipo_org = $row["id_tipo_org"];
          $desc_tipo_org = $row["desc_tipo_org"];
           
          if ($id == $id_organizacao_sel) {
              $selected = "selected";
          }
          
        echo "<option value=\"$id\" $selected>";
        echo  $desc_tipo_org . '</option >';      // mostra o resultado da seleção, mas nao os itens disponiveis
            //echo  $desc_tipo_org . '<br>';
        //echo  $desc_tipo_org . '</option >';
        echo '<option>'. "Bloco" . '</option>';
        echo '<option>'. "Comunidade" . '</option>';
        echo '<option>'. "Distrito" . '</option>';
        
    }
    $stmt->bindValue(":id_tipo_org", $id, PDO::PARAM_INT);      
          return $row;
          #echo "</select>";
  }  
  
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}  





#########
# copiado de funcoes_org
// função para ler a organização_pai e inserir no cadastro
function compara_organização_pai3($conn, $id_organizacao_pai_sel=0){
    
try {
  $row = array();

   /*  *AQUI FICA O AUTO-RELACIONAMENTO DA TB_ORGANIZAÇÃO*  */

  //$query = "SELECT id_organizacao, id_tipo_org, id_organizacao_pai, nome_org FROM tb_organizacao ORDER BY nome_org;";
  $query = "SELECT id_organizacao, id_tipo_org, id_organizacao_pai, nome_org FROM tb_organizacao ORDER BY nome_org;";  
  $stmt = $conn->prepare($query);
  
  $stmt->execute();
        
      echo "<select name=\"id_organizacao_pai\" class='col-25'>";     // insere o conteúdo dentro do campo
      echo '<option default value="">Organização-Pai</option>';
      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id_organizacao = $row["id_organizacao"];
          $id_tipo_org = $row["id_tipo_org"];          
          $id = $row["id_organizacao_pai"];
          $nome_org = $row["nome_org"]; 
          $id_pai = $row["id_organizacao_pai"];
          
      echo "<option value=\"$id\" $selected>";
      echo  $nome_org . '</option >';
    }
          #echo "</select>";
  
    
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}






# divFormOrg2

#########
// função para ler o telefone da organizacao cadastrada na tb_organizacao para posterior alteração
// FUNCIONANDO PERFEITAMENTE
function compara_telfixo_org($conn, $id_organizacao_sel=0){

try {
  $row = array();

  $query = "SELECT id_organizacao, tel_fixo_org, tel_cel_org FROM tb_organizacao WHERE id_organizacao = $id_organizacao_sel;";
  //$query = "SELECT id_organizacao, tel_fixo_org FROM tb_organizacao WHERE id_organizacao = $id;";
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {

      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id = $row["id_organizacao"];
          $tel_fixo_org = $row["tel_fixo_org"];
          #$tel_cel_org = $row["tel_cel_org"];
           
          if ($id == $id_organizacao_sel) {
              $selected = "selected";
          }
          
        echo $tel_fixo_org;
        #echo $tel_cel_org;
   
    $stmt->bindValue(":tel_fixo_org", $id, PDO::PARAM_INT); 
    #$stmt->bindValue(":tel_cel_org", $id, PDO::PARAM_INT);
          return $row;
          
      }
  }  
  
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}


#########
// função para ler o telefone da organizacao cadastrada na tb_organizacao para posterior alteração
// FUNCIONANDO PERFEITAMENTE
function compara_telcel_org($conn, $id_organizacao_sel=0){

try {
  $row = array();

  $query = "SELECT id_organizacao, tel_cel_org FROM tb_organizacao WHERE id_organizacao = $id_organizacao_sel;";
  //$query = "SELECT id_organizacao, tel_fixo_org FROM tb_organizacao WHERE id_organizacao = $id;";
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {

      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id = $row["id_organizacao"];
          #$tel_fixo_org = $row["tel_fixo_org"];
          $tel_cel_org = $row["tel_cel_org"];
           
          if ($id == $id_organizacao_sel) {
              $selected = "selected";
          }
          
        #echo $tel_fixo_org;
        echo $tel_cel_org;
   
    $stmt->bindValue(":tel_cel_org", $id, PDO::PARAM_INT);      
          return $row;
          
      }
  }  
  
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}





#########
// função para ler o email da organizacao cadastrada na tb_organizacao para posterior alteração
// FUNCIONANDO PERFEITAMENTE
function compara_email_org($conn, $id_organizacao_sel=0){

try {
  $row = array();

  $query = "SELECT id_organizacao, email_org FROM tb_organizacao WHERE id_organizacao = $id_organizacao_sel;";
  //$query = "SELECT id_organizacao, email_org FROM tb_organizacao WHERE id_organizacao = $id;";
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {

      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id = $row["id_organizacao"];
          $email_org = $row["email_org"];
           
          if ($id == $id_organizacao_sel) {
              $selected = "selected";
          }

        echo $email_org;
   
    $stmt->bindValue(":email_org", $id, PDO::PARAM_INT);      
          return $row;
          
      }
  }  
  
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}










# divFormOrg3

#########
// função para ler o cep da organizacao cadastrada na tb_organizacao para posterior alteração
// FUNCIONANDO PERFEITAMENTE
function compara_cep_org($conn, $id_organizacao_sel=0){

try {
  $row = array();

  $query = "SELECT id_organizacao, CEP_org FROM tb_organizacao WHERE id_organizacao = $id_organizacao_sel;";
  //$query = "SELECT id_organizacao, CEP_org FROM tb_organizacao WHERE id_organizacao = $id;";
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {

      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id = $row["id_organizacao"];
          $CEP_org = $row["CEP_org"];
           
          if ($id == $id_organizacao_sel) {
              $selected = "selected";
          }

        echo $CEP_org;
   
    $stmt->bindValue(":CEP_org", $id, PDO::PARAM_INT);      
          return $row;
          
      }
  }  
  
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}







#########
// função para ler o estado da organizacao cadastrada na tb_organizacao para posterior alteração
// FUNCIONANDO melhor: aparecem as UFs, mas nao o que foi guardado (porque não está armazenado em tb_organizacao)
function compara_uf_org($conn, $id_organizacao_sel=0){

try {
  $row = array();

  $query = "SELECT id_UF, nome_UF FROM tb_uf ORDER BY nome_UF";
    //$query = "SELECT id_organizacao, CEP_org FROM tb_organizacao WHERE id_organizacao = $id;";
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {

      #echo "<select name=\"id_uf\" class='col-25'>";
      echo '<option default value="">UF</option>';
      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id = $row["id_UF"];
          $nome_UF = $row["nome_UF"];
                   
          if ($id == $id_organizacao_sel) {
              $selected = "selected";
          }

    /*      echo "<option>";
          //echo $row["nome_UF"] . "</option>";         // só aparece Acre
          return $row;
          echo "</option>"; */
          
          echo "<option value=\"$id\" $selected>";
          echo $nome_UF . '</option>';
                #echo "<option>" . $row["nome_UF"] . "</option>";      // é outra opção de como escrever

          
    #$stmt->bindValue(":NONON_org", $id, PDO::PARAM_INT);      
          #return $row;
          
      }
      #echo "</select>";
  }  
  
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}








#########
// função para ler o cidade da organizacao cadastrada na tb_organizacao para posterior alteração
// FUNCIONANDO PARCIALMENTE - Obtendo dados do BD, mas nao está mostrando o resultado nem a lista 
// obter desc_cidade da tb_cidade a partir do id_cidade_org da tb_organizacao
function compara_cidade_org6($conn, $id_organizacao_sel=0){

try {
  $row = array();
  
  $query = "SELECT tb_organizacao.id_organizacao, tb_organizacao.id_cidade_org, tb_cidade.id_cidade, tb_cidade.desc_cidade
      FROM tb_organizacao INNER JOIN tb_cidade 
      ON tb_cidade.id_cidade = tb_organizacao.id_cidade_org 
      WHERE id_organizacao = $id_organizacao_sel;";
  
  //$query = "SELECT id_organizacao, id_cidade_org FROM tb_organizacao WHERE id_organizacao = $id_organizacao_sel;";
    //$query = "SELECT id_organizacao, CEP_org FROM tb_organizacao WHERE id_organizacao = $id;";
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {

      #echo "<select name=\"id_cidade_org\" class='col-50'>";     // insere o conteúdo dentro do campo
      #echo '<option default value="">Brasília</option>';

      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id = $row["id_organizacao"];
          $id_cidade_org = $row["id_cidade_org"];
          $desc_cidade = $row["desc_cidade"];
           
          if ($id == $id_organizacao_sel) {
              $selected = "selected";
          }

        echo "<option value=\"$id\" $selected>";
        echo $desc_cidade . '</option>';
        #echo "<option>" . $row["desc_cidade"] . "</option>";

      }
      $stmt->bindValue(":id_cidade_org", $id, PDO::PARAM_INT);      
      #return $row;
      #echo "</select>";
  }  
  
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}





#########
// função para ler as cidades da tb_cidade e inserir no cadastro
function le_cidade2($conn, $id_cidade_sel=0){

try {
  $row = array();

  //$query = "SELECT id_cidade, desc_cidade FROM tb_cidade;";
  $query = "SELECT id_cidade, desc_cidade FROM tb_cidade ORDER BY desc_cidade;";
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {
        
      echo "<select name=\"cidade\" class='col-50'>";     // insere o conteúdo dentro do campo
      echo '<option default value="">Cidades</option>';
      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id = $row["id_cidade"];
          $desc_cidade = $row["desc_cidade"]; 
          if ($id == $id_cidade_sel) {
              $selected = "selected";
          }
          
      echo "<option value=\"$id\" $selected>";
      echo  $desc_cidade . '</option >';
    }
    $stmt->bindValue(":id_cidade", $id, PDO::PARAM_INT);      
          return $row;
          echo "</select>";
  }  
  
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}






#########
// função para ler o logradouro da organizacao cadastrada na tb_organizacao para posterior alteração
// FUNCIONANDO PERFEITAMENTE
function compara_logradouro_org($conn, $id_organizacao_sel=0){

try {
  $row = array();

  $query = "SELECT id_organizacao, logradouro_org FROM tb_organizacao WHERE id_organizacao = $id_organizacao_sel;";
  //$query = "SELECT id_organizacao, CEP_org FROM tb_organizacao WHERE id_organizacao = $id;";
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {

      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id = $row["id_organizacao"];
          $logradouro_org = $row["logradouro_org"];
           
          if ($id == $id_organizacao_sel) {
              $selected = "selected";
          }

        echo $logradouro_org;
   
    $stmt->bindValue(":logradouro_org", $id, PDO::PARAM_INT);      
          return $row;
          
      }
  }  
  
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}




#########
// função para ler o numero do logradouro da organizacao cadastrada na tb_organizacao para posterior alteração
// FUNCIONANDO PERFEITAMENTE
function compara_num_org($conn, $id_organizacao_sel=0){

try {
  $row = array();

  $query = "SELECT id_organizacao, num_org FROM tb_organizacao WHERE id_organizacao = $id_organizacao_sel;";
  //$query = "SELECT id_organizacao, CEP_org FROM tb_organizacao WHERE id_organizacao = $id;";
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {

      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id = $row["id_organizacao"];
          $num_org = $row["num_org"];
           
          if ($id == $id_organizacao_sel) {
              $selected = "selected";
          }

        echo $num_org;
   
    $stmt->bindValue(":num_org", $id, PDO::PARAM_INT);      
          return $row;
          
      }
  }  
  
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}




#########
// função para ler o complemento do logradouro da organizacao cadastrada na tb_organizacao para posterior alteração
// FUNCIONANDO PERFEITAMENTE
function compara_complemento_org($conn, $id_organizacao_sel=0){

try {
  $row = array();

  $query = "SELECT id_organizacao, complemento_org FROM tb_organizacao WHERE id_organizacao = $id_organizacao_sel;";
  //$query = "SELECT id_organizacao, CEP_org FROM tb_organizacao WHERE id_organizacao = $id;";
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {

      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id = $row["id_organizacao"];
          $complemento_org = $row["complemento_org"];
           
          if ($id == $id_organizacao_sel) {
              $selected = "selected";
          }

        echo $complemento_org;
   
    $stmt->bindValue(":complemento_org", $id, PDO::PARAM_INT);      
          return $row;
          
      }
  }  
  
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}





#########
// função para ler o bairro da organizacao cadastrada na tb_organizacao para posterior alteração
// FUNCIONANDO PERFEITAMENTE
function compara_bairro_org($conn, $id_organizacao_sel=0){

try {
  $row = array();

  $query = "SELECT id_organizacao, bairro_org FROM tb_organizacao WHERE id_organizacao = $id_organizacao_sel;";
  //$query = "SELECT id_organizacao, CEP_org FROM tb_organizacao WHERE id_organizacao = $id;";
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {

      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id = $row["id_organizacao"];
          $bairro_org = $row["bairro_org"];
           
          if ($id == $id_organizacao_sel) {
              $selected = "selected";
          }

        echo $bairro_org;
   
    $stmt->bindValue(":bairro_org", $id, PDO::PARAM_INT);      
          return $row;
          
      }
  }  
  
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}








#########
// função para ler as cidades da tb_cidade e inserir no cadastro
function le_cidade5($conn, $id_cidade_sel=0){

try {
  $row = array();

  $query = "SELECT id_cidade, desc_cidade FROM tb_cidade ORDER BY desc_cidade;";
  $stmt = $conn->prepare($query);
  
  if ($stmt->execute()) {
        
      echo "<select name=\"cidade\" class='col-50'>";     // insere o conteúdo dentro do campo
      #echo '<option default value="">Cidades</option>';
      // busca os dados lidos do banco de dados
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $selected = "";
          $id = $row["id_cidade"];
          $desc_cidade = $row["desc_cidade"]; 
          if ($id == $id_cidade_sel) {
              $selected = "selected";
          }
          
      echo "<option value=\"$id\" $selected>";
      echo  $desc_cidade . '</option >';
    }
    $stmt->bindValue(":id_cidade", $id, PDO::PARAM_INT);      
          return $row;
          echo "</select>";
  }  
  
} catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}


?>