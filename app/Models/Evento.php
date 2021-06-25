<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// ATENÇÃO: não pode declarar a linha abaixo
// erro: Cannot declare class App\Models\... because the name is already in use
//use App\Evento;

class Evento extends Model
{
    use HasFactory;
    protected $fillable = ['titulo','data_evento','CEP_evento','logradouro_evento','num_evento','complemento_evento','bairro_evento']; //colunas da tabela
    
    /*
    public function index(){
        //return view('index');        
        //return view('eventos.list');
    }
    */
    
    
    
}