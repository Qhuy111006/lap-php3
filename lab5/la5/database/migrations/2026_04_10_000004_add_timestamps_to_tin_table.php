<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('tin')) {
            return;
        }

        Schema::table('tin', function (Blueprint $table) {
            if (! Schema::hasColumn('tin', 'created_at')) {
                $table->timestamp('created_at')->nullable()->after('AnHien');
            }

            if (! Schema::hasColumn('tin', 'updated_at')) {
                $table->timestamp('updated_at')->nullable()->after('created_at');
            }
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('tin')) {
            return;
        }

        Schema::table('tin', function (Blueprint $table) {
            $columnsToDrop = [];

            if (Schema::hasColumn('tin', 'created_at')) {
                $columnsToDrop[] = 'created_at';
            }

            if (Schema::hasColumn('tin', 'updated_at')) {
                $columnsToDrop[] = 'updated_at';
            }

            if ($columnsToDrop !== []) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
};
