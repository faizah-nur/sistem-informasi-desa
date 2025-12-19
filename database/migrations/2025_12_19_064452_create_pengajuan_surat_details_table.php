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
    Schema::create('pengajuan_surat_details', function (Blueprint $table) {
        $table->id();

        $table->foreignId('pengajuan_surat_id')
              ->constrained('pengajuan_surats')
              ->cascadeOnDelete();

        $table->string('key');
        $table->text('value');

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('pengajuan_surat_details');
}

};