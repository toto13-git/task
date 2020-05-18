<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateUserRequest;
use Carbon\Carbon;

class ItemController extends Controller
{
  public function __construct()
  {
    // ログイン状態を判断するミドルウェア
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, User $model, $id)
  {
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
    $user = Auth::id();
    $items = Item::all();
    return view('item.create', compact('items', 'user'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateUserRequest $request)
  {
    //
    $user = Auth::id();
    $item = new Item;

    $item->name = $request->input('name');
    $item->sell_by_year = $request->input('sell_by_year');
    $item->sell_by_month = $request->input('sell_by_month');
    $item->sell_by_day = $request->input('sell_by_day');
    $item->stock = $request->input('stock');
    $item->category = $request->input('category');
    $item->memo = $request->input('memo');

    if ($item->image = $request->has('image')) {
      $item->image = $request->file('image')->store('imgs', 'public');
    }

    $item->user_id = $request->user()->id;
    $item->save();

    return redirect()->route('user.show', ['id' => $user]);
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id, Item $item, User $user)
  {
    //
    $user = Auth::id();
    $item = Item::find($id);

    if ($user == $item->user_id) {
      if ($item->category == 0) {
        $category = '選択していません';
      }
      if ($item->category == 1) {
        $category = '飲料水など';
      }
      if ($item->category == 2) {
        $category = '保存食など';
      }
      if ($item->category == 3) {
        $category = 'その他';
      }

      //賞味期限までの日数
      $dt = new Carbon;
      $today = $dt->today(); //  date: 2020-04-26 00:00:00.0 Asia/Tokyo (+09:00)

      $Y = $item->sell_by_year;
      $m = $item->sell_by_month;
      $d = $item->sell_by_day;

      $sellBy = Carbon::create($Y, $m, $d);
      $diff = $today->diff($sellBy);

      if ($Y == null || $m == null || $d == null) {
        $day = '賞味期限を設定していません';
        return view('item.show', compact('item', 'category', 'day'));
      }
      if ($today == $sellBy) {
        $day = '賞味期限は本日までです';
      }
      if ($today > $sellBy) {
        $day = '賞味期限が過ぎました';
      }
      if ($today < $sellBy) {
        $day = $diff->format('賞味期限まであと%a日です');
      }
      return view('item.show', compact('item', 'category', 'day'));
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
    $user = Auth::id();
    $item = Item::find($id);

    if ($user == $item->user_id) {
      return view('item.edit', compact('item', 'user'));
    } else {
      return redirect()->route('user.show', ['id' => $user])->with('redirect_messgae', 'そのページはアクセスできません！');
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(CreateUserRequest  $request, $id)
  {
    //
    $user = Auth::id();
    $item = Item::find($id);

    $item->name = $request->input('name');
    $item->sell_by_year = $request->input('sell_by_year');
    $item->sell_by_month = $request->input('sell_by_month');
    $item->sell_by_day = $request->input('sell_by_day');
    $item->stock = $request->input('stock');
    $item->category = $request->input('category');
    $item->memo = $request->input('memo');
    $image = $request->file('image');
    if ($image != '') {
      $item->image = $request->file('image')->store('imgs', 'public');
    }
    $item->user_id = $request->user()->id;
    $item->save();

    return redirect()->route('user.show', ['id' => $user]);
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
    $user = Auth::id();
    $item = Item::find($id);
    $item->delete();

    return redirect()->route('user.show', ['id' => $user]);
  }

  public function del(Request $request)
  {
    $user = Auth::id();
    $check_ids = $request->input('check_ids');
    $item = Item::whereIn('id', $check_ids);
    $item->delete();

    return redirect()->route('user.show', ['id' => $user]);
  }
}
