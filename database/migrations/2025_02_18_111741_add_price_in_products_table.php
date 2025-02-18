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
        Schema::table('products', function (Blueprint $table) {
            $table->integer('discount')->nullable()->change();
            $table->integer('marked_price')->nullable()->change();
            $table->integer('price')->nullable()->change();
            $table->decimal('cost_price', 18)->nullable();
            $table->decimal('selling_price', 18)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('discount')->nullable()->change();
            $table->integer('marked_price')->nullable()->change();
            $table->integer('price')->nullable()->change();
            $table->dropColumn('cost_price');
            $table->dropColumn('selling_price');
        });
    }
};
