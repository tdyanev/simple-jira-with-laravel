<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 200);
            $table->text('description');
            $table->integer('creator_user_id')->unsigned();
            $table->integer('parent_task_id')->nullable()->unsigned();
            $table->tinyInteger('status')->unsigned();
            $table->tinyInteger('priority')->unsigned();
            $table->timestamp('finished_at')->nullable();

            $table->foreign('creator_user_id')->references('id')->on('users');
            $table->foreign('parent_task_id')->references('id')->on('tasks');

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
        Schema::dropIfExists('tasks');
    }
}
