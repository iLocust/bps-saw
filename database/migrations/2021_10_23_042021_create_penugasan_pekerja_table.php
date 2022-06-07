<?php

use App\Models\Pekerjaan;
use App\Models\SuratTugas;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenugasanPekerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penugasan_pekerja', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SuratTugas::class, 'surat_tugas_id')->constrained('surat_tugas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(User::class, 'user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('penugasan_pekerja');
    }
}
