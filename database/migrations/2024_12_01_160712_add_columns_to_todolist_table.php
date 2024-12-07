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
        Schema::table('to_do_lists', function (Blueprint $table) {
            $table->integer('donecounter')->default(0);  // Done counter
            $table->text('description')->nullable();    // Description
            $table->json('level')->nullable();          // Level (array of arrays)
            $table->date('future_beginning')->nullable(); // Future beginning (date)
            $table->text('day_off')->nullable();        // Day off (text)
            $table->text('motivation')->nullable();     // Motivation (text)
            $table->boolean('deleted')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('todolist', function (Blueprint $table) {
            $table->dropColumn([
                'donecounter',
                'description',
                'level',
                'future_beginning',
                'day_off',
                'motivation',
                'deleted',
            ]);
        });
    }
};
