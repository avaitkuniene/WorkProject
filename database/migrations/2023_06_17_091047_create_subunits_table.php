<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Truck;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subunits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_truck');
            $table->unsignedBigInteger('subunit');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();

            $table->foreign('main_truck')->references('id')->on('trucks');
            $table->foreign('subunit')->references('id')->on('trucks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subunits');
    }
};
