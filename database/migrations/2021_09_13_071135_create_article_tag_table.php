<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_tag', function (Blueprint $table) {
//          поле айдишника здесь не нужно
//            $table->id();

//            $table->unsignedBigInteger('article_id');
//            $table->foreign('article_id')->references('id')->on('articles');
//            данная зхапись $table->foreignId('article_id')->constrained(); заменяет две предыдущие строки для
// ларавел 7 и позже, также используем onDelete('cascade') для удаления привязки тегов при удалении статьи, чтоб
// можно было удалять статьи
          $table->foreignId('article_id')->constrained()->onDelete('cascade');

//          $table->unsignedBigInteger('tag_id');
//          $table->foreign('tag_id')->references('id')->on('tags');
          $table->foreignId('tag_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_tag');
    }
}
