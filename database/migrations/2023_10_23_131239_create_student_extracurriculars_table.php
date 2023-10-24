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
        Schema::create('student_extracurriculars', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->nullable()->constrained("users")->onDelete("set null");
            $table->foreignId("extracurricular_id")->nullable()->constrained("extracurriculars")->onDelete("set null");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_extracurriculars', function (Blueprint $table) {
            // drop foreign
            $table->dropForeign(["user_id"]);
            $table->dropForeign(["extracurricular_id"]);
        });
        Schema::dropIfExists('student_extracurriculars');

    }
};
