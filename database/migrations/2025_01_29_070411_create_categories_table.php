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
                ['id'=>1,'name'=>'طبيعة'],
                ['id'=>2,'name'=>'حيوانات'],
                ['id'=>3,'name'=>'خيال علمي'],
                ['id'=>4,'name'=>'رسوم متحركة'],
                ['id'=>5,'name'=>'رياضة'],
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
