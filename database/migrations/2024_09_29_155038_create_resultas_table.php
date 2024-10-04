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
        Schema::create('resultats', function (Blueprint $table) {
            $table->id();
            $table->string("note")->default(0);
            $table->string("grade");
            $table->unsignedBigInteger("student_id");
            $table->unsignedBigInteger("examen_id");

            $table->foreign("student_id")->references("id")->on("students")->onDelete("restrict")->onUpdate("restrict");
            $table->foreign("examen_id")->references("id")->on("examens")->onDelete("restrict")->onUpdate("restrict");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultats');
    }
};
