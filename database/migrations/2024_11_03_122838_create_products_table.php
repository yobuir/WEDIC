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
            $table->string('name');
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('price', 8, 2)->default(0);
            $table->string('currency')->default('RWF');
            $table->integer('quantity')->default(0);
            $table->string('measurement_unit')->nullable();
            $table->string('featured_image');
            $table->text('category_id')->nullable();
            $table->boolean('featured')->default(false);
            $table->enum('status', ['draft', 'available', 'sold', 'unavailable'])->default('draft');
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
        Schema::dropIfExists('products');
    }
};
