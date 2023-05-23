<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();        // ユーザーID
            $table->integer('point')->unsigned();	            // 起床時の気分
            $table->tinyInteger('weather')->unsigned();         // 起床時の天気
            $table->tinyInteger('walk_flg')->unsigned();        // 朝散歩の有無
            $table->string('diary_1', 100);					    // 日記1
            $table->string('diary_2', 100)->nullable();			// 日記2
            $table->string('diary_3', 100)->nullable();			// 日記3
            $table->text('others')->nullable();					// その他
            $table->date('calendar');				            // 日付 
            $table->datetimeTz('created_at');
            $table->datetimeTz('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
