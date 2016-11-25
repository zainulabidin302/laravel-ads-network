<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    protected $table = 'adcomment';

    public function user() {
      return $this->belongsTo('App\User');
    }
    //
}
