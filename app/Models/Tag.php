<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tag
 *
 * @property int $id
 * @property string $label
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Article[] $articles
 * @property-read int|null $articles_count
 * @method static \Database\Factories\TagFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereLabel($value)
 * @mixin \Eloquent
 */
class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['label'];
//    так как нам не нужна временная метка для тегов , то делаем по умолчанию фолс
    public $timestamps = false;

//    связь одна статья много тегов и один tag = много постов
    public function articles()
    {
      return $this->belongsToMany(Article::class);
    }

}
