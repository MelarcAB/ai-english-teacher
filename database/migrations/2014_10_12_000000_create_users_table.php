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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->rememberToken();
            $table->timestamps();
            //provider_id
            $table->string('provider_id')->nullable();
            //user type -> num
            //1-web,2-admin
            $table->integer('user_type')->default(1);
            //openai_token
            $table->string('openai_token')->nullable();
            //openai_model
            $table->string('openai_model')->default('gpt-3.5-turbo-0613');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
