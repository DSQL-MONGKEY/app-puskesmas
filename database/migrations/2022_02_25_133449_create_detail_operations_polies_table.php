<?php

use App\Models\OperationsDay;
use App\Models\Polies;
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
        Schema::create('detail_operations_polies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Polies::class)->nullable();
            $table->foreignIdFor(OperationsDay::class)->nullable();
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
        Schema::dropIfExists('detail_operations_polies');
    }
};
