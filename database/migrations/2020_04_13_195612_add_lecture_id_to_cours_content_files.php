<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLectureIdToCoursContentFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cours_content_files', function (Blueprint $table) {
            $table->bigInteger('lecture_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cours_content_files', function (Blueprint $table) {
            $table->dropColumn('lecture_id');
        });
    }
}
