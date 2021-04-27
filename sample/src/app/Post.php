<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
    'name',
    'subject',
    'message',

  ];

  public function comments()
  {
    return $this->hasMany('App\Comment');
  }
}
