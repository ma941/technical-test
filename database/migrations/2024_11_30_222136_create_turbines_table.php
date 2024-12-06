<?php

use App\Enum\TurbineStatusEnum;
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
        Schema::create('turbines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('wind_farm_id')->constrained()->onDelete('cascade');
            $table->date('inspection_date')->nullable();
            $table->enum('status', array_map(fn($status) => $status->value, TurbineStatusEnum::cases()))->default(TurbineStatusEnum::ACTIVE->value);
            $table->float('power_output')->nullable();
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
        Schema::dropIfExists('turbines');
    }
};
