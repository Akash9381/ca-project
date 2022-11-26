<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomeTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_taxes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('assessment_year')->nullable();
            $table->string('filing_type')->nullable();
            $table->string('itr')->nullable();
            $table->bigInteger('acknowledgment_no')->nullable();
            $table->date('filing_date')->nullable();
            $table->bigInteger('total_income')->nullable();
            $table->string('documents')->nullable();
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
        Schema::dropIfExists('income_taxes');
    }
}
