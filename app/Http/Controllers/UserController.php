<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{
  public function __construct()
  {
    // ログイン状態を判断するミドルウェア
    $this->middleware('auth');
    // $this->middleware('can:view,user')->only('show');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function index(Request $request, $id)
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request, User $user, $id)
  {
    //
    $user = Auth::user();

    if ($user->id === User::find($id)->id) {
      $search = $request->input('search');
      $query = User::find($id)->items();
      $query->orderBy('created_at', 'desc');
      $items = $query->paginate(10);

      if ($search != null) {
        $search_split = mb_convert_kana($search, 's');
        $search_split2 = preg_split('/[\s]+/', $search_split, -1, PREG_SPLIT_NO_EMPTY);
        foreach ($search_split2 as $value) {
          $query->where('name', 'like', '%' . $value . '%');
        }
      };

      return view('user.show', compact(
        'user',
        'items'
      ));
    } else {
      return redirect()->route('user.show', ['id' => $user])->with('redirect_messgae', 'そのページはアクセスできません！');
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
