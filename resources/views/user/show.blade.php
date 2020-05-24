@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
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

        <div class="menu">
          <div class="menu__register">
            <form method="get" action="{{route('item.create')}}">
              <button type="submit" class="menu__register-btn">
                登録
              </button>
            </form>
          </div>

          <div class="menu__list">
            <form method="get" action="">
              <button type="submit" class="menu__list-btn">
                一覧
              </button>
            </form>
          </div>

          <div class="menu__search">
            <form method="get" action="{{route('user.show', ['id' => $user])}}">
              <input class="menu__search-area" name="search" type="search" placeholder="名前を検索" aria-label="Search">
              <button class="menu__search-btn" type="submit">検索</button>
            </form>
          </div>
        </div>

        <form method="post" action="{{ route('item.del')}}" name="del">
          @csrf
          <table>
            <thead>
              <tr>
                <th class="th-top" rowspan="2">
                  <div class="delete">
                    <input type="submit" class="delete__btn" value="X" onclick="allDel(this);return false;">
                  </div>
                </th>
                <!-- 今後追加予定の画像投稿機能 -->
                <!-- <th>画像</th> -->
                <th colspan="3">名前</th>
                <th colspan="4" class="th-bottom" class="stock">在庫</th>
              </tr>
              <tr>
                <th colspan="3">賞味期限</th>
                <th colspan="3">残り日数</th>
                <th class="tabel-edit"><span class="css-br">詳細</span> 編集</th>
              </tr>
              <tr>
                <td colspan="8">
                  <div class="line"></div>
                </td>
              </tr>
            </thead>
            @foreach ($items as $item)
            <div id="w">
              <tbody>
                <tr>
                  <td class="delbox-wrapper" rowspan="2">
                    <div class="delbox-wrapper__block">
                      <input class="delbox-wrapper__block-checkbox" type="checkbox" id="cbox" name="check_ids[]" value="{{ $item->id }}">
                    </div>
                  </td>
                  <!-- 今後追加予定の画像投稿機能 -->
                  <!-- @if($item->image)
                <td>
                  <img src="{{asset('storage/'.$item->image)}}" width="80" height="80" name='image' alt="画像">
                </td>
                @else
                <td>
                  <img src="/storage/imgs/noimage.jpg" width="80" height="80" alt="画像">
                </td>
                @endif -->
                  <td colspan="3" class="item-name">{{ $item->name }}</td>
                  <td colspan="4" class="stock-show">{{ $item->stock }}個</td>
                </tr>
                <tr>

                  <td>{{ $item->sell_by_year }}年</td>
                  <td>{{ $item->sell_by_month }}月</td>
                  <td>{{ $item->sell_by_day }}日</td>
                  <td colspan="3">

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
                        document.write('<div class="time-limit">' + '本日までです!' + '</div>');
                      } else if (day < 0) {
                        document.write('<div class="time-over">' + '過ぎました!' + '</div>');
                      } else if (day) {
                        document.write('<div class="time-ago">' + '残り' + day + '日' + '</div>');
                      } else;
                    </script>
                  </td>
        </form>

        <td class="item-show-wrapper">
          <div class="item-show-wrapper__block">
            <form method="get" action="{{route('item.show', ['id' =>$item->id])}}">
              <button type="submit" class="item-show-wrapper__block-btn">
                ＞
              </button>
            </form>
          </div>
        </td>
        </tr>

        <tr>
          <td colspan="8">
            <div class="line"></div>
          </td>
        </tr>
      </div>
      @endforeach
      </tbody>
      </table>

      <div class="delete">
        <input type="submit" class="delete__btn" value="X" onclick="allDel(this);return false;">
      </div>
      {{$items->links()}}
    </div>
  </div>
</div>

</div>
@endsection