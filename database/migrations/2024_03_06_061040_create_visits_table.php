<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();

            // Job Relationship
            $table->unsignedBigInteger('job')->index();
            $table->foreign('job')->references('id')->on('jobs');

            // Engineer Relationship
            $table->unsignedBigInteger('engineer')->index()->nullable();
            $table->foreign('engineer')->references('id')->on('engineers');

            $table->dateTime('scheduled')->nullable();      // date scheduled
            $table->dateTime('attended')->nullable();       // date attended
            $table->integer('status');                      // open, closed
            $table->longText('report')->nullable();         // written report
            $table->integer('outcome');                     // repaired, revisit with parts, revisit with tools, collect for repair

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
