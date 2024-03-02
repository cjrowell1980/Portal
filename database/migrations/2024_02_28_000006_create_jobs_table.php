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

            $table->unsignedBigInteger('machine')->index();
            $table->foreign('machine')->references('id')->on('machines')->cascadeOnDelete();
            $table->string('number');
            $table->longtext('fault');
            $table->longText('address');
            $table->string('contactName');
            $table->string('contactNo');
            $table->unsignedBigInteger('engineer')->index();
            $table->foreign('engineer')->references('id')->on('engineers')->cascadeOnDelete();

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
