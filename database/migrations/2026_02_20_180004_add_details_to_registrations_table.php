<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->string('no_hp')->after('user_id');
            $table->text('alamat')->after('no_hp');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->after('alamat');
            $table->string('tempat_tanggal_lahir')->after('jenis_kelamin');
            $table->text('keluhan')->after('tempat_tanggal_lahir');
            $table->string('jenis_perawatan')->after('keluhan'); // misal: Pembersihan Karang, Tambal
            $table->string('metode_pembayaran')->after('jenis_perawatan'); // misal: Tunai, BPJS, Transfer
            $table->text('tindakan')->nullable()->after('status'); // Untuk Admin (Poin 5)
            $table->time('estimasi_jam')->nullable()->after('no_antrean'); // Untuk Poin 4
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            //
        });
    }
};