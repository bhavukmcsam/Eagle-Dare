<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageUploadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_uploads', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('customer_id')->unsigned();
                $table->text('download_key')->nullable();
                $table->text('file_name')->nullable();
                $table->text('file_info')->nullable();
                $table->string('status')->default('0');
                $table->string('deleted_at')->default('0');
                $table->string('download')->default('0');
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
        Schema::dropIfExists('image_uploads');
    }
}
