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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->longText('featured_image')->nullable();
            $table->longText('description')->nullable();
            $table->json('resources')->nullable();
            $table->enum('status', ['draft', 'published', 'archived', 'reviewed'])->default('draft');
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
        Schema::dropIfExists('courses');
    }
};
