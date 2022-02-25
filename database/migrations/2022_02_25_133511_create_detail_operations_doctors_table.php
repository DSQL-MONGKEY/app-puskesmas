<?php

use App\Models\Doctor;
use App\Models\Operation;
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
        Schema::create('detail_operations_doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Doctor::class)->nullable();
            $table->foreignIdFor(Operation::class)->nullable();
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
        Schema::dropIfExists('detail_operations_doctors');
    }
};
