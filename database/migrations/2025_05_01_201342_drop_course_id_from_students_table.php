<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropCourseIdFromStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['course_id']);
            
            // Drop the course_id column
            $table->dropColumn('course_id');
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            // Add the course_id column back if rolling back
            $table->bigInteger('course_id')->unsigned()->nullable();
            
            // Recreate the foreign key constraint
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }
}
