<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('curp', 20);
            $table->string('ine', 20);
            $table->text('domicilio');
            $table->string('documento', 50);
            $table->string('beneficiario', 100);
            $table->string('municipio', 100);
            $table->string('clabe', 15);
            $table
                ->enum('tipo', ['Plantas', 'Hectareas'])
                ->default('Hectareas');
            $table->decimal('total');
            $table->unsignedBigInteger('user_id');

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
        Schema::dropIfExists('expedientes');
    }
}
