<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_tag', function (Blueprint $table) {
            $table->unsignedInteger('tag_id');
            $table->unsignedInteger('event_id');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('event_id')->references('id')->on('events');
            $table->timestamps();

            $table->primary(['tag_id', 'event_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_tag');
    }
}
