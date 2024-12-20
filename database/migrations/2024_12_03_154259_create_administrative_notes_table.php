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
        Schema::create('administrative_notes', function (Blueprint $table) {
            $table->id();
            $table->text('notes');
            $table->unsignedBigInteger('id_student');
            $table->timestamps();

            $table->foreign('id_student')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrative_notes');
    }
};
