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
        Schema::create('payments_methods', function (Blueprint $table) {
            $table->comment('Metodos de pagamento de teste');
            $table->integer('payment_method_id', true);
            $table->string('payment_name', 50);
            $table->string('payment_account_id', 50)->comment('ID da conta de teste/homologação');
            $table->string('payment_key')->comment('PublicKey do Ambiente de teste/homologação');
            $table->string('payment_secret')->comment('SecretKey do Ambiente teste/homologação');
            $table->boolean('status')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments_methods');
    }
};
