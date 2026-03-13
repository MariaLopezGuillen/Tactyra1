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
        Schema::table('players', function (Blueprint $table) {

            $table->integer('overall')->nullable();
            $table->string('foot')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('players', function (Blueprint $table) {

            $table->dropColumn([
                'overall',
                'foot',
                'height',
                'weight'
            ]);

        });
    }
};
