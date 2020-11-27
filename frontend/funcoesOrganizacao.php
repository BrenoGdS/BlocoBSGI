
<?php
    // municipio.php

    // observar que recebe como parâmetro a uf=SP ou uf=RJ

    /* $uf = $_GET["uf"]; */

    $nomeOrganizacao = $_GET["nomeOrganizacao"];
    $nomeAtividade = $_GET["nomeAtividade"];
    $dataCalendario = $_GET["dataCalendario"];
    $estado = $_GET["estado"];
    $cidade = $_GET["cidade"];
    $nomeendereco = $_GET["nomeendereco"];

    try{
        include_once "src/inc/conectabd.php";
       
        $teste = 'SELECT';
        $Percent = '%';
        $query = 'SELECT 
        org.id_organizacao, org.nome_org, org.tel_fixo_org, org.tel_cel_org, org.email_org, org.CEP_org, org.logradouro_org, org.num_org, org.complemento_org, org.bairro_org,
        estadoOrg.nome_UF as nome_UF_Org,
        cidadeOrg.desc_cidade as desc_cidade_Org,
        tipoOrg.desc_tipo_org FROM Tb_Organizacao org left join Tb_Tipo_Organizacao tipoOrg on tipoOrg.id_tipo_org = org.id_tipo_org 
                                                      left join Tb_Cidade cidadeOrg on org.id_cidade_org = cidadeOrg.id_cidade
                                                      left join Tb_UF estadoOrg on cidadeOrg.id_UF = estadoOrg.id_UF
        WHERE 1=1
        '.($nomeOrganizacao != '' ? ' AND org.nome_org LIKE '. "'%" . $nomeOrganizacao . "%'" : '')
        .($estado != '' ? ' AND cidadeOrg.id_UF = '. $estado : '')
        .($cidade != '' ? ' AND org.id_cidade_org = '. $cidade : '')    
        .($nomeendereco != '' ? ' AND org.logradouro_org LIKE '. "'%" . $nomeendereco . "%'" : '')     
        .($nomeendereco != '' ? ' AND org.bairro_org LIKE '. "'%" . $nomeendereco . "%'" : '');
        
        $stmt = $conn->prepare($query);
        $stmt->execute();

        echo '<div class="div-titulo-listagem-organizacao"> <p> <b> <i>Resultados Encontrados <i> <b></p> </div>';
        while ($row = $stmt->fetch(PDO:: FETCH_ASSOC)) {
            $id_organizacao = $row["id_organizacao"];
            $nome_org = $row["nome_org"];
            $tel_fixo_org = $row["tel_fixo_org"];
            $tel_cel_org = $row["tel_cel_org"];
            $email_org = $row["email_org"];
            $CEP_org = $row["CEP_org"];
            $logradouro_org = $row["logradouro_org"];
            $num_org = $row["num_org"];
            $complemento_org = $row["complemento_org"];
            $bairro_org = $row["bairro_org"];
            $nome_UF_Org = $row["nome_UF_Org"];
            $desc_cidade_Org = $row["desc_cidade_Org"];
            $desc_tipo_org = $row["desc_tipo_org"];

            echo '<div>
                <div class="div-titulo-organizacao"> <center> <p> <b> <i>' .$desc_tipo_org. ' ' .$nome_org . '<i> <b></p> </center> </div>
                    <div class="div-resultado-organizacao">
                        <div class="div-titulo-organizacao"> <center> <p> <b> <i>Informações <i> <b></p> </center> </div>
                        <div class="div-eventos-organizacao"> <p> <i> '.$desc_cidade_Org.' - ' .$nome_UF_Org. ', ' .$logradouro_org. ', '.$num_org.', '.$complemento_org.', '.$bairro_org.' <br>
                                                                    Telefones: '.$tel_fixo_org.' - '.$tel_cel_org.' <br>
                                                                    Email: '.$email_org.' <i> </p>
                        </div>
                    </div>
                    <div class="div-resultado-organizacao">
                        <div class="div-titulo-organizacao"> <center> <p> <b> <i>Programação <i> <b></p> </center> </div>
                        <div class="div-eventos-organizacao"> <p> <i>'. recuperarEventos($id_organizacao, $nomeAtividade, $dataCalendario).
                                                                     ' <i> </p>
                        </div>
                    </div>
                </div>';

        }

    } catch(PDOExeception $e){
        echo "Erro: ".$e -> getMessage();
    }  

    function recuperarEventos($id_organizacao, $nomeAtividade, $dataCalendario) {

        try {  
            $con = new PDO('mysql:host=localhost;port=3306;dbname=blocobsgi', "root", "");    
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            $query = 'SELECT
                        evt.titulo,DATE_FORMAT(evt.data_evento, "%d/%c/%Y %Hh") as data_evento,evt.CEP_evento,evt.logradouro_evento,evt.num_evento,evt.complemento_evento,evt.bairro_evento,
                        estadoEvt.nome_UF as nome_UF_Evt,
                        cidadeEvt.desc_cidade as desc_cidade_Evt,
                        tipoEvt.desc_tipo_evento FROM Tb_Organizacao org inner join Tb_Evento evt on org.id_organizacao = evt.id_organizacao 
                                                                        inner join Tb_Tipo_Organizacao tipoOrg on tipoOrg.id_tipo_org = org.id_tipo_org 
                                                                        inner join Tb_Tipo_Evento tipoEvt on tipoEvt.id_tipo_evento = evt.id_tipo_evento 
                                                                        inner join Tb_Cidade cidadeOrg on org.id_cidade_org = cidadeOrg.id_cidade
                                                                        inner join Tb_UF estadoOrg on cidadeOrg.id_UF = estadoOrg.id_UF
                                                                        inner join Tb_Cidade cidadeEvt on evt.id_cidade_evento = cidadeEvt.id_cidade
                                                                        inner join Tb_UF estadoEvt on cidadeEvt.id_UF = estadoEvt.id_UF
                        WHERE 1=1
                        '.($id_organizacao != '' ? ' AND org.id_organizacao = '. $id_organizacao : '')
                        .($nomeAtividade != '' ? ' AND evt.titulo LIKE '. "'%" . $nomeAtividade . "%'" : '')
                        .($dataCalendario != '' ? ' AND MONTH(evt.data_evento) = MONTH('. "'" . $dataCalendario . "')" : '')
                        .($dataCalendario != '' ? ' AND YEAR(evt.data_evento) = YEAR('. "'" . $dataCalendario . "')" : '')
                        .' LIMIT 3';
        
            $stmt = $con->prepare($query);
            $stmt->execute();
            
            $retorno = '';
            $count = 0;
            while ($row = $stmt->fetch(PDO:: FETCH_ASSOC)) {
                $titulo = $row["titulo"];
                $data_evento = $row["data_evento"];
                $CEP_evento = $row["CEP_evento"];
                $logradouro_evento = $row["logradouro_evento"];
                $num_evento = $row["num_evento"];
                $complemento_evento = $row["complemento_evento"];
                $bairro_evento = $row["bairro_evento"];
                $nome_UF_Evt = $row["nome_UF_Evt"];
                $desc_cidade_Evt = $row["desc_cidade_Evt"];
                $desc_tipo_evento = $row["desc_tipo_evento"];

                $retorno = $retorno . '- '.$data_evento.'  '.$titulo.' <br>';
                $count++;
            }
        } catch(PDOException $e) {    
            echo 'ERROR: ' . $e->getMessage();
        }
        if($count == 0){
            return '<br><br><br>+ Clique aqui para detalhar';
        }else if($count == 1){
            return $retorno.'<br><br>+ Clique aqui para detalhar';
        }else if($count == 2){
            return $retorno.'<br>+ Clique aqui para detalhar';
        }
        return $retorno. '+ Clique aqui para detalhar';
    }




?>