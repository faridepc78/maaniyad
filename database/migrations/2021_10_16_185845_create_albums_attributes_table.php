<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('album_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('album_id')
                ->references('id')
                ->on('albums')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums_attributes');
    }
}
