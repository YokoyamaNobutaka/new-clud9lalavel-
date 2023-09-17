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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            /*IDというカラムの定義*/
            $table->string('title', 50);
            /*titleというカラム名の定義文字列の入力、
            最大文字数は50文字*/
            $table->string('body', 200);
            /*bodyというカラム名の定義文字列の入力、
            最大文字数は200文字*/
            $table->timestamps();
            /*作成日時カラム（created_at）と
            更新日時カラム（updated_at）を入力*/
            $table->softDeletes();
            /*論理削除処理で必要になる削除日時カラム*/
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
};
