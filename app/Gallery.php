<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  protected $fillable = [
      'gallery',
      'created_at',
      'updated_at',
      'user_id',
  ];


  public function user() {
    return $this->belongTo('App\User');
  }
}
