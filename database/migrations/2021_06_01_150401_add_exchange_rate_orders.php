<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExchangeRateOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            if (!Schema::hasColumn('orders', 'exchange_rate')) {
                $table->float('exchange_rate')->default(0)->nullable()->after('commission');
            }
            if (!Schema::hasColumn('orders', 'sub_total_vnd')) {
                $table->float('sub_total_vnd')->default(0)->nullable()->after('commission');
            }
            if (!Schema::hasColumn('orders', 'customs_declaration')) {
                $table->string('customs_declaration')->nullable()->after('commission');
            }
            if (!Schema::hasColumn('orders', 'payment_method')) {
                $table->string('payment_method')->nullable()->after('commission');
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
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
