<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLectureIdToCoursContentPhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cours_content_photos', function (Blueprint $table) {
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
        Schema::table('cours_content_photos', function (Blueprint $table) {
            $table->dropColumn('lecture_id');
        });
    }
}
