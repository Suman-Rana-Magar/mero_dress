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
            $table->string("title",100);
            $table->integer("quantity");
            $table->text("description");
            $table->string("keywords",200);
            $table->string("category");
            $table->string("image");
            $table->bigInteger("marked_price");
            $table->integer("discount");
            $table->bigInteger("price");
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
