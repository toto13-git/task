<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  //
  // protected $fillabel = [
  //   'name',
  //   'email',
  //   'password',
  // ];

  public function items()
  {
    return $this->hasMany('App\Models\Item');
  }
}
