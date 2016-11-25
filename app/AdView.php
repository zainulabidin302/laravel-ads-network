<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdView extends Model
{
  protected $table = 'adsview';
    //
  public function ad() {
    return $this->belongsTo('App\Ad');
  }

  public function user() {
    return $this->belongsTo('App\User');
  }

}
