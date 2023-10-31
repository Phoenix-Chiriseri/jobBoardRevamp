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
        Schema::create('real_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_name');
            $table->string('job_description');
            $table->string('num_of_people');
            $table->string('shift');
            $table->string('location');
            $table->string('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_jobs');
    }
};
