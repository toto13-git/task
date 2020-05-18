<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  //

  // protected $fillable = [
  //   'name',
  //   'memo',
  //   'sell_by_year',
  //   'sell_by_month',
  //   'sell_by_day',
  //   'stock',
  //   'category',
  //   'image',
  //   'user_id',
  // ];

  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }
}
