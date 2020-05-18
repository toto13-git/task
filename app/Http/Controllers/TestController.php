<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Test;


class TestController extends Controller
{
  //
  public function index()
  {
    $tests = Test::all();

    // $ddds = DB::table('tests')->select('id')->get();
    // dd($ddds);


    return view('test', compact('tests'));
  }
}
