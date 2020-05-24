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

          <div class="edit-item">
            <ul class="edit-item__ul">
              <li>
                <!-- 備蓄リスト戻る -->
                <a class="navbar-brand" href="{{ url('user/show', ['id' => $user]) }}">マイページTopへ</a>
              </li>
              <li>
                <!-- 戻るを押したらマイページへ戻る -->
                <button class="edit-item__ul-btn-back" type="submit" onClick="history.back()">
                  ＜詳細
                </button>
              </li>

              <form method="post" action="{{route('item.update',['id'=>$item->id])}}" enctype="multipart/form-data">
                @csrf
                <li class="edit-item__ul-name">
                  名前
                </li>
                <li>
                  <input type="text" name="name" value="{{$item->name}}">
                </li>
                <li class="edit-item__ul-name">
                  賞味期限
                </li>
                <li>
                  <input class="edit-item__ul-input" type="text" name="sell_by_year" value="{{$item->sell_by_year}}">年


                  <input class="edit-item__ul-input-min" type="text" name="sell_by_month" value="{{$item->sell_by_month}}">月


                  <input class="edit-item__ul-input-min" type="text" name="sell_by_day" value="{{$item->sell_by_day}}">日
                </li>
                <li class="edit-item__ul-name">
                  在庫
                </li>
                <li>
                  <input class="edit-item__ul-input" type=text name="stock" value="{{$item->stock}}">個
                </li>
                <li class="edit-item__ul-name">
                  カテゴリー
                </li>
                <li>
                  <select name="category">
                    <option value="0">選択してください</option>
                    <option value="1" @if($item->category === 1 ) selected @endif>飲料水など</option>
                    <option value="2" @if($item->category === 2 ) selected @endif>保存食など</option>
                    <option value="3" @if($item->category === 3 ) selected @endif>その他</option>
                  </select>
                </li>
                <li class="edit-item__ul-name">
                  メモ
                </li>
                <li>
                  <textarea class="edit-item__ul-textarea" name="memo">{{$item->memo}}</textarea>
                </li>
                <!-- <li>
                  画像
                  <img src="{{(!empty($item->image))?url('storage/'.$item->image):url('/storage/imgs/noimage.jpg')}}">
                </li> -->
                <!-- <li>
                  <input type="file" name="image">
                </li> -->
                <li>
                  <input class="edit-item__ul-btn-create" type="submit" name="edit" value="編集完了">
                </li>

              </form>
              <form method="post" action="{{ route('item.destroy', ['id' => $item->id ])}}" id="delete_{{ $item->id}}">
                @csrf
                <a href="#" class="edit-item__ul-btn-del" data-id="{{ $item->id }}" onclick="deletePost(this);">削除</a>
              </form>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection