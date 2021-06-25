<!HTML>
<!-- modeloGeralTemplate.php
     Template do layout geral das páginas - RENOMEIE PARA O NOME DO ARQUIVO QUE VOCÊ FOR USAR
<!-- versao 4.0 - baseado no design feito no Figma -->

<html lang="pt-br">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

    <title> BSGI </title>
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
        <div>        
        {{-- section('content') --}}
        
            <br>            
            <h4>Operação realizada com sucesso!</h4>
            <br>
        
            
            <a href="{{ url('/eventos')}}" title="Voltar" >Voltar para Eventos Cadastrados</a>            
        </div>        
        {{-- endsection --}}
    
    
    
    </body>
</html>