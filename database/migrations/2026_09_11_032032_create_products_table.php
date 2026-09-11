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
            $table->foreignId('outlet_id')->constrained('outlets')->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->string('sku')->nullable()->unique();
            $table->string('barcode')->nullable();
            $table->text('description')->nullable();
            $table->string('main_image_path')->nullable();
            $table->integer('cost_price')->default(0);
            $table->integer('sell_price');
            $table->boolean('track_stock')->default(true);
            $table->integer('stock')->default(0);
            $table->integer('min_stock')->default(0);
            $table->integer('loyalty_points_per_unit')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('show_in_pos')->default(true);
            $table->boolean('is_new')->default(false);
            $table->boolean('is_popular')->default(false);
            $table->boolean('is_on_sale')->default(false);
            $table->integer('sale_price')->nullable();
            $table->boolean('is_preorder')->default(false);
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
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
