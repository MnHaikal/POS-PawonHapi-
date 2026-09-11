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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('outlet_id')->constrained('outlets')->cascadeOnDelete();
            $table->string('order_number')->unique();
            $table->enum('order_type', ['dine_in', 'take_away', 'qr_table', 'qr_room']);
            $table->enum('source', ['pos', 'self_order']);
            $table->foreignId('table_id')->nullable()->constrained('tables')->nullOnDelete();
            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();
            $table->foreignId('cashier_id')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('status', ['pending_confirmation', 'processing', 'completed', 'cancelled'])->default('pending_confirmation');
            $table->enum('payment_status', ['unpaid', 'partial', 'paid'])->default('unpaid');
            $table->integer('subtotal')->default(0);
            $table->integer('discount_amount')->default(0);
            $table->foreignId('coupon_id')->nullable()->constrained('coupons')->nullOnDelete();
            $table->integer('tax_amount')->default(0);
            $table->integer('service_fee_amount')->default(0);
            $table->integer('packaging_fee_amount')->default(0);
            $table->integer('total_amount')->default(0);
            $table->integer('down_payment_amount')->default(0);
            $table->integer('paid_amount')->default(0);
            $table->date('due_date')->nullable();
            $table->integer('cogs_amount')->default(0);
            $table->text('notes')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
