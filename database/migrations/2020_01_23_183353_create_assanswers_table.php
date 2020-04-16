<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assanswers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('instructor_id')->nullable();
            $table->bigInteger('course_id')->nullable();
            $table->bigInteger('student_id')->nullable();
            $table->bigInteger('assignment_id')->nullable();
            $table->decimal('mark', 8, 2)->nullable();
            $table->string('ast_file_content')->nullable();
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
        Schema::dropIfExists('assanswers');
    }
}
