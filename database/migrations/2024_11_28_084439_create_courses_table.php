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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->decimal('price', 8, 2);
            $table->string('image')->nullable();
            $table->date('starting_date');
            $table->date('end_date');
            $table->string('google_classroom_code')->nullable();
            $table->text('what_will_learn')->nullable();
            $table->text('prerequisites')->nullable();
            $table->text('time_schedule')->nullable();
            $table->integer('total_seats')->nullable();
            $table->integer('total_lessons')->nullable();
            $table->boolean('is_certificate_enabled')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
