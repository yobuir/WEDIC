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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('service_id')->nullable();
            $table->string('service_type')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('currency')->nullable();
            $table->string('amount')->nullable();
            $table->string('reference_id')->nullable();
            $table->string('user_id')->nullable();
            $table->enum('status', ['pending', 'cancelled', 'failed', 'completed'])->default('pending');
            $table->text('deleted_by')->nullable();
            $table->text('updated_by')->nullable();
            $table->text('created_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
