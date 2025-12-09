<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author')->nullable(); // Для совместимости, но не используется
            $table->text('description');
            $table->text('full_description');
            $table->string('achievements');
            $table->integer('place');
            $table->string('image_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('players');
    }
};