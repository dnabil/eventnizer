<?php

use App\Models\OrderHistory;
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
        Schema::create('order_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('product_id');
            $table->string('slug', 15)->unique();
            $table->timestamp('event_date');
            $table->timestamp('is_paid')->nullable()->default(null);
            $table->timestamps();

            $table->enum('is_done', OrderHistory::$enum_isDone)->default('false');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_histories');
    }
};
