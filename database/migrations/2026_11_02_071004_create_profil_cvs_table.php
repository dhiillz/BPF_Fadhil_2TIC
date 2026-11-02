<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profil_cvs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('profesi');
            $table->string('tempat_tanggal_lahir');
            $table->text('alamat');
            $table->string('sosial_media')->nullable();
            $table->string('email');
            $table->text('pendidikan');
            $table->timestamps();
        });

        DB::table('profil_cvs')->insert([
            'nama' => 'MUHAMMAD FADHIL RAMADHAN',
            'profesi' => 'Teknik Informatika',
            'tempat_tanggal_lahir' => 'Duri, 2 Oktober 1945',
            'alamat' => 'Jl. Umban Sari',
            'sosial_media' => '@dhiillz',
            'email' => 'fadhil25ti@mahasiswa.pcr.ac.id',
            'pendidikan' => 'Politeknik Caltex Riau, Teknik Informatika, 2029',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_cvs');
    }
};
