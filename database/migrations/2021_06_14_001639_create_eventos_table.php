<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('id_organizacao',11);
            //$table->foreignId('id_tipo_evento',2);            
            //$table->integer('id_tipo_evento');
            
            
            $table->string('titulo', 60);
                //$table->timestamp('data_evento');
                //
            $table->date('data_evento');
            $table->double('CEP_evento', 8,0);
            //$table->foreignId('id_cidade_evento',4);
            $table->string('logradouro_evento', 60);
            $table->double('num_evento',3);
            //$table->double('num_evento',3)->nullable();
            
            $table->string('complemento_evento',30);
            $table->string('bairro_evento',30);
            $table->timestamps();
        });
    }
    
    
        
    
    
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
