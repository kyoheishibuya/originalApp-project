@include('layouts.header')

    <div class="container">
        <h2>注文詳細 #{{ $order->id }}</h2>

        <!-- Order's basic info -->
        <div class="card my-3">
            <div class="card-body">
                <h5 class="card-title">基本情報</h5>
                <p class="card-text">注文ID: {{ $order->id }}</p>
                <p>注文日: {{ $order->created_at->toFormattedDateString() }}</p>
                <p class="card-text">ステータス: {{ $order->delivery_status == 0 ? '未発送' : ($order->delivery_status == 1 ? '発送済み' : 'キャンセル') }}</p>
                <p class="card-text">発送日: {{ $order->shipping_at ? \Carbon\Carbon::parse($order->shipping_at)->format('Y/m/d') : 'N/A' }}</p>
                <form method="POST" action="{{ route('shipping_update', ['id' => $order->id]) }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('発送済みにしますか？')">発送</button>
                </form>
            </div>
        </div>

        <!-- Customer's info -->
        <div class="card my-3">
            <div class="card-body">
                <h5 class="card-title">顧客情報</h5>
                <p>名前: {{ $order->customer->last_name }} {{ $order->customer->first_name }}</p>
                <p>連絡先: {{ $order->customer->telephone_number }}</p>
                <p>郵便番号: {{ $order->customer->post_address }}</p>
                <p>住所: {{ $order->customer->prefecture }}{{ $order->customer->city }}{{ $order->customer->street_address }}{{ $order->customer->building }}</p>
                <p>支払い方法:
                @switch($order->customer->payment)
                    @case(1) クレジット @break
                    @case(2) 銀行振り込み @break
                    @case(3) 代引き @break
                    @default 不明
                @endswitch
                </p>
            </div>
        </div>



        <!-- List of items purchased -->
        <div class="card my-3">
            <div class="card-body">
                <h5 class="card-title">注文アイテム</h5>
                <ul class="list-group list-group-flush">
                    <div class="row ">
                        <div class="col ">
                            <p class="card-text">単価合計: {{ $order->orderDetail->total_item_price }}</p>
                        </div>
                        <div class="col">
                            <p class="card-text">送料: {{ $order->orderDetail->shipping_price }}</p>
                        </div>
                        <div class="col">
                            <p class="card-text">合計金額: {{ $order->orderDetail->total_payment_price }}</p>
                        </div>
                    </div>
                    @foreach ($order->orderDetail->purchases as $purchase)
                        <li class="list-group-item"> - 管理No.:{{$purchase->item->id }} - 商品名:{{ $purchase->item->title }} - 数量: {{ $purchase->piece }} - 単価: {{ $purchase->item_price }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Actions -->
        <div class="my-4 p-3 bg-white rounded shadow-sm">
            <h3>操作</h3>
            <a href="{{ route('order.index') }}" class="btn btn-outline-secondary">一覧に戻る</a>
            <!-- Edit and Delete forms here -->
            <form action="{{ route('order.edit', $order->id) }}" class="d-inline">
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('本当に編集しますか？')">編集</button>
            </form>
            <form method="POST" action="{{ route('order.destroy', $order->id) }}" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('本当に削除しますか？')">取消</button>
            </form>
        </div>

    </div>


@include('layouts.footer')

