<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id'); // auto incemnt cle primaire

            $table->string('reference', 30);
            $table->string('titre', 30);
	        $table->string('slug', 30);
	        $table->float('prix', 7, 2);
	        $table->text('description')->nullable();
            $table->string('photo', 40)->nullable();
            $table->integer('quantite')->nullable();

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
        Schema::dropIfExists('products');
    }
}
