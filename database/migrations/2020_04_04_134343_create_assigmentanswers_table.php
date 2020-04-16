<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssigmentanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigmentanswers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('instructor_id')->nullable();
            $table->bigInteger('student_id')->nullable();
            $table->bigInteger('course_id')->nullable();
            $table->boolean('completed')->default(false);
            $table->string('ast_file_response')->nullable();
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
        Schema::dropIfExists('assigmentanswers');
    }
}
