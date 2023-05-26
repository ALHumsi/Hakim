<?php

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
        Schema::create('appointments', function (Blueprint $table) {
            $table->integer('id');
            $table->unsignedBigInteger('patient_id');
            $table->date('date')->default(null);
            $table->string('time')->default(null);
            $table->enum('status', ['booked', 'cancaled', 'completed'])->default(null);
            $table->foreign('patient_id')->references('id')->on('patients')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('appointments');
    }
};
