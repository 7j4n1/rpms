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
        Schema::create('current_versions', function (Blueprint $table) {
            $table->unsignedBigInteger('paper_id')->primary();
            $table->unsignedBigInteger('paper_version_id');

            $table->foreign('paper_id')->references('id')->on('documents');
            $table->foreign('paper_version_id')->references('id')->on('paper_versions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('current_versions');
    }
};
