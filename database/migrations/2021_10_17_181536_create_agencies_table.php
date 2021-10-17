<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('name');
            $table->string('site')->nullable();
            $table->string('province');
            $table->string('city');
            $table->string('experience');
            $table->string('area')->nullable();
            $table->string('main_brands')->nullable();
            $table->string('other_brands')->nullable();
            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->string('address');
            $table->string('phone');
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->enum('type', \App\Models\ContactUs::$types)->default(\App\Models\ContactUs::UNREAD);
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
        Schema::dropIfExists('agencies');
    }
}
