<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            if (!Schema::hasColumn('posts', 'post_type')) {
                $table->string('post_type')->default('posts')->after('categories_id');
            }
        });
        Schema::table('post_categories', function (Blueprint $table) {
            if (!Schema::hasColumn('post_categories', 'post_type')) {
                $table->string('post_type')->default('posts')->after('categories_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
}
