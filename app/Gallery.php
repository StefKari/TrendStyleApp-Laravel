<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
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
