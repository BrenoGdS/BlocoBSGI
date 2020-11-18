<?php

// endereço do servidor onde roda o banco de dados: localhost
// usuário: root
// senha: neste caso, vazia 
// base de dados: blocobsgi
try {  
    $conn = new PDO('mysql:host=localhost;port=3306;dbname=blocobsgi', "root", "");    
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {    
    echo 'ERROR: ' . $e->getMessage();
}

?>