<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
          $table->id();
          $table->string('subject');
          $table->text('body');
//          $table->unsignedBigInteger('article_id');
         //  данная запись $table->foreignId('article_id')->constrained(); заменяет две предыдущ строку для ларавел 7 и позже, также используем onDelete('cascade') для удаления  комментов при удалении статьи,
          $table->foreignId('article_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('comments');
    }
}
