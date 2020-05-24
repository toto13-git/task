@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">備蓄品の登録</div>

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

          <div class="create-item">
            <ul class="create-item__ul">
              <li>
                <button class="create-item__ul-btn-back" type="submit" onClick="history.back()">
                  ＜戻る
                </button>
              </li>
              <form method="post" action="{{route('item.store')}}" enctype="multipart/form-data">
                @csrf

                <li class="create-item__ul-name">
                  名前
                </li>
                <li>
                  <input type="text" name="name" placeholder="10字まで入力できます" value={{ old('name') }}>
                </li>

                <li class="create-item__ul-name">
                  賞味期限
                </li>
                <li>
                  <input class="create-item__ul-input" type="text" name="sell_by_year" value={{ old('sell_by_year') }}>年
                  <input class="create-item__ul-input-min" type="text" name="sell_by_month" value={{ old('sell_by_month') }}>月
                  <input class="create-item__ul-input-min" type="text" name="sell_by_day" value={{ old('sell_by_day') }}>日
                </li>

                <li class="create-item__ul-name">
                  在庫
                </li>
                <li>
                  <input class="create-item__ul-input" type=text name="stock" value={{ old('stock') }}>個
                </li>

                <li class="create-item__ul-name">
                  カテゴリー
                </li>
                <li>
                  <select name="category">
                    <option value="">選択してください</option>
                    <option value="1" @if(old('category')=='1' ) selected @endif>飲料水など</option>
                    <option value="2" @if(old('category')=='2' ) selected @endif>保存食など</option>
                    <option value="3" @if(old('category')=='3' ) selected @endif>その他</option>
                  </select>
                </li>

                <li class="create-item__ul-name">
                  メモ
                </li>

                <li>
                  <textarea class="create-item__ul-textarea" name="memo" placeholder="200字まで入力できます" value={{ old('memo') }}></textarea>
                </li>

                <!-- <li>画像</li>
              <li><input type="file" name="image" alt="画像"></li> -->
                <li>
                  <input class="create-item__ul-btn-create" type="submit" value="登録">
                </li>
              </form>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection