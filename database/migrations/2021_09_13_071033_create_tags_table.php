<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('label')->unique();
//            так как используется unique, то в режиме генерац2ии фейковых данных может случится mysql ошибка по
//  причине того что библиотека faker может продублировать данные, в таком случае нужно просто перезапустить в
//  терминале команду сидера   php artisan migrate:refresh --seed


//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
