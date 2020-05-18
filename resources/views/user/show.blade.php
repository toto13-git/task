@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <div class="user_id">
            {{ $user->name }}さんの備蓄リスト
          </div>
        </div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          @if (session('redirect_messgae'))
          <div class="alert alert-danger" role="alert">
            {{ session('redirect_messgae') }}
          </div>
          @endif

          <form method="get" action="{{route('user.show', ['id' => $user])}}" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="商品名を検索" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
          </form>
          <form method="get" action="{{route('item.create')}}">
            <button type="submit" class="btn btn-primary">
              商品登録
            </button>
          </form>
          <form method="get" action="">
            <button type="submit" class="btn btn-primary">
              商品一覧
            </button>
          </form>

          <form method="post" action="{{ route('item.del')}}" name="del">
            @csrf
            <!-- <a href="{{ route('item.del')}}" class="btn btn-danger">削除する</a> -->
            <input type="submit" class="btn btn-danger" value="選択した全ての商品を削除" onclick="allDel(this);return false;">
            <table class=" table table-striped">
              <thead>

                <tr>
                  <th>削除</th>
                  <th>画像</th>
                  <th>名前</th>
                  <th>賞味期限 年</th>
                  <th>月</th>
                  <th>日</th>
                  <th>在庫</th>
                  <th>賞味期限まで</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($items as $item)
                <tr>
                  <td scope="row">
                    <input type="checkbox" id="cbox" name="check_ids[]" value="{{ $item->id }}">

                  </td>

                  @if($item->image)
                  <td>
                    <img src="{{asset('storage/'.$item->image)}}" width="80" height="80" name='image' alt="画像">
                  </td>
                  @else
                  <td>
                    <img src="/storage/imgs/noimage.jpg" width="80" height="80" alt="画像">
                  </td>
                  @endif

                  <td>{{ $item->name }}</td>
                  <td>{{ $item->sell_by_year }} </td>
                  <td>{{ $item->sell_by_month }} </td>
                  <td>{{ $item->sell_by_day }} </td>
                  <td>{{ $item->stock }}</td>



                  <td>
                    <script>
                      var y = '{{ $item->sell_by_year }}'
                      var m = '{{ $item->sell_by_month }}'
                      var d = '{{ $item->sell_by_day }}'

                      if (y === '' || m === '' || d === '') {
                        exit();
                      } else;

                      if (m.length === 1) {
                        m = '0' + m
                      }
                      if (d.length === 1) {
                        d = '0' + d
                      } else;

                      var now_jpn = moment();
                      var fromDate = now_jpn.format('YYYYMMDD');
                      var toDate = moment(y + m + d);
                      var day = toDate.diff(fromDate, 'days');

                      if (day === 0) {
                        document.write('本日までです!');
                      } else if (day < 0) {
                        document.write('過ぎました!');
                      } else if (day) {
                        document.write('残り' + day + '日です');
                      } else;
                    </script>
                  </td>
          </form>
          <td>
            <form method="get" action="{{route('item.show', ['id' =>$item->id])}}">
              <button type="submit" class="btn btn-primary">
                詳細・編集
              </button>
            </form>
          </td>
          </tr>
          @endforeach
          </tbody>

          </table>

          {{$items->links()}}

        </div>
      </div>
    </div>
  </div>
</div>

@endsection