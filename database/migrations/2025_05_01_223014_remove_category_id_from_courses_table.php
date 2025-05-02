<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveCategoryIdFromCoursesTable extends Migration
{
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            // Drop the category_id column if it exists
            $table->dropColumn('category_id');
        });
    }

    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            // Optionally re-add the category_id column if rolling back
            $table->bigInteger('category_id')->unsigned()->nullable();
        });
    }
}
