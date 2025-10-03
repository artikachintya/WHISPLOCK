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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('reported_person_name', 100);
            $table->string('incident_time', 255);
            $table->text('incident_chronology');
            $table->string('evidence', 255);
            $table->integer('status')->default(-1);
            //-1 : belum ditindak lanjuti
            // 0 : dalam proses penyidikan
            // 1 : selesai
            $table->text('response')->nullable(); 
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
