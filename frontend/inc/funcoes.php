<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * funcoes.php
 * Funçoes utilizadas p/ cadastro das organizações
 */


function le_UF($conn, $id_UF){  
try {    
  $row = array();
  $query = "SELECT id_UF, nome_UF FROM tb_uf where id_UF = $id_UF;";
  $stmt = $conn->prepare($query);
  $stmt->bindValue(":id_UF", $id_UF, PDO::PARAM_STR);
  $stmt->execute();

# echo "<select name=\"id_curso\" onchage=\"obterCurso(str)\">";    // ????? - p/ obter em Ajax
  
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  return $row;  
  
  } catch (PDOException $e) {
      echo "Erro: ". $e->getMessage();
  }
}




?>