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
        Schema::create('transcripts', function (Blueprint $table) {
            $table->id();
            $table->date('year');
            $table->integer('term');
            $table->string('sub1')->nullable();
            $table->string('sub1Hours')->default(0);
            $table->string('sub2')->nullable();
            $table->string('sub2Hours')->default(0);
            $table->string('sub3')->nullable();
            $table->string('sub3Hours')->default(0);
            $table->string('sub4')->nullable();
            $table->string('sub4Hours')->default(0);
            $table->string('sub5')->nullable();
            $table->string('sub5Hours')->default(0);
            $table->string('sub6')->nullable();
            $table->string('sub6Hours')->default(0);
            $table->foreignId('user_id')->constrained('students');
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
        Schema::dropIfExists('transcripts');
    }
};
