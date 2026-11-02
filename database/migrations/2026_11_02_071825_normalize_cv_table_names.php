<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('keahlian_1122') && ! Schema::hasTable('keahlian_table_1122')) {
            Schema::rename('keahlian_1122', 'keahlian_table_1122');
        }

        if (Schema::hasTable('pengalaman_kerja_1122') && ! Schema::hasTable('pengalaman_kerja_table_1122')) {
            Schema::rename('pengalaman_kerja_1122', 'pengalaman_kerja_table_1122');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('keahlian_table_1122') && ! Schema::hasTable('keahlian_1122')) {
            Schema::rename('keahlian_table_1122', 'keahlian_1122');
        }

        if (Schema::hasTable('pengalaman_kerja_table_1122') && ! Schema::hasTable('pengalaman_kerja_1122')) {
            Schema::rename('pengalaman_kerja_table_1122', 'pengalaman_kerja_1122');
        }
    }
};
