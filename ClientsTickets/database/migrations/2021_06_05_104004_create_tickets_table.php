<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('idTicket');
            $table->string('tipo');
            $table->double('precio');
            $table->date('fecha');
            $table->string('cif');

            $table->unsignedBigInteger('clientes_id');
            $table->foreign('clientes_id')
                  ->references('idCliente')
                  ->on('clientes');

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
        Schema::dropIfExists('tickets');
    }
}
