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
            $table->float('expectedTurnOver')->default(0);
            $table->float('singlePaymentIncome')->default(0);
            $table->float('singlePaymentOutgoing')->default(0);
            $table->float('largePaymentReceiveAccount')->default(0);
            $table->float('largePaymentTransferAccount')->default(0);
            $table->float('averageAmountWeek')->default(0);
            $table->string('photo_id')->nullable();
            $table->string('passport')->nullable();
            $table->string('driving_license')->nullable();
            $table->string('uk_residence_permit')->nullable();
            $table->string('eu_identity_card')->nullable();
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
