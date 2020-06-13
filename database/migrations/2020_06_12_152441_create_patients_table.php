<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->integer('age');
            $table->string('blood_type')->default('0');
            
            $table->integer('number');
            $table->string('birth_type')->default('0');
            $table->string('dad_job')->nullable();
            $table->string('mum_job')->nullable();
            
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->text('notes')->nullable();

            $table->unsignedBigInteger('doctor_id');
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
        Schema::dropIfExists('patients');
    }
}
