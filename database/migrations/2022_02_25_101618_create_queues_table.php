<?php

use App\Models\Doctor;
use App\Models\Operation;
use App\Models\OperationsDay;
use App\Models\Polies;
use App\Models\User;
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
        Schema::create('queues', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable();
            $table->foreignIdFor(Doctor::class)->nullable();
            $table->foreignIdFor(Polies::class)->nullable();
            $table->foreignIdFor(OperationsDay::class)->nullable();
            $table->date('date_visit');
            $table->time('open_at');
            $table->time('closed_at');
            $table->uuid('slug')->unique();
            $table->enum('status',['pending','in calling','done'])->default('pending');
            $table->enum('payment',['bpjs','cash'])->default('bpjs');
            $table->integer('queueing_number', false, true)->nullable();
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
        Schema::dropIfExists('queues');
    }
};
