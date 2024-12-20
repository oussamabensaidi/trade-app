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
        Schema::table('money_management', function (Blueprint $table) {
        $table->dropColumn([
            'risk_percentage', 
            'reward_to_risk_ratio', 
            'max_drawdown', 
            'strategy_name',
        ]);

        // Add the new columns
        $table->decimal('initial_balance', 15, 2);  // Starting balance
        $table->decimal('target', 15, 2);           // Profit target based on your risk management
        $table->decimal('risk_percentage', 5, 2);   // Risk percentage per trade
        $table->decimal('risk_ratio', 5, 2);        // Risk-to-reward ratio
        $table->decimal('leverage', 5, 2);          // Leverage used
        $table->decimal('max_drawdown', 15, 2)->nullable();  // Maximum drawdown allowed
        $table->decimal('exposure', 15, 2)->nullable();  
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('money_management');
    }
};
