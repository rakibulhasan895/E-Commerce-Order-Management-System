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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->constrained('users');
            $table->string('name')->index();
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->fullText('description');
            $table->decimal('base_price', 10, 2);
            $table->boolean('status')->default(1);
            $table->integer('low_stock_threshold')->default(5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
