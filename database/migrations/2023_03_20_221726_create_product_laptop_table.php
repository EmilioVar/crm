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
        Schema::create('product_laptop', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->default('000000');
            $table->text('name');
            $table->float('price',8,2);
            $table->integer('core');
            $table->integer('ram');
            $table->integer('velocity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_laptop');
    }
};
