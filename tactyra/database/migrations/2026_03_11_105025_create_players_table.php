<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table) {

            $table->id();

            $table->string('name');
            $table->string('club')->nullable();
            $table->string('team')->nullable();
            $table->string('category')->nullable();
            $table->string('position')->nullable();

            $table->integer('age')->nullable();

            $table->integer('speed')->nullable();
            $table->integer('passing')->nullable();
            $table->integer('shooting')->nullable();
            $table->integer('defense')->nullable();
            $table->integer('physical')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
