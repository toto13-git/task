<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use App\Policies\ItemPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
  /**
   * The policy mappings for the application.
   *
   * @var array
   */
  protected $policies = [
    // 'App\Model' => 'App\Policies\ModelPolicy',
    Item::class => ItemPolicy::class,
    User::class => UserPolicy::class,


  ];

  /**
   * Register any authentication / authorization services.
   *
   * @return void
   */
  public function boot()
  {
    $this->registerPolicies();


    Gate::define('aaa', function (User $user) {
      //   //
      $auth = Auth::id();
      $user = User::find($auth)->id;
      return $auth === $user;
      // $user = Auth::id();
      // $item = User::all()->items()->user_id;
      // dd($item);
      // $item = Item::find();
      // dd($user);
      // return $user === $item;


      // return $user->id == $item->user_id;
      // if ($user->id == $item->user_id) {
      //   return true;
      // } 
      // else {
      //   return redirect()->route('/home');
      // }
    });
  }
}
