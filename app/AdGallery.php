<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdGallery extends Model
{
  protected $table = 'adgallery';

  public function ad() {
    return $this->belongsTo('App\Ad');
  }
}
