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
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('user_id')->constrained('users');
            $table->foreignUuid('classroom_id')->constrained('class_rooms');

            $table->date('birth_date');
            $table->string('parent_name');
            $table->string('parent_number');
            $table->string('address');
            $table->enum('status', ['active', 'graduated', 'transfered', 'dropped_out']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
