<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_gallery', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('image_id')->nullable();
            $table->timestamps();

            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('image_id')
                ->references('id')
                ->on('media')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects_gallery');
    }
}
