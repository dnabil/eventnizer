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
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('photo', 2000)->default('/img/merchant/default.jpg');
            $table->longText('description');
            $table->string('slug', 15)->unique();

            //ALAMAT
            $table->unsignedBigInteger(config('laravolt.indonesia.table_prefix') . "province_id")->nullable();
            $table->unsignedBigInteger(config('laravolt.indonesia.table_prefix') . "city_id")->nullable();
            $table->unsignedBigInteger(config('laravolt.indonesia.table_prefix') . "district_id")->nullable();

            $table->foreign(config('laravolt.indonesia.table_prefix') . "province_id")->references('id')->on(config('laravolt.indonesia.table_prefix') . 'provinces')
                ->onUpdate('cascade')->nullOnDelete();
            $table->foreign(config('laravolt.indonesia.table_prefix') . "city_id")->references('id')->on(config('laravolt.indonesia.table_prefix') . 'cities')
                ->onUpdate('cascade')->nullOnDelete();
            $table->foreign(config('laravolt.indonesia.table_prefix') . "district_id")->references('id')->on(config('laravolt.indonesia.table_prefix') . 'districts')
                ->onUpdate('cascade')->nullOnDelete();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('merchants');
    }
};
