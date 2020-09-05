<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Category extends Model
{
  protected $fillable = [
      'name',
      'created_at',
      'updated_at'
  ];


  public function posts() {
    return $this->hasMany('App\Post');
  }
}
