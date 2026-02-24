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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
$table->foreignId('doctor_id')->constrained()->onDelete('cascade');
$table->string('hari'); // Senin, Selasa, dst
$table->time('jam_mulai');
$table->time('jam_selesai');
$table->integer('kuota')->default(20);
$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};