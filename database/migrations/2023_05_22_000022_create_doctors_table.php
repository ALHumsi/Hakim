<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'doctors';

    /**
     * Run the migrations.
     * @table doctors
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 45)->nullable()->default(null);
            $table->string('email', 45)->nullable()->default(null);
            $table->string('phone', 45)->nullable()->default(null);
            $table->string('gender', 45)->nullable()->default(null);
            $table->date('date_of_birth')->nullable()->default(null);
            $table->string('specialization', 45)->nullable()->default(null);
            $table->string('experience', 45)->nullable()->default(null);
            $table->enum('availability', ['yes', 'no'])->nullable()->default(null);
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
};
