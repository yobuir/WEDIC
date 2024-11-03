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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('address');
            $table->string('city')->nullable();
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('passport')->nullable();
            $table->string('degree')->nullable();
            $table->string('school')->nullable();
            $table->string('field')->nullable();
            $table->date('graduation')->nullable();
            $table->string('skills')->nullable();
            $table->integer('experience')->nullable();
            $table->string('language')->nullable();
            $table->string('resume')->nullable();
            $table->string('portfolio')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->enum('application_status', ['pending', 'accepted', 'rejected', 'paid'])->default('pending');
            $table->unsignedBigInteger('training_id');
            $table->foreign('training_id')->references('id')->on('trainings');
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
        Schema::dropIfExists('applicants');
    }
};
