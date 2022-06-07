<?php

use App\Models\Pekerjaan;
use App\Models\PenugasanPekerja;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realisasi', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PenugasanPekerja::class, 'penugasan_id')->constrained('penugasan_pekerja');
            $table->foreignIdFor(User::class, 'user_id')->constrained('users');
            $table->date('tgl_selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realisasi');
    }
}
