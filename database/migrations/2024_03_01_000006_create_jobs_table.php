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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();

            $table->string('number');
            $table->longtext('fault');
            $table->longText('address');
            $table->string('contactName');
            $table->string('contactNo');
            $table->boolean('status')->nullable()->default(false);

            // Engineer Relationship
            $table->unsignedBigInteger('engineer')->index();
            $table->foreign('engineer')->references('id')->on('engineers');

            // Machine Relationship
            $table->unsignedBigInteger('machine')->index();
            $table->foreign('machine')->references('id')->on('machines');

            // Statuses Relationships
            $table->unsignedBigInteger('status_1')->index(); // Jobsheet
            $table->foreign('status_1')->references('id')->on('statuses');
            $table->unsignedBigInteger('status_2')->index(); // Incoming Invoice
            $table->foreign('status_2')->references('id')->on('statuses');
            $table->unsignedBigInteger('status_3')->index(); // Photos
            $table->foreign('status_3')->references('id')->on('statuses');
            $table->unsignedBigInteger('status_4')->index(); // Outgoing Invoice
            $table->foreign('status_4')->references('id')->on('statuses');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
