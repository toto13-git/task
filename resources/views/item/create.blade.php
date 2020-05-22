@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <!-- エラー文を表示するコードリストで表示される -->
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <button type="submit" class="btn btn-primary" onClick="history.back()">
            戻る
          </button>
          <form method="post" action="{{route('item.store')}}" enctype="multipart/form-data">
            @csrf
            商品名
            <input type="text" name="name" value={{ old('name') }}>
            <br>
            賞味期限
            <input type="text" name="sell_by_year" value={{ old('sell_by_year') }}>年
            <br>
            <input type="text" name="sell_by_month" value={{ old('sell_by_month') }}>月
            <br>
            <input type="text" name="sell_by_day" value={{ old('sell_by_day') }}>日
            <br>
            在庫
            <input type=text name="stock" value={{ old('stock') }}>個
            <br>
            カテゴリー
            <select name="category">
              <option value="">選択してください</option>
              <option value="1" @if(old('category')=='1' ) selected @endif>飲料水など</option>
              <option value="2" @if(old('category')=='2' ) selected @endif>保存食など</option>
              <option value="3" @if(old('category')=='3' ) selected @endif>その他</option>
            </select>
            <br>
            メモ
            <textarea name="memo" value={{ old('memo') }}></textarea>
            <br>
            画像
            <input type="file" name="image" alt="画像">
            <input class="btn btn-info" type="submit" value="登録する">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection