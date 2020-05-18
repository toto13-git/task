<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    DB::table('users')->insert([
      [
        'id' => 1,
        'name' => 'aaa',
        'email' => 'aaa@aaa.com',
        'password' => Hash::make('12345678')
      ],
      [
        'id' => 2,
        'name' => 'bbb',
        'email' => 'bbb@bbb.com',
        'password' => Hash::make('12345678')
      ],
      [
        'id' => 3,
        'name' => 'ccc',
        'email' => 'ccc@ccc.com',
        'password' => Hash::make('12345678')
      ]
    ]);
  }
}
