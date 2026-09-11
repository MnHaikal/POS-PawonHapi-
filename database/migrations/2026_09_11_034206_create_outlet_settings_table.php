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
        Schema::create('outlet_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('outlet_id')->unique()->constrained('outlets')->cascadeOnDelete();
            $table->integer('packaging_fee_per_item')->default(0);
            $table->boolean('hide_bundle_detail_on_receipt')->default(false);
            $table->boolean('combine_qty_on_receipt')->default(true);
            $table->boolean('block_price_below_cost')->default(false);
            $table->boolean('hide_split_bill')->default(false);
            $table->boolean('queue_number_enabled')->default(false);
            $table->boolean('notification_sound')->default(true);
            $table->boolean('notification_browser_popup')->default(true);
            $table->boolean('notification_tab_counter')->default(true);
            $table->boolean('notification_toast')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outlet_settings');
    }
};
