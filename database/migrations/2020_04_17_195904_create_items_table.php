<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('items', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name', 10);
      $table->string('memo', 200)->nullable($value = true);
      $table->integer('sell_by_year')->nullable($value = true);
      $table->integer('sell_by_month')->nullable($value = true);
      $table->integer('sell_by_day')->nullable($value = true);
      $table->integer('stock')->nullable($value = true);
      $table->integer('category')->nullable($value = true);
      $table->string('image')->nullable($value = true);
      $table->unsignedBigInteger('user_id');
      $table->timestamps();

      $table->foreign('user_id')->references('id')->on('users');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('items');
  }
}
