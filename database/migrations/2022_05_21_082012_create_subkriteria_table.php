<?php

use App\Models\Kriterias;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubkriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subkriteria', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Kriterias::class, 'kriteria_id')->onUpdate('cascade')->onDelete('cascade');
            $table->float('nilai');
            $table->string('keterangan');
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
        Schema::dropIfExists('subkriteria');
    }
}
