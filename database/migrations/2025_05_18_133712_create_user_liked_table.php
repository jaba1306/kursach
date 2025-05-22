<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('user_liked', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained('users')->cascadeOnDelete();
            $table->foreignId('liked_user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['user_id', 'liked_user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_likeds');
    }
};
