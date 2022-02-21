<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoriteContactModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite_contact_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UserID')->unsigned();
            $table->foreign('UserID')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->integer('FavoriteID');
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
        Schema::dropIfExists('favorite_contact_models');
    }
}
