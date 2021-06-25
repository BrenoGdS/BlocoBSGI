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

    <title> BSGI - Eventos-edit </title>

    </head>
    
<body>
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
        </style>
        -->

        <div id="divform">
            <!-- área central da página -->
            
        </div>    
        
        
    <?php
        # cria conexão com banco de dados
    /*
        include_once "../inc/conectabd.php"; // ativar o database     
     */
    
        ?>
        
        {{-- section('content') --}}
        <div class="container">
            <div class="row">
            <!--<form action="insercao.php"  method="GET" style="margin: 6%">-->
            
        <!--<form action="{ route('salvarEvento')}"  method="POST" style="margin: 6%"> <!--Funcionou parcialmente -->
        <!--<form action="{ action('salvarEvento')}"  method="POST" style="margin: 6%">-->
        <!--<form action="{ url('/novo')}"  method="POST" style="margin: 6%">-->
        
        <form action="{{-- route('atualizarEvento', ['id'->$evento->id ]) --}}"  method="POST" style="margin: 6%">
            
        <!--<form action="{{-- route('evento.update', ['evento' => $evento ]) --}}"  method="POST" style="margin: 6%">-->
        <!--<form action="{{-- route('eventos.edit', ['evento']) --}}"  method="POST" style="margin: 6%">-->
        <!--<form action="{{-- route('evento.update', ['evento' => $evt ]) --}}"  method="POST" style="margin: 6%">-->
                
        
        
            @csrf
            {{-- method('PUT') --}}
            {{-- foreach($eventos as $evento) --}}
            {{-- $eventos = DB::select('select * from eventos') --}}
            
            <!--<input type="hidden" id="redirect_to" name="redirect_to" value="{{ URL::previous() }}">-->
            <!--<input type="hidden" id="id" name="id" value="{{-- $evt->id --}}">-->
                
                
                <div class="col-sm">
                    <!--<label class="label-index" for="organizacao" id="organizacao">-->
                    <label class="label-index" for="organizacao" id="organizacao"
                           value="{{-- $evento->titulo --}}">
                    Organizacao:
                    </label>
                        <?php
                        /*
                        try{
                          include_once "../inc/conectabd.php";
                            $query = "SELECT id_organizacao , nome_org FROM tb_organizacao ORDER BY nome_org;";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            echo "<select name=\"organizacao\">";
                            echo '<option default value="">SELECIONE</option>';
                            // busca os dados lidos do banco de dados
                            while ($row = $stmt->fetch(PDO:: FETCH_ASSOC)) {
                                $id = $row["id_organizacao"];
                                $curso = $row["nome_org"];
                                         
                                echo "<option value=\"$id\">";
                                echo  $curso . '</option>';
                            }
                            echo "</select>";
                        } catch(PDOExeception $e){
                            echo "Erro: ".$e -> getMessage();
                        }
                         
                        */
                        ?>
        </div>

        <div class="col-sm">
        <label class="label-index" for="tipo" id="tipo" name="tipo" value="{{-- $evt->tipo --}}">
            Tipo de Evento:
        </label>
                        <?php
                        /*
                        try{
                          include_once "../inc/conectabd.php";
                            $query = "SELECT id_tipo_evento , desc_tipo_evento FROM tb_tipo_evento ORDER BY desc_tipo_evento;";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            echo "<select name=\"tipo\">";
                            echo '<option default value="">SELECIONE</option>';
                            // busca os dados lidos do banco de dados
                            while ($row = $stmt->fetch(PDO:: FETCH_ASSOC)) {
                                $id = $row["id_tipo_evento"];
                                $curso = $row["desc_tipo_evento"];
                                        // <option value="1">Anal. Des. Sist</option> 
                                echo "<option value=\"$id\">";
                                echo  $curso . '</option>';
                            }
                            echo "</select>";
                        } catch(PDOExeception $e){
                            echo "Erro: ".$e -> getMessage();
                        }
                         * 
                         */  
                        ?>
        </div>


        <div class="col-sm">
          <label for="titulo">Titulo</label>
          <input type="text" class="form-control" name="tit" id="tit"
                 value="{{-- $evento->titulo --}}"><br>
        </div>
        </div>
  </div>

  <div class="container">
  <div class="row">
    <div class="col-sm">
          <label for="data_evento">Data do Evento</label>
          <input type="datetime-local" class="form-control" name="data" id="data"><br>
        </div>
        

        <div class="col-sm">
          <label for="CEP_evento">CEP</label>
          <input type="text" class="form-control" name="cep" id="cep" value="" onblur="pesquisacep(this.value);"><br>
        </div>

       

        <div class="col-sm">
        <label class="label-index" for="cidade" id="cidade">
                        Cidade:
                        </label>
                        <?php //cadastro.php
                        // lista Alunos cadastrados
                        /*
                        try{
                          include_once "../inc/conectabd.php";
                            $query = "SELECT id_cidade, desc_Cidade FROM tb_cidade ORDER BY desc_cidade;";
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
                         * 
                         */  
                        ?>
        </div>
        </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm">
          <label for="logradouro_evento">Endereço</label>
          <input type="text" class="form-control" name="logradouro" id="logradouro"><br>
        </div>

        <div class="col-sm-1">
          <label for="num_evento">Nº</label>
          <input type="number: min=0 max=99" class="form-control" name="num" id="num"><br>
        </div>

        <div class="col-sm">
          <label for="complemento_evento">Complemento</label>
          <input type="text" class="form-control" name="complemento" id="complemento"><br>
        </div>
        </div>
</div>

      
<div class="container">
  <div class="row">
    <div class="col-sm-4">
          <label for="bairro_evento">Bairro</label>
          <input type="text" class="form-control" name="bairro" id="bairro"><br>
        </div>
        </div>
        </div>      
        
    <!-- Se não precisar do botão, retirar essa parte -->
    <input type="submit" value="Cadastrar" class="btn btn-primary btn-sm">
    <input type="reset" value="Limpar" class="btn btn-primary btn-sm">
    {{-- @endforeach --}}
    
    </form>
  
{{-- endsection --}}
</body>
</html>




<script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('logradouro').value=("");
            document.getElementById('complemento').value=("");
            document.getElementById('bairro').value=("");
            
            
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('logradouro').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);

        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('logradouro').value="...";
                document.getElementById('bairro').value="...";


                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>
