<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    DB::table('items')->insert([
      [
        'id' => 1,
        'name' => 'キャラメルコーン',
        'memo' => '美味しい',
        'sell_by_year' => 2020,
        'sell_by_month' => 10,
        'sell_by_day' => 12,
        'stock' => 9,
        'category' => 1,
        'user_id' => 2

      ],
      [
        'id' => 2,
        'name' => 'ご飯',
        'memo' => '5パック',
        'sell_by_year' => 2020,
        'sell_by_month' => 11,
        'sell_by_day' => 10,
        'stock' => 2,
        'category' => 1,
        'user_id' => 3
      ],
      [
        'id' => 3,
        'name' => '水',
        'memo' => '2L',
        'sell_by_year' => 2020,
        'sell_by_month' => 12,
        'sell_by_day' => 22,
        'stock' => 1,
        'category' => 1,
        'user_id' => 1
      ]
    ]);
  }
}
