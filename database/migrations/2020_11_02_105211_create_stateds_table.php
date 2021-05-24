<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stateds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255)->nullable();
            $table->string('sub_title', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('avatar', 255)->nullable();
            $table->integer('user_id')->nullable();
            $table->text('expert')->nullable();
            $table->longText('description')->nullable();
            $table->enum('is_published', ['on', ''])->nullable();
            $table->integer('categories_id')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->timestamps();
        });
        Schema::table('posts', function (Blueprint $table) {
            if (!Schema::hasColumn('posts', 'fixed')) {
                $table->enum('fixed', ['on', ''])->nullable();
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
        Schema::dropIfExists('stateds');
    }
}
