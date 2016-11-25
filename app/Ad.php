<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{

  public function adgallery() {
    return $this->hasMany('App\AdGallery');
  }

  public function adview() {
    return $this->hasMany('App\AdView');
  }

  public function category() {
    return $this->hasOne('App\Category');
  }

  public function comments() {
    return $this->hasMany('App\Comment');
  }
    //
}
