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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('patient_name');
$table->string('patient_phone');
$table->string('doctor_name');
$table->string('appointment_type');
$table->dateTime('date_time');
$table->string('channel'); // SMS, WhatsApp, Other
$table->text('notes')->nullable();
$table->boolean('reminder_sent')->default(false);
$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
