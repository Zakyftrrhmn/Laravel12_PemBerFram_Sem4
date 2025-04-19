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
        Schema::create('inboxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index('fk_inboxes_to_users');
            $table->string('no_agenda');
            $table->string('jenis_surat');
            $table->date('tanggal_kirim');
            $table->date('tanggal_terima');
            $table->string('no_surat');
            $table->string('pengirim')->nullable();
            $table->string('perihal')->nullable();
            $table->string('foto')->nullable();
            $table->string('relasi')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inboxes');
    }
};
