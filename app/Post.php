<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;

class Post extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

    protected $fillable = [
        'title',
        'body',
        'created_at',
        'updated_at',
        'user_id',
        'image',
        'category_id'
    ];


    public function user() {
      return $this->belongsTo('App\User');
    }

    public function category() {
      return $this->belongsTo('App\Category','category_id');
    }
}
