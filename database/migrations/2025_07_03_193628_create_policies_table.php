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
        Schema::create('policies', function (Blueprint $table) {
            $table->id();       // auto-increment primary key
            $table->string('policy_number')->unique();
            $table->string('customer_name');    
            $table->decimal('premium_amount', 10, 2); // for money
            $table->enum('status', ['active', 'cancelled', 'pending']); // for status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     */
    public function down(): void
    {
        Schema::dropIfExists('policies');
    }
};
