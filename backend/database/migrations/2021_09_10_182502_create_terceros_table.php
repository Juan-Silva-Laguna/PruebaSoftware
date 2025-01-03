<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTercerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terceros', function (Blueprint $table) {
            $table->bigIncrements('id');          
            $table->unsignedBigInteger("tipo_identificacion_id")->unsigned();            
            $table->integer('numero_identificacion');            
            $table->string('nombre1', 15);
            $table->string('nombre2', 15);
            $table->string('apellido1', 15);
            $table->string('apellido2', 15);            
            $table->unsignedBigInteger("idmunicipio_id")->unsigned();           
            $table->unsignedBigInteger("tipo_contribuyente_id")->unsigned();   
                    
            $table->foreign("tipo_identificacion_id")->references("id")->on("elementos_listas")
            ->onDelete("cascade")
            ->onUpdate("cascade");
            $table->unsignedBigInteger("tipo_tercero_id")->unsigned();
            $table->foreign("tipo_tercero_id")->references("id")->on("elementos_listas")
            ->onDelete("cascade")
            ->onUpdate("cascade");
            $table->unsignedBigInteger("departamento_id")->unsigned();
            $table->foreign("departamento_id")->references("id")->on("elementos_listas")
            ->onDelete("cascade")
            ->onUpdate("cascade");
            $table->foreign("idmunicipio_id")->references("id")->on("elementos_listas")
            ->onDelete("cascade")
            ->onUpdate("cascade");
            $table->foreign("tipo_contribuyente_id")->references("id")->on("elementos_listas")
            ->onDelete("cascade")
            ->onUpdate("cascade");


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
        Schema::dropIfExists('terceros');
    }
}
