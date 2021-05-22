<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->nullable();
            $table->integer('staff_id')->nullable();
            $table->string('invoice_number')->nullable();
            $table->string('packing_list')->nullable();
            $table->string('bill_number')->nullable();
            $table->date('invoice_date');
            $table->date('debt_term_date');
            $table->date('debt_due_date');


            $table->string('port_of_loading')->nullable();
            $table->dateTime('etd')->nullable();
            $table->string('port_of_discharge')->nullable();
            $table->dateTime('eta')->nullable();


            $table->string('train_number')->nullable();
            $table->string('number_of_containers')->nullable();
            $table->string('place_of_delivery')->nullable();
            $table->string('insurrance')->nullable();
            $table->string('incoterms')->nullable();
            $table->string('method')->nullable();
            $table->string('lc_number')->nullable();
            
            $table->text('note')->nullable();
            $table->string('file_contract')->nullable();

            $table->integer('sub_total')->nullable();
            $table->integer('payment')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('deposit')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
