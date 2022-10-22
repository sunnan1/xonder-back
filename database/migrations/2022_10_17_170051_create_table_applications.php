<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('accountType')->nullable();
            $table->string('firstName')->nullable();
            $table->string('email')->nullable();
            $table->string('lastName')->nullable();
            $table->string('businessName')->nullable();
            $table->string('tradingName')->nullable();
            $table->string('tradingAddress')->nullable();
            $table->string('businessDescription')->nullable();
            $table->string('webAddress')->nullable();
            $table->string('expectedTurnOver')->default(0);
            $table->string('singlePaymentIncome')->default(0);
            $table->string('singlePaymentOutgoing')->default(0);
            $table->string('largePaymentReceiveAccount')->default(0);
            $table->string('largePaymentTransferAccount')->default(0);
            $table->string('averageAmountWeek')->default(0);
            $table->string('photo_id')->nullable();
            $table->string('passport')->nullable();
            $table->string('driving_license')->nullable();
            $table->string('uk_residence_permit')->nullable();
            $table->integer('completed')->default(0);
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
        Schema::dropIfExists('applications');
    }
};
