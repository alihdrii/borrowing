<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLentBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lent_books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('book_id');
            $table->bigInteger('user_id');
            $table->timestamp('started_at');
            $table->timestamp('lent_day_num');
            $table->timestamps();
            $table->foreign('book_id')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lent_books');
    }
}
