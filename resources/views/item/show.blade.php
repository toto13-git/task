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


          showです


          <!-- 戻るを押したらマイページへ戻る -->
          <button type="submit" class="btn btn-primary" onClick="history.back()">
            戻る
          </button>


          <br>
          商品名:
          {{$item->name}}
          <br>
          賞味期限:
          {{$item->sell_by_year}}年

          {{$item->sell_by_month}}月

          {{$item->sell_by_day}}日
          <br>
          {{$day}}
          <br>
          在庫:
          {{$item->stock}}
          <br>

          カテゴリー:
          {{$category}}

          <br>
          メモ:
          {{$item->memo}}
          <br>
          画像:
          @if($item->image)
          <td>
            <img src="{{asset('storage/'.$item->image)}}" width="80" height="80" name='image' alt="画像">
          </td>
          @else
          <td>
            <img src="/storage/imgs/noimage.jpg" width="80" height="80" alt="画像">
          </td>
          @endif

          <!-- <input class="btn btn-info" type="submit" value="編集する"> -->

          <form method="get" action="{{route('item.edit', ['id'=>$item])}}">
            <button type="submit" class="btn btn-primary">
              編集ページへ
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> @endsection