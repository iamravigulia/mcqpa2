<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class addForeignMediaToMcqpa2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('fmt_mcqpa2_ques')) {
            Schema::table('fmt_mcqpa2_ques', function (Blueprint $table) {
                $table->foreignId('media_id_es')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('fmt_lamas_ques');
    }
}
