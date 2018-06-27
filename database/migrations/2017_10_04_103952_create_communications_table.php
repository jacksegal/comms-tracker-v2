<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communications', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->text('description')->nullable();

            $table->integer('basket_id')->nullable();
            $table->integer('area_id')->nullable();
            $table->integer('sub_area_id')->nullable();

            $table->integer('medium_id')->nullable();
            $table->integer('ask_id')->nullable();

            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('date_flexibility')->nullable();

            $table->string('approx_recipients')->nullable();
            $table->integer('data_selection')->nullable();
            $table->text('notes')->nullable();

            $table->string('bsd_tag')->nullable();

            $table->integer('trello_card_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('active')->default('1');

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
        Schema::dropIfExists('communications');
    }
}
