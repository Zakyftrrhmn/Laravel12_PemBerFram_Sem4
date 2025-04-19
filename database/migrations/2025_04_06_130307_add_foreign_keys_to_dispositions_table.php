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
        Schema::table('dispositions', function (Blueprint $table) {
            $table->foreign('inbox_id', 'fk_disposition_to_inboxes')->references('id')->on('inboxes')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('user_id', 'fk_disposition_to_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dispositions', function (Blueprint $table) {
            $table->dropForeign('fk_disposition_to_inboxes');
            $table->dropForeign('fk_disposition_to_users');
        });
    }
};
