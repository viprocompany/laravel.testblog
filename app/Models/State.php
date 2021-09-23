<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\State
 *
 * @property int $id
 * @property int $likes
 * @property int $views
 * @property int $article_id
 * @method static \Database\Factories\StateFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|State query()
 * @method static \Illuminate\Database\Eloquent\Builder|State whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereViews($value)
 * @mixin \Eloquent
 */
class State extends Model
{
    use HasFactory;

    protected $fillable = ['likes', 'views', 'article_id'];

  //    так как нам не нужна временная метка для статистики , то делаем по умолчанию фолс
  public $timestamps = false;
}
