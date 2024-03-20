@include('layouts.header')

@php
    $totalPrice = 0; // 合計価格を保持する変数
     $cartData = session('cartData') ?? []; // カートデータが存在しない場合は空の配列を代入
     $delivery = is_array($cartData) && count($cartData) > 0 ? 1000 : 0; // カートデータがある場合は送料を加算
@endphp


<div class="container py-5">
    @if(count($cartData) > 0)
    <div class="row">

        <div class="col-md-12 col-lg-8">
            @foreach($items as $index => $item)
                @php
                    $itemQuantity = session('cartData.'.$loop->index.'.quantity');
                    $itemPrice = $item->price * $itemQuantity;
                    $totalPrice += $itemPrice; // 合計価格に加算
                @endphp

                <div class="container">

                    <div class="row mb-3 pb-3 border-bottom">
                        <div class="col-3 col-md-3 img-fluid">
                            <img src="{{asset('storage/'.$item->itemImages[0]->image_name)}}"  width="150px" 　alt="...">
                        </div>
                        <div class="col-12 col-md-7">
                            <div>商品名: {{ $item->title }}</div>
                            <div>概要: {{ $item->description }}</div>
                        </div>
                        <div class="col-2 col-md-2   mt-3">
                            <div>価格: ￥{{ $item->price * session('cartData.'.$loop->index.'.quantity') }}</div>
                        </div>
                        <div class="col-2 col-md-2 offset-md-3 mt-3">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="quantity" onchange="updateSession('{{$item['item_id'] }}', this.value, {{$index}})">
                                @for ($i = 1; $i <= 99; $i++)
                                    <option value="{{ $i }}" {{ session('cartData.'.$index.'.quantity') == $i ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-3  mt-3">
                            <form method="POST" action="{{ route('removecart', $item->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-md-4 ">
            <div class="border-bottom">
                <div class="row">
                    <div class="col py-3">ご注文内容</div>
                </div>
                <div class="row">
                    <div class="col py-3">商品価格</div>
                    <div class="col py-3 text-right">￥{{ $totalPrice }}</div>
                </div>
                <div class="row">
                    <div class="col py-3">配達料</div>
                    <div class="col py-3 text-right">￥{{$delivery}}</div>
                </div>
                <div class="row">
                    <div class="col py-3">小計</div>
                    <div class="col py-3 text-right">￥{{ $totalPrice+$delivery }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 py-3">
                    <button type="button" class="btn btn-success " onclick="addToCart()">購入に進む</button>
                </div>
            </div>

        </div>

    </div>
    @else
        商品がありません。
    @endif
    </div>


<script>
    function addToCart() {
        // JavaScriptでリダイレクト
        window.location.href = "{{ route('order.create') }}";
    }

    function updateSession(itemId, newQuantity, index) {
        // CSRFトークンの取得
        var csrfToken = '{{ csrf_token() }}';

        // AJAXリクエストの設定
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/update-session');
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

        // データの準備
        var data = {
            itemId: itemId,
            newQuantity: newQuantity,
            index: index
        };

        // レスポンスが返ってきた場合の処理
        xhr.onload = function() {
            if (xhr.status === 200) {
                location.reload();
                // サーバーからの応答が成功の場合、成功したことをコンソールに表示
                console.log('Session updated successfully');
            } else {
                // エラーの場合、エラーメッセージをコンソールに表示
                console.error('Failed to update session');
            }
        };

        // リクエストの送信
        xhr.send(JSON.stringify(data));
    }
</script>
@include('layouts.footer')

