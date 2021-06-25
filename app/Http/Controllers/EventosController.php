<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Evento;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //tem outras coisas no arquivo anterior
        
        //novo
        // Problema: DB::select sempre retorna um array
        
            //$eventos = DB::table('eventos')->get(); //não deu certo
        #$eventos = DB::select('select * from eventos');
        $eventos = Evento::all();
        foreach ($eventos as $evento) {
            //echo $evento->titulo;  // traz só o título
            return view('eventos.eventosCadastrados', compact('eventos'));            
        }                
        
        #return view('eventos.eventosCadastrados'); //funcionando
        
        
        /*
        $eventos = Evento::all();
        return view('eventos.eventosCadastrados', compact('eventos'));        
        */
    }
    
    

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //tem outras coisas no arquivo anterior
        return view('eventos.form_insercao'); // melhor
    }
    
    

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // método3 - Larback        
        Evento::create([
            'titulo'=> $request->tit,
            'data_evento'=> $request->data,
            'CEP_evento'=> $request->cep,
            'logradouro_evento'=> $request->logradouro,
            'num_evento'=> $request->num,
            'complemento_evento'=> $request->complemento,
            'bairro_evento'=> $request->bairro,
            #nomeDaColunaNoBD => $request->nomeEmIdNoFormulario
            
            /*
            'titulo'=> $request->titulo,
            'cep'=> $request->CEP_evento,
            'logradouro'=> $request->logradouro_evento,
            'num'=> $request->num_evento,
            'bairro'=> $request->bairro_evento,
            */
            
            /*
            'titulo'=> $request->titulo,
            'CEP_evento'=> $request->CEP_evento,
            'logradouro_evento'=> $request->logradouro_evento,
            'num_evento'=> $request->num_evento,
            'bairro_evento'=> $request->bairro_evento,
            */
            
        ]);   
        return view ('eventos.barra_nav');        
        return "Evento cadastrado com sucesso";        
        
        
        //        
        /*
        // Método 1
        Evento::create([
	'titulo'=> $request->titulo,
	'CEP_evento'=> $request->CEP_evento,
        'logradouro_evento'=> $request->logradouro_evento,
        'num_evento'=> $request->num_evento,	
	'bairro_evento'=> $request->bairro_evento,
        ]);        
        return "Evento salvo com sucesso";         
         */
        
        /*
        // Método 2 - parabah
        $url = $request->get('redirect_to', route('eventos'));
        if (! $request->has('Limpar')){
            $dados = $request->all();
            Evento::create($dados);
            $request->session()->flash('message', 'Evento cadastrado com suuucesso');
        }
        else
        {
            $request->session()->flash('message', 'Operação cancelada');
        }
            return redirect()->to($url);    
    }
    */    
    
    /*
    // outra possibilidade de gravação (testar)
    public function store(Request $request, Evento $eventos)
    {
        $eventos->create($request->all());
    return "Evento salvo com sucesso";
    }
    */    
        
    }    
    
    

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    

    
    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //        
        #return view('eventos.form_edicao'); // melhor
        
        //Larback        
        $evento = Evento::findOrFail($id);
            //echo $evento->titulo;        
        return view('eventos.form_edicao',['evento' => $evento]);
        \Session::flash('message', 'Evento atulizado com suuucesso');
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function update(Request $request, $id)
    {
        //        
        //return view('eventos.form_insercao'); // melhor
    }
    */
    
    /*
    public function update(Evento $evento, Request $request)
    {        
        // Método 2 - parabah        
        if (! $request->has('Limpar')){
            $evento->tipo   = $request->input('tipo');
            $evento->titulo = $request->input('titulo');
            $evento->bairro_evento = $request->input('bairro_evento');
            $evento->update();
            
            \Session::flash('message', 'Evento atulizado com suuucesso');
        }
        else
        {
            $request->session()->flash('message', 'Operação canceladaaa');
        }
            return redirect()->route('eventos');
    }   
    */
        
    
    public function update(Request $request, $id)
    {   
        //Larback
        $evento = Evento::findOrFail($id);
        $evento->update([
            'titulo' => $request->tit,
            'data_evento'=> $request->data,
            'CEP_evento' => $request->cep,
            'logradouro_evento' => $request->logradouro,
            'num_evento' => $request->num,
            'complemento_evento'=> $request->complemento,
            'bairro_evento' => $request->bairro,
            #nomeDaColunaNoBD => $request->nomeEmIdNoFormulario
        ]);
        return view ('eventos.barra_nav');
        return "Atuallizado com sucesso";
    }
    
    
    

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Larback
        $evento = Evento::findOrFail($id);
        $evento->delete();        
        return "Evento excluído com sucesso";
        return view ('eventos.barra_nav');
        
        /*
        if (! $request->has('Excluir') ){
            $evento->delete();
            \Session::flash('deletado!');
        } else {
            $request->session()->flash('operação cancelada');
        }
        return redirect()->url('eventos.eventosCadastrados');
        */
        
    }
}
