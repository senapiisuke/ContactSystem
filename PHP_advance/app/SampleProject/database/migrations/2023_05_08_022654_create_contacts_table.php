<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('contacts')) {
            //
            Schema::create('contacts', function (Blueprint $table) {
                //ここにカラム
                $table->increments('id')->comment('システムID');
                $table->string('name', 50)->nullable()->comment('氏名');
                $table->string('kana', 50)->nullable()->comment('フリガナ');
                $table->string('tell', 11)->comment('電話番号');
                $table->string('email', 100)->nullable()->comment('メールアドレス');
                $table->text('body')->comment('お問合せ内容');
                $table->datetime('created_at')->comment('送信日時');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
