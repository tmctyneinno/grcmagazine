<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            // Links to your articles/posts
            $table->foreignId('post_id')->constrained('articles')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('website')->nullable();
            $table->text('content');
            // Optional: add status if you want to moderate comments
            $table->string('status')->default('pending'); // pending / approved / rejected
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};