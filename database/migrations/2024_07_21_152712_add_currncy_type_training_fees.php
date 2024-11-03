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
        Schema::table('training_fees', function (Blueprint $table) {
            $table->string('currency')->nullable();
            $table->text('type')->nullable();
            $table->text('method')->nullable();
            $table->text('frequency')->nullable();
            $table->text('installmentAmount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training_fees', function (Blueprint $table) {
            $table->dropColumn(['currency', 'type', 'method']);
        });
    }
};
