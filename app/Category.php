<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{

  // разрешаем
  protected $fillable = ['title', 'slug', 'parent_id', 'published', 'created_by', 'modified_by'];

  // мутаторы слага - генерация
  public function setSlugAttribute($value)
{
  $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 20) . "-" . \Carbon\Carbon::now()->format('dmyHi'). '-');

}
  //вложеные категории
  public function children(){
      return $this->hasMany(self::class, 'parent_id');
    }
}
