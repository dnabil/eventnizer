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
        Schema::create('merchant_verifications', function (Blueprint $table) {
            $table->unsignedBigInteger('merchant_id')->primary();
            $table->unsignedBigInteger('administrator_id')->nullable();
            $table->boolean('isValid')->default(false);

            $table->foreign('merchant_id')->references('id')->on('merchants')->onDelete('cascade');
            $table->foreign('administrator_id')->references('id')->on('administrators')->nullOnDelete();
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
        Schema::dropIfExists('merchant_verifications');
    }
};
