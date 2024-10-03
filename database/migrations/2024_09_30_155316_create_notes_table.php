<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('excerpt');
            $table->text('content');
            $table->unsignedBigInteger('usu_id'); // ID del usuario
            $table->date('fechcre')->nullable(); // Fecha de creación
            $table->enum('categoria', ['Categoria 1', 'Categoria 2', 'Categoria 3', 'Categoria 4', 'Categoria 5']);
            $table->date('fecha_vencimiento')->nullable(); // Fecha de vencimiento
            $table->string('imagen')->nullable(); // Imagen
            $table->timestamps();

            // Aquí puedes agregar la restricción de clave foránea si ya existe la tabla categorias
            $table->foreign('usu_id')->references('id')->on('users')->onDelete('cascade'); // Asegúrate que la tabla de usuarios sea correcta
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
