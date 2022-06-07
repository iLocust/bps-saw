<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->tinyInteger('role')->default(2);
            $table->tinyInteger('umur')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('domisili_kec')->nullable();
            $table->string('domisili_desa')->nullable();
            $table->string('domisili_rt')->nullable();
            $table->string('domisili_rw')->nullable();
            $table->string('domisili_jalan')->nullable();
            $table->string('kode_post')->nullable();
            $table->string('no_hp')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
