<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('tin')) {
            return;
        }

        Schema::create('tin', function (Blueprint $table) {
            $table->id('idTin');
            $table->string('TieuDe', 255);
            $table->text('TomTat');
            $table->longText('Content')->nullable();
            $table->string('urlHinh', 255)->nullable();
            $table->timestamp('Ngay')->nullable();
            $table->unsignedInteger('idLT')->default(1);
            $table->unsignedInteger('idTL')->default(1);
            $table->unsignedInteger('SoLanXem')->default(0);
            $table->boolean('TinNoiBat')->default(false);
            $table->boolean('AnHien')->default(true);
        });
    }

    public function down(): void
    {
        if (Schema::hasTable('tin')) {
            Schema::drop('tin');
        }
    }
};
