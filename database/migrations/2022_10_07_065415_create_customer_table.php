<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->string('customer_mobile')->nullable();
            $table->text('facebook_id')->nullable();
            $table->string('social_paywall')->default('0');
            $table->string('fb_like')->default('0');
            $table->string('fb_share')->default('0');
            $table->string('download')->default('0');
            $table->string('deleted_at')->default('0');
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
        Schema::dropIfExists('customer');
    }
}
