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
        Schema::create('product_display', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->default('000000');
            $table->text('name');
            $table->float('price',8,2);
            $table->float('inch',8,2);
            $table->boolean('smartv')->default(1);
            $table->integer('max_resolution');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_displays');
    }
};
