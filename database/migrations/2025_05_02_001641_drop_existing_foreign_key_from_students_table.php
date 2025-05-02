<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropExistingForeignKeyFromStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            // Drop the foreign key constraint if it exists
            $table->dropForeign(['course_id']);
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            // Re-add the foreign key constraint if rolling back
            $table->foreign('course_id')
                  ->references('id')
                  ->on('courses')
                  ->onDelete('cascade');
        });
    }
}
