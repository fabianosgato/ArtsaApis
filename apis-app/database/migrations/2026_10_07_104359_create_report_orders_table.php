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
        Schema::create('report_orders', function (Blueprint $table) {
            $table->comment('Tabela para sistema de logs de pedidos');
            $table->integer('report_order_id', true);
            $table->integer('order_id')->index('idx_order_id');
            $table->string('order_status', 20);
            $table->string('description');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_orders');
    }
};
