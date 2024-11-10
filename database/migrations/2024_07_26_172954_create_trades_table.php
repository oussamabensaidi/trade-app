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
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->string('ticker_name');
            $table->string('dow_1h');
            $table->string('dow_1h_note')->nullable();
            $table->string('dow_day');
            $table->string('dow_day_note')->nullable();
            $table->string('dow_4h');
            $table->string('dow_4h_note')->nullable();
            $table->string('moving_average_1h');
            $table->string('moving_average_1h_note')->nullable();
            $table->string('moving_average_day');
            $table->string('moving_average_day_note')->nullable();
            $table->string('moving_average_4h');
            $table->string('moving_average_4h_note')->nullable();
            $table->string('macd_1h');
            $table->string('macd_1h_note')->nullable();
            $table->string('macd_day');
            $table->string('macd_day_note')->nullable();
            $table->string('macd_4h');
            $table->string('macd_4h_note')->nullable();
            $table->string('rsi_1h');
            $table->string('rsi_1h_note')->nullable();
            $table->string('rsi_day');
            $table->string('rsi_day_note')->nullable();
            $table->string('rsi_4h');
            $table->string('rsi_4h_note')->nullable();
            $table->string('fibo');
            $table->string('fibo_note')->nullable();
            $table->string('gann');
            $table->string('gann_note')->nullable();
            $table->string('result');
            $table->string('picture')->nullable();
            $table->string('post_picture')->nullable();
            $table->string('succses')->nullable();
            $table->string('profit')->nullable();
            $table->string('major_notes')->nullable();
            $table->string('asset_type')->nullable();
            $table->string('post_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analysis');
    }
};
