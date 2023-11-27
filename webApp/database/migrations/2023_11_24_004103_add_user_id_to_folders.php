<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//既存のフォルダーマイグレーションファイルに直接変更を加える場合、エラーが発生しやすく
// 一度マイグレーションを実行した後、マイグレーションファイルを変更すると、そのマイグレーションを再実行することが難しくなります。
//なぜなら、Laravel はマイグレーションの履歴を管理しており、変更が加えられた場合には新しいマイグレーションとして認識されるためです。
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('folders', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();

            // 外部キーを設定する。users テーブルの特定のカラム（id カラム）を参照している
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
        Schema::table('folders', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
};
