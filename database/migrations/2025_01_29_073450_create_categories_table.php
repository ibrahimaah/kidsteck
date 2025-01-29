<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
        });

        DB::table('categories')->insert(
            [
                ['id'=>1,'name'=>'Nature'],
                ['id'=>2,'name'=>'Animales'],
                ['id'=>3,'name'=>'Chess'],
                ['id'=>4,'name'=>'Swimming'],
                ['id'=>5,'name'=>'Football'],
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
