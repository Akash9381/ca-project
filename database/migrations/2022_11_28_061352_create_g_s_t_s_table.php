<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGSTSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('g_s_t_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('arn')->nullable();
            $table->string('return_type')->nullable();
            $table->string('financial_year')->nullable();
            $table->string('tax_period')->nullable();
            $table->date('filing_date')->format('Y-m-d')->nullable();
            $table->string('status')->nullable();
            $table->string('mode_of_filing')->nullable();
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
        Schema::dropIfExists('g_s_t_s');
    }
}
