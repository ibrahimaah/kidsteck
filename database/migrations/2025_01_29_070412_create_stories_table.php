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
        Schema::create('stories', function (Blueprint $table) 
        {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('target_age');
            $table->enum('added_by',['admin','volunteer'])->default('admin');
            $table->foreignId('volunteer_id')->nullable()->constrained('users');
            $table->foreignId('category_id')->constrained(); 
            // $table->enum('status',['pending','accepted','rejected'])->default('pending');
            $table->boolean('is_active')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};
