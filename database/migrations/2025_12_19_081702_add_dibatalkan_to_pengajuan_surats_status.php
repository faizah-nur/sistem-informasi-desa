<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    DB::statement("
        ALTER TABLE pengajuan_surats 
        MODIFY status ENUM(
            'pending',
            'diproses',
            'ditolak',
            'selesai',
            'dibatalkan'
        ) DEFAULT 'pending'
    ");
}

public function down(): void
{
    DB::statement("
        ALTER TABLE pengajuan_surats 
        MODIFY status ENUM(
            'pending',
            'diproses',
            'ditolak',
            'selesai'
        ) DEFAULT 'pending'
    ");
}

};