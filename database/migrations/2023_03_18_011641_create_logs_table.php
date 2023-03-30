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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            //message
            $table->text('prompt')->nullable();
            $table->text('text')->nullable();
            //model
            $table->string('model')->nullable();
            //usage
            $table->string('prompt_tokens')->default("0");
            $table->string('completion_tokens')->default("0");
            $table->string('total_tokens')->default("0");
            //user
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
