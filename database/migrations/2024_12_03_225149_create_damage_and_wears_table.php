<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('damage_and_wears', function (Blueprint $table) {
            $table->id();
            $table->integer('level');
            $table->timestamps();
        });

        DB::table('damage_and_wears')->insert([
            ['level' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['level' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['level' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['level' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['level' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('damage_and_wears');
    }
};
