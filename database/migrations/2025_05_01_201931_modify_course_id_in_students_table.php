<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyCourseIdInStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            // Check if the course_id column already exists, if not add it
            if (!Schema::hasColumn('students', 'course_id')) {
                $table->unsignedBigInteger('course_id'); // Add the course_id column if it doesn't exist
            }

            // Add foreign key constraint if it doesn't exist
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['course_id']);  // Drop the foreign key constraint
            $table->dropColumn('course_id');     // Drop the course_id column
        });
    }
}
