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
        Schema::create('class_rooms', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('teacher_id')->constrained('teachers');
            $table->foreignUuid('major_id')->nullable()->constrained('majors');
            $table->foreignUuid('school_level_id')->constrained('school_levels');

            $table->string('name');
            $table->string('grade');
            $table->smallInteger('year_start');
            $table->smallInteger('year_end');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_rooms');
    }
};
