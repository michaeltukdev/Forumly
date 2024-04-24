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
        Schema::create('forums', function (Blueprint $table) {
            $table->id();

            $table->string('name', 255);

            $table->string('summary', 255)->nullable();

            $table->string('slug')->unique();

            $table->string('icon', 100)->default('heroicon-o-folder');

            $table->foreignId('category_id')->constrained('forum_categories')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forums');
    }
};
