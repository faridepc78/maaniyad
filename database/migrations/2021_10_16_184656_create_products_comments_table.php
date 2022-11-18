<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('site')->nullable();
            $table->longText('message');
            $table->longText('answer')->nullable();
            $table->string('admin_name')->nullable();
            $table->string('admin_profile')->nullable();
            $table->enum('status', \App\Models\ProductComment::$statuses)
                ->default(\App\Models\ProductComment::PENDING);
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
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
        Schema::dropIfExists('products_comments');
    }
}
