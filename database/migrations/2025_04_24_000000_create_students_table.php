<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();  // Primary Key for Students table
            $table->string('name');
            $table->string('email')->unique();
            $table->date('date_of_birth');
            $table->timestamps();
            
            // Adding foreign key for the courses table (foreign key from `students` referencing `courses`)
            $table->unsignedBigInteger('course_id')->nullable();  // Allows course_id to be nullable if the student does not have a course yet
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade'); // Cascade delete if a course is deleted
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
