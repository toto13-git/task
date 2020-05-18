@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">編集ページ</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <!-- エラー文を表示するコード リストで表示される -->
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <!-- 備蓄リスト戻る -->
          <a class="navbar-brand" href="{{ url('user/show', ['id' => $user]) }}">備蓄リストへ</a>
          <br>
          <!-- 戻るを押したらマイページへ戻る -->
          <button type="submit" class="btn btn-primary" onClick="history.back()">
            詳細ページへ戻る
          </button>
          <form method="post" action="{{route('item.update',['id'=>$item->id])}}" enctype="multipart/form-data">
            @csrf

            商品名
            <input type="text" name="name" value="{{$item->name}}">
            <br>
            賞味期限
            <input type="text" name="sell_by_year" value="{{$item->sell_by_year}}">年
            <br>
            <input type="text" name="sell_by_month" value="{{$item->sell_by_month}}">月
            <br>
            <input type="text" name="sell_by_day" value="{{$item->sell_by_day}}">日
            <br>
            在庫
            <input type=text name="stock" value="{{$item->stock}}">個
            <br>
            カテゴリー
            <select name="category">
              <option value="0">選択してください</option>
              <option value="1" @if($item->category === 1 ) selected @endif>飲料水など</option>
              <option value="2" @if($item->category === 2 ) selected @endif>保存食など</option>
              <option value="3" @if($item->category === 3 ) selected @endif>その他</option>
            </select>
            <br>
            メモ
            <textarea name="memo">{{$item->memo}}</textarea>
            <br>
            画像
            <img src="{{(!empty($item->image))?url('storage/'.$item->image):url('/storage/imgs/noimage.jpg')}}">
            <br>
            <input type="file" name="image">
            <br>
            <input class="btn btn-info" type="submit" name="edit" value="編集する">
            <br>
          </form>
          <form method="post" action="{{ route('item.destroy', ['id' => $item->id ])}}" id="delete_{{ $item->id}}">
            @csrf
            <a href="#" class="btn btn-danger" data-id="{{ $item->id }}" onclick="deletePost(this);">削除する</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection