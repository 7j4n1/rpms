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
        Schema::create('documents', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('document_id')->unique()->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->text('abstract');
            $table->longText('paper_title');
            $table->string('co_authors')->nullable();
            $table->string('paper_type')->nullable();
            $table->string('keywords')->nullable();
            $table->year('year')->nullable();
            $table->string('availability')->default('private');
            $table->tinyInteger('isApproved')->default(0);
            $table->unsignedBigInteger('reviewer_id')->nullable();
            $table->unsignedTinyInteger('isfullyUploaded')->default(0);
            $table->longText('file_path')->nullable();
            // $table->unsignedBigInteger('current_version_id')->nullable();
            $table->timestamps();
            
            // $table->foreign('current_version_id')->references('id')->on('paper_versions')->nullOnDelete();
            $table->foreign('author_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('reviewer_id')->references('id')->on('reviewers')->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
