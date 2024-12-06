<?php

use App\Models\DamageAndWear;
use App\Models\Turbine;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rotors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Turbine::class)->nullable()->constrained();
            $table->foreignIdFor(DamageAndWear::class)->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rotors');
    }
};
