@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">詳細ページ</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <!-- 戻るを押したらマイページへ戻る -->
          <button class=" back-btn" type="submit" onClick="history.back()">
            ＜戻る
          </button>

          <table class="item-table">
            <tr>
              <th class="item-table__th">
                商品名
              </th>
              <td class="item-table__td">
                {{$item->name}}
              </td>
            </tr>
            <tr>
              <th class="item-table__th">
                賞味期限
              </th>
              <td class="item-table__td">
                {{$item->sell_by_year}}年
                {{$item->sell_by_month}}月
                {{$item->sell_by_day}}日
              </td>
            </tr>
            <tr>
              <th class="item-table__th">
                残り期限
              </th>
              <td class="item-table__td">
                <span id="day" data-day="{{$day}}" onload="changeColor(this);">
                  {{$day}}</span>
              </td>
            </tr>
            <tr>
              <th class="item-table__th">
                在庫
              </th>
              <td class="item-table__td">
                {{$item->stock}}個
              </td>
            </tr>
            <tr>
              <th class="item-table__th">
                カテゴリー
              </th>
              <td class="item-table__td">
                {{$category}}
              </td>
            </tr>
            <tr>
              <th class="item-table__th">
                メモ
              </th>
              <td class="item-table__td">
                {{$item->memo}}
              </td>
            </tr>

            <!-- 画像投稿機能実装予定 -->
            <!-- 画像:
            @if($item->image)
            <td>
              <img src="{{asset('storage/'.$item->image)}}" width="80" height="80" name='image' alt="画像">
            </td>
            @else
            <td>
              <img src="/storage/imgs/noimage.jpg" width="80" height="80" alt="画像">
            </td>
            @endif -->
          </table>
          <form method="get" action="{{route('item.edit', ['id'=>$item])}}">
            <button type="submit" class="edit-btn">
              編集＞
            </button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div> @endsection