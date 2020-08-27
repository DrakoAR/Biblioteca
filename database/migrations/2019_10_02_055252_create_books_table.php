<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name',128);
            $table->string('autor',128);
            $table->string('cantidad');
            $table->integer('año');
            $table->integer('volumen')->nullable();
            $table->enum('referencia',['L1A','L1B','L1C','L1D','L1E','L1F']);
            $table->enum('categoria',['revistas','libros','actas','tesis']);

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
        Schema::dropIfExists('books');
    }
}
