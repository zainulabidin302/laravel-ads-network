<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apple extends Model
{
    public function fruit() {
      return $this->belongsTo('App\Fruit');
    }
    //
}
