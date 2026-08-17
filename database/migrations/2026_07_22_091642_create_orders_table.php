<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->enum('order_type', ['Dine-In', 'Take Out']);
            $table->string('table_number')->nullable();
            $table->enum('status', ['Pending', 'In-Preparation', 'Completed'])->default('Pending');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('discount', 10, 2)->default(0.00);
            $table->decimal('total', 10, 2);
            $table->decimal('cash_tendered', 10, 2);
            $table->decimal('change_amount', 10, 2)->default(0.00);
            $table->timestamp('arrival_time');
            $table->timestamp('preparation_start_time')->nullable();
            $table->timestamp('completion_time')->nullable();
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
