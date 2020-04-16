<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('course_name',65);
            $table->decimal('course_price',8,2);
            $table->string('course_type',6);
            $table->longText('course_objectives');
            $table->longText('course_description');
            $table->char('approval',1)->default('0');
            $table->string('image')->nullable();
            // $table->integer('sells_num',6)->nullable();
            $table->bigInteger('instructor_id')->unsigned()->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
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
        Schema::dropIfExists('courses');
    }
}
