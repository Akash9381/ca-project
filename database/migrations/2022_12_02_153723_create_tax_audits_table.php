<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_audits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('pan_card')->nullable();
            $table->bigInteger('acknowledgment_no')->default(0)->nullable();
            $table->date('filing_date')->nullable();
            $table->string('assessment_year')->nullable();
            $table->string('filing_type')->nullable();
            $table->string('status')->nullable();
            $table->string('filed_by')->nullable();
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
        Schema::dropIfExists('tax_audits');
    }
}
