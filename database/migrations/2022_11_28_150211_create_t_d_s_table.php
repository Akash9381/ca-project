<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_d_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('token_number')->nullable();
            $table->date('receipt_date')->format('Y-m-d')->nullable();
            $table->text('barcode_value')->nullable();
            $table->text('deductor_collector_name')->nullable();
            $table->string('financial_year')->nullable();
            $table->string('quarter')->nullable();
            $table->string('form_no')->nullable();
            $table->string('tan')->nullable();
            $table->string('regular_correction')->nullable();
            $table->string('original_token_no')->nullable();
            $table->string('fees_charged')->nullable();
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
        Schema::dropIfExists('t_d_s');
    }
}
