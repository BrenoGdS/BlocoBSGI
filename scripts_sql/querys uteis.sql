/*listar eventos por organização:*/

SELECT
    org.nome_org, org.tel_fixo_org, org.tel_cel_org, org.email_org, org.CEP_org, org.logradouro_org, org.num_org, org.complemento_org, org.bairro_org,
    evt.titulo,DATE_FORMAT(evt.data_evento, "%d/%c/%Y %Hh"),evt.CEP_evento,evt.logradouro_evento,evt.num_evento,evt.complemento_evento,evt.bairro_evento,
    estadoOrg.nome_UF as nome_UF_Org,
    cidadeOrg.desc_cidade as desc_cidade_Org,
    estadoEvt.nome_UF as nome_UF_Evt,
    cidadeEvt.desc_cidade as desc_cidade_Evt,
    tipoOrg.desc_tipo_org,
    tipoEvt.desc_tipo_evento FROM Tb_Organizacao org left join Tb_Evento evt on org.id_organizacao = evt.id_organizacao 
                                                    left join Tb_Tipo_Organizacao tipoOrg on tipoOrg.id_tipo_org = org.id_tipo_org 
                                                    left join Tb_Tipo_Evento tipoEvt on tipoEvt.id_tipo_evento = evt.id_tipo_evento 
                                                    left join Tb_Cidade cidadeOrg on org.id_cidade_org = cidadeOrg.id_cidade
                                                    left join Tb_UF estadoOrg on cidadeOrg.id_UF = estadoOrg.id_UF
                                                    left join Tb_Cidade cidadeEvt on evt.id_cidade_evento = cidadeEvt.id_cidade
                                                    left join Tb_UF estadoEvt on cidadeEvt.id_UF = estadoEvt.id_UF
    WHERE 1=1
    '.($nomeOrganizacao != '' ? ' AND org.nome_org LIKE '. "'%" . $nomeOrganizacao . "%'" : '')
     .($nomeAtividade != '' ? ' AND evt.titulo LIKE '. "'%" . $nomeAtividade . "%'" : '')
     .($dataCalendario != '' ? ' AND evt.data_evento = '. "'" . $dataCalendario . "'" : '')
     .($estado != '' ? ' AND cidadeOrg.id_UF = '. $estado : '')
     .($cidade != '' ? ' AND org.id_cidade_org = '. $cidade : '')
     .($estado != '' ? ' AND cidadeEvt.id_UF = '. $estado : '')
     .($cidade != '' ? ' AND cidadeEvt.id_cidade = '. $cidade : '')     
     .($nomeendereco != '' ? ' AND org.logradouro_org LIKE '. "'%" . $nomeendereco . "%'" : '')     
     .($nomeendereco != '' ? ' AND org.bairro_org LIKE '. "'%" . $nomeendereco . "%'" : '');
