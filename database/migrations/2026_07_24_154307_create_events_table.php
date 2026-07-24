<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->datetime('start_date'); // When the event starts
            $table->datetime('end_date')->nullable(); // When it ends
            $table->string('location')->nullable(); // e.g., "London, UK"
            $table->string('venue_name')->nullable(); // e.g., "Leonardo Hotel"
            $table->string('type')->default('Conference'); // e.g., Awards, Summit, Webinar
            $table->string('image')->nullable();
            $table->string('registration_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};