<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockchainTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blockchain_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            //$table->unsignedInteger('payment_id');
            $table->decimal('btc_price');
            $table->bigInteger('amount_btc');
            $table->decimal('amount_usd');
            $table->string('hash');
            $table->unsignedInteger('confirmations')->default(0);
            $table->boolean('held')->default(false);
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
        Schema::dropIfExists('blockchain_transactions');
    }
}
