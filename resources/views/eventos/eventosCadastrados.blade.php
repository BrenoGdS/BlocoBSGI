<html>
    <!-- \login\form_login.php -->
<html lang="pt-br">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    

    <!-- Link estilos-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--<link href="..\css\estilos.css" rel="stylesheet">-->    
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">

    <!--CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    

    <title> BSGI - Eventos </title>

    </head>
    
<body>
    @yield('conteudo')
    <header>
        
  	    <div id="cab_esq">
            <!--<img class="contain" src="..\img\BSGI-logo3c.png" align=left width="99%">-->
            <img src="{{ Storage::url('/BSGI-logo3c.png')}}" align=left width="99%">
               </div>
        <!--<div id="cab_central"> 
            <a>Nome do Usuário</a>
        </div> -->
        <div id="cab_dir">
        <!-- novos icones azuis -->    
                <!-- <a href="../user"><img src="..\img\ic-users-b2-128.png" height="10%" ></a> -->
                <a href="../user"><img src="{{ Storage::url('/ic-users-b2-128.png')}}" height="10%" >
                <!--<a href="http://www.bsgi.org.br/quemsomos/historia_da_soka_gakkai_no_brasil/"><img src="..\img\ic-information-b2-128.png" height="9%" ></a>-->
                <a href="http://www.bsgi.org.br/quemsomos/historia_da_soka_gakkai_no_brasil/"><img src="{{ Storage::url('/ic-information-b2-128.png')}}" height="9%" ></a>
                <!--<a href="https://www.instagram.com" target="_blank"><img src="..\img\ic-instagram-b2-128.png" height="8.1%" ></a>-->
                <a href="https://www.instagram.com" target="_blank"><img src="{{ Storage::url('/ic-instagram-b2-128.png')}}" height="8.1%" ></a>
                <!--<a href="https://www.facebook.com/" target="_blank"><img src="..\img\ic-facebook-b2-128.png" height="8.1%"></a>-->
                <a href="https://www.facebook.com/" target="_blank"><img src="{{ Storage::url('/ic-facebook-b2-128.png')}}" height="8.1%"></a>
                <!--<a href="http://localhost/frontend/index.php"><img src="..\img\ic-home-b2-128.png" height="9%"></a>-->
                <a href="{{ url('/frontend')}}"><img src="{{ Storage::url('/ic-home-b2-128.png')}}" height="9%"></a>
        </div>
    </header>
    
    <section id="barra"> </section>
    <section id="main">
        <h1 class="titulo">Cadastro de Eventos</h1>
        
    <!-- *** FORMULÁRIO PARA INSERÇÃO DE DADOS *** -->
  <!--  <form id="formulario" action="insercao_organizacao-v1.4.php" method="GET">-->
        <!--
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
                background-color: 4f6367;  /* era #4CAF50 */
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
                background-color: #4f6367;
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
            
            /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
            @media screen and (max-width: 600px) {
            .col-25, .col-50, input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
            }
        </style>
        -->
		<div class="row">                
                
            </div>
            <br>            
            <div class="destaque1">
            @section('content')
            
    <?php
    //cadastro.php
    // lista cursos cadastrados  
    
                /*
                include_once "../inc/conectabd.php";

                $sql = 'SELECT * FROM tb_evento';
                $stmt = $conn->query($sql);
                 
                */
                ?>
               
                <table class="table table-bordered table-striped">
                    <thead style="text-align: center;">
                    <th>Id</th>                    
                                    <th>Org</th>
                                    <th>Tipo</th>
                    <th>Titulo</th>
                                    <th>Data/Hora Evento</th>
                    <th>Cep</th>
                                    <th>Cidade</th>
                    <th>Logradouro</th>
                    <th>Nº</th>
                                    <th>Complemento</th>
                    <th>Bairro</th>
                                     <!--    <th>Ações</th>-->
                    <th style="width: 40px;">Ações</th>
                    </thead>
                    
                    <tbody>
                        @foreach($eventos as $evento)
                        <tr>
                            <td>{{ $evento->id }}</td>
                            <td></td>
                            <!--<td>{{-- $evento->id_organizacao --}}</td>-->
                            <td></td>
                            <!--<td>{{-- $evento->id_tipo_evento --}}</td>-->
                            <td>{{ $evento->titulo }}</td>
                            <td>{{ $evento->data_evento }}</td>
                            <td>{{ $evento->CEP_evento }}</td>
                            <td></td>
                            <!--<td>{{-- $evento->id_cidade_evento --}}</td>-->
                            <td>{{ $evento->logradouro_evento }}</td>
                            <td>{{ $evento->num_evento }}</td>                            
                            <td>{{ $evento->complemento_evento }}</td>
                            <td>{{ $evento->bairro_evento }}</td>
                            
                            <td>
                                <ul class="list-inline">
                                    <li>
                                     <!--   <a href="form_alteracao.php?id=<?php/* = $row['id_evento'] */?>">Editar</a>-->
                                        <!--<a href="{{-- url('/eventos/create/?id=') --}}">Editar</a>-->
                                        <!--<a href="{{-- url('/eventos/edit/?id=') --}}">Editar</a>-->
                                        <!-- não consegue converter array em string -->
                                        <!--<a href="{{-- route('eventos.edit', ['evento' => $evento]) --}}">Editar</a>-->
                                        <!--<a href="{{ route('eventos.edit', ['$evento']) }}">Editar</a> estava ativo -->
                                        <a href="{{ route('editarEvento', ['id'=>$evento->id]) }}"
                                           title="Editar {{ $evento->titulo }}" >Editar</a>
                                    </li>
                                    <li>
                                     <!--   <a href="exclusao.php?id=<?php/* = $row['id_evento'] */?>">Excluir</a>-->
                                        <!--<a href="exclusao.php?id=">Excluir</a> estava ativo -->
                                        <a href="{{ route('excluirEvento', ['id'=>$evento->id]) }}"
                                           title="Excluir {{ $evento->titulo }}" >Excluir</a>
                                    </li>
                                </ul>
                            </td>                            
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                <!--/@endsession -->
                    
                    
                    <!-- COMO ESTAVA NA VERSÃO ANTERIOR, COM PHP:
                    <tbody>
                        <?php 
                            /*
                            foreach ($conn->query($sql) as $row) {
                             
                            ?>
                            <tr>
                                <td><?= $row['id_evento'] ?></td>
                                <td><?= $row['id_organizacao'] ?></td>
                                <td><?= $row['id_tipo_evento'] ?></td>
                                <td><?= $row['titulo'] ?></td>
								<td><?= $row['data_evento'] ?></td>
                                <td><?= $row['CEP_evento'] ?></td>
                                <td><?= $row['id_cidade_evento'] ?></td>
                                <td><?= $row['logradouro_evento'] ?></td>
								<td><?= $row['num_evento'] ?></td>
                                <td><?= $row['complemento_evento'] ?></td>
                                <td><?= $row['bairro_evento'] ?></td>
                                <td> <a href="form_alteracao.php?id=<?= $row['id_evento'] ?>">Editar</a>&nbsp;&nbsp;&nbsp;<a href="exclusao.php?id=<?= $row['id_evento'] ?>">Excluir</a></td>
                            </tr>                            
                            <?php
                        }
                        */
                        ?>
                    </tbody> 
                    
                </table> -->
            
	<br>

        <!-- Botões -->
        <!--<a href="form_insercao.php">-->
        <a href="{{ url('/eventos/create')}}">
	<button style="background: #1a66e0	; border-radius: 6px; 
	padding: 8px; cursor: pointer; color: #fff; border: none; font-size: 16px;">Cadastrar novo Evento</button></a>

        <a href="geraPDF_eventos.php">
	<button style="background: #4f6367; border-radius: 6px; 
	padding: 8px; cursor: pointer; color: #fff; border: none; font-size: 16px;">Gerar PDF</button></a>	
	
	<!--<a href="http://localhost/frontend/index.php">-->
        <a href="{{ url('/frontend')}}">
	<button style="background: #4f6367; border-radius: 6px; 
	padding: 8px; cursor: pointer; color: #fff; border: none; font-size: 16px;">Voltar ao início</button></a>
            
           
        
    </body>
</html>