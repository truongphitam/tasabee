<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSliders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sliders', function (Blueprint $table) {
            //
            if (!Schema::hasColumn('sliders', 'event_date')) {
                $table->date('event_date')->after('type');
            }
            if (!Schema::hasColumn('sliders', 'link')) {
                $table->string('link')->nullable()->after('type');
            }
            if (!Schema::hasColumn('sliders', 'address')) {
                $table->string('address')->nullable()->after('type');
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
        Schema::table('sliders', function (Blueprint $table) {
            //
        });
    }
}
