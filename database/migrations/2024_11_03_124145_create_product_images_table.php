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
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('image_url')->nullable();
            $table->string('type')->nullable();
            $table->string('original_name')->nullable();
            $table->string('file_name')->nullable();
            $table->string('title')->nullable();
            $table->string('alt_text')->nullable();
            $table->string('size')->nullable();
            $table->string('mime_type')->nullable(); 
            $table->string('status')->nullable();
            $table->boolean('is_primary')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
